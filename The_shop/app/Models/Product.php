<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // laravel 5 Eloquent relationships
    use HasFactory;
    protected $guarded = [];
    // Moi quan he mot nhieu Product_images
    public function images() {
        return $this->hasMany(ProductImage::class,'product_id');
    }
    // Moi quan he Many to Many
    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id','tag_id')
                    ->withTimestamps();
    }
    // Mot san pham thuoc nhieu Category
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
