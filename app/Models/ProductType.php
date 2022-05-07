<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description'
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
     * Relationship hasMany with Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
