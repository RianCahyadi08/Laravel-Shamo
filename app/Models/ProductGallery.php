<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProductGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id',
        'url'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_id', 'id');
    }

    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }

}
