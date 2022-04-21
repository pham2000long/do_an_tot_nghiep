<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'product_type_id',
        'supplier_id',
        'name',
        'image',
        'sku_code',
        'slug',
        'size',
        'status',
        'import_price',
        'sale_price',
        'description',
        'insurance',
        'rate'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship belongsTo with Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship belongsTo with ProductType
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    /**
     * Relationship belongsTo with Supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Relationship hasMany with productDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    /**
     * Relationship belongsToMany with tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    /**
     * Relationship hasMany with productImages
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
