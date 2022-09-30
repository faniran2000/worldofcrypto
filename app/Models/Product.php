<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function order_product() {
        return $this->hasMany(OrderProduct::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
    public function product() {
        return $this->hasMany(Product::class);
    }
}
