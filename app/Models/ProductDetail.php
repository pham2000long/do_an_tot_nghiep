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
        'quantity',
        'import_price',
        'sale_price'
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
     * Relationship hasMany with productImages
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
