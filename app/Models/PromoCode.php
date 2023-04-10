<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
{
    use HasFactory, SoftDeletes;

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';
    public const FIXED = 'fixed';
    public const PERCENTAGE = 'percentage';

    public function scopeActive($query)
    {
        return $query->where('status', Self::ACTIVE);
    }

    public function getImage()
    {
        if ($this['image'] == null) {
            return asset('/') . "admin_assets/img/promo-dummy.jpg";
        }

        return url('/') . '/' . $this['image'];
    }
}
