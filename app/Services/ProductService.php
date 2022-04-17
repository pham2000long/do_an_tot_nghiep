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
            'image' => $image,
            'sku_code' => $params['sku_code'],
            'slug' => Str::slug($params['name']),
            'size' => $params['size'],
            'status' => $params['status'],
            'description' => !empty($description) ? $description : null,
            'insurance' => !empty($insurance) ? $insurance : null,
            'transport' => null,
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
        dd($params);
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
            'image' => $image,
            'sku_code' => $params['sku_code'],
            'slug' => Str::slug($params['name']),
            'size' => $params['size'],
            'status' => $params['status'],
            'description' => !empty($description) ? $description : null,
            'insurance' => !empty($insurance) ? $insurance : null,
            'transport' => null,
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
}
