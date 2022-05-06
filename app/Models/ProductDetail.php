<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'color',
        'import_quantity',
        'quantity'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship hasMany with productImages
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Relationship hasMany with productImages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productImage()
    {
        return $this->hasOne(ProductImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_details() {
        return $this->hasMany(OrderDetail::class, 'product_detail_id', 'id');
    }
}
