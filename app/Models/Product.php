<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductImages;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    protected $fillable = ['title', 'price', 'stock', 'description'];

    public function images()
    {
        return $this->hasMany(ProductImages::class, "product_id", "id");
    }

    public function getImages()
    {
        if ($this->images->count() == null) {
            return [
                asset('/') . "admin_assets/img/promo-dummy.jpg"
            ];
        }

        $images = [];
        foreach ($this->images as $image) {
            $images[] = url('/') . '/storage/uploads/' . $image->image;
        }

        return $images;
    }
}
