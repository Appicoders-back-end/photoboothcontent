<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductImages;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'price', 'description'];

    public function images(){
        return $this->hasMany(ProductImages::class,"product_id","id");
    }

}
