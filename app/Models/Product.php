<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductGallery;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_categories_id',
        'name',
        'price',
        'description',
        'tags',
    ];

    public function productGalleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id', 'id');
    }

}
