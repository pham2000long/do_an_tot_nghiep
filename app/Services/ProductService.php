<?php

namespace App\Services;

use App\Repositories\ProductContract;
use App\Repositories\ProductDetailContract;
use App\Repositories\ProductImageContract;
use App\Repositories\ProductTagContract;
use App\Repositories\SnapshotContract;
use App\Repositories\TagContract;
use App\Support\Api\ConvertDataContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;
    protected $productDetailRepository;
    protected $convertDataContent;
    protected $snapshotRepository;
    protected $productImageRepository;
    protected $tagRepository;
    protected $productTagRepository;

    public function __construct(
        ProductContract $productRepository,
        ProductDetailContract $productDetailRepository,
        ConvertDataContent $convertDataContent,
        SnapshotContract $snapshotRepository,
        ProductImageContract $productImageRepository,
        TagContract $tagRepository,
        ProductTagContract $productTagRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productDetailRepository = $productDetailRepository;
        $this->convertDataContent = $convertDataContent;
        $this->snapshotRepository = $snapshotRepository;
        $this->productImageRepository = $productImageRepository;
        $this->tagRepository = $tagRepository;
        $this->productTagRepository = $productTagRepository;
    }

    public function getAllProducts(array $params)
    {
        $products = $this->productRepository->getAllProducts($params);

        return $products;
    }

    public function create(array $params)
    {
        if (!empty($params['description'])) {
            $description = $this->convertDataContent->convertData(
                $params['description'],
                'product_description_',
                'product_descriptions'
            );
        }
        if (!empty($params['insurance'])) {
            $insurance = $this->convertDataContent->convertData(
                $params['insurance'],
                'product_insurance_',
                'product_insurances'
            );
        }
        if (!empty($params['image'])) {
            $image = $this->snapshotRepository->uploadThumb($params['image'], 'products');
        }

        $dataProduct = [
            'category_id' => $params['category_id'],
            'product_type_id' => $params['product_type_id'],
            'supplier_id' => $params['supplier_id'],
            'name' => $params['name'],
            'image' => !empty($image) ? $image : $params['thumb_current'],
            'sku_code' => $params['sku_code'],
            'slug' => Str::slug($params['name']),
            'size' => $params['size'] ? $params['size'] : null,
            'status' => $params['status'] ? $params['status'] : false,
            'import_price' => $params['import_price'] ? $params['import_price'] : null,
            'sale_price' => $params['sale_price'] ? $params['sale_price'] : null,
            'description' => !empty($description) ? $description : null,
            'insurance' => !empty($insurance) ? $insurance : null,
            'rate' => null,
        ];
        DB::beginTransaction();
        try {
            $product = $this->productRepository->create($dataProduct);
            //Thêm vào tags
            if (!empty($params['tags'])) {
                foreach ($params['tags'] as $key => $item) {
                    $tag = $this->tagRepository->firstOrCreate(
                        ['name' => $item],
                        ['name' => $item]
                    );
                    $tagIds[] = $tag->id;
                }
                $product->tags()->attach($tagIds);
            }
            //Thêm vào bảng product_details
            if (!empty($params['product_details'])) {
                foreach ($params['product_details'] as $key => $product_detail) {
                    $dataProductDetail = array_merge($product_detail, ['product_id' => $product->id]);
                    $productDetail = $this->productDetailRepository->create($dataProductDetail);

                    //Thêm vào bảng product_images
                    if (!empty($product_detail['images'])) {
                        foreach ($product_detail['images'] as $image) {
                            $product_image['name'] = $this->snapshotRepository->uploadProductImages($image, 'product_images');
                            $product_image['product_id'] = $product->id;
                            $product_image['product_detail_id'] = $productDetail->id;
                            $this->productImageRepository->create($product_image);
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ['Lỗi hệ thống không thể lưu sản phẩm!', false];
        }

        return ['Thêm mới sản phẩm thành công', true];
    }

    public function findProductById(int $id)
    {
        $product = $this->productRepository->findProductById($id);

        return $product;
    }

    public function update(int $id, array $params)
    {
        $product = $this->productRepository->findById($id);
        if (empty($product)) {
            return ['Sản phẩm không tồn tại!', false];
        }

        if (!empty($params['description'])) {
            $description = $this->convertDataContent->convertData(
                $params['description'],
                'product_description_',
                'product_descriptions'
            );
        }
        if (!empty($params['insurance'])) {
            $insurance = $this->convertDataContent->convertData(
                $params['insurance'],
                'product_insurance_',
                'product_insurances'
            );
        }
        if (!empty($params['image'])) {
            $this->snapshotRepository->deleteThumb($params['thumb_current'], 'products');
            $image = $this->snapshotRepository->uploadThumb($params['image'], 'products');
        }

        $dataProduct = [
            'category_id' => $params['category_id'],
            'product_type_id' => $params['product_type_id'],
            'supplier_id' => $params['supplier_id'],
            'name' => $params['name'],
            'image' => !empty($image) ? $image : $params['thumb_current'],
            'sku_code' => $params['sku_code'],
            'slug' => Str::slug($params['name']),
            'size' => $params['size'] ? $params['size'] : null,
            'status' => $params['status'] ? $params['status'] : false,
            'import_price' => $params['import_price'] ? $params['import_price'] : null,
            'sale_price' => $params['sale_price'] ? $params['sale_price'] : null,
            'description' => !empty($description) ? $description : null,
            'insurance' => !empty($insurance) ? $insurance : null,
            'rate' => null,
        ];
        DB::beginTransaction();
        try {
            $this->productRepository->update($product, $dataProduct);
            //Thêm vào tags
            if (!empty($params['tags'])) {
                foreach ($params['tags'] as $key => $item) {
                    $tag = $this->tagRepository->firstOrCreate(
                        ['name' => $item],
                        ['name' => $item]
                    );
                    $tagIds[] = $tag->id;
                }
                $product->tags()->sync($tagIds);
            }
            //Update old product_details
            if (!empty($params['old_product_details'])) {
                foreach ($params['old_product_details'] as $key => $old_product_detail) {
                    $productDetail = $this->productDetailRepository->findById($key);
                    $dataProductDetail = array_merge($old_product_detail, ['product_id' => $product->id]);
                    $this->productDetailRepository->update($productDetail, $old_product_detail);

                    //Thêm vào bảng product_images
                    if (!empty($old_product_detail['images'])) {
                        foreach ($old_product_detail['images'] as $image) {
                            $product_image['name'] = $this->snapshotRepository->uploadProductImages($image, 'product_images');
                            $product_image['product_id'] = $product->id;
                            $product_image['product_detail_id'] = $productDetail->id;
                            $this->productImageRepository->create($product_image);
                        }
                    }
                }
            } else {
                $this->productDetailRepository->deleteProductDetailByProductId($product->id);
            }

            //create new product_details
            if (!empty($params['product_details'])) {
                foreach ($params['product_details'] as $key => $product_detail) {
                    $dataProductDetail = array_merge($product_detail, ['product_id' => $product->id]);
                    $productDetail = $this->productDetailRepository->create($dataProductDetail);

                    //Thêm vào bảng product_images
                    if (!empty($product_detail['images'])) {
                        foreach ($product_detail['images'] as $image) {
                            $product_image['name'] = $this->snapshotRepository->uploadProductImages($image, 'product_images');
                            $product_image['product_id'] = $product->id;
                            $product_image['product_detail_id'] = $productDetail->id;
                            $this->productImageRepository->create($product_image);
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ['Lỗi hệ thống không thể lưu sản phẩm!', false];
        }

        return ['Sửa sản phẩm thành công', true];
    }

    public function getLimitProducts(int $limit)
    {
        $products = $this->productRepository->getLimitProducts($limit);

        return $products;
    }
}
