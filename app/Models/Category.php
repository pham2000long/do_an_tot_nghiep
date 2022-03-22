<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'icon',
        'status',
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
     * Relationship hasMany with ProductTypes
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }

    /**
     * Relationship hasMany with Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
