<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type', 'description', 'parent_id', 'status'];

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    public const IMAGE = 'image';
    public const VIDEO = 'video';
    public const DOCUMENT = 'document';
    public const AUDIO = 'audio';

    public function scopeActive($query)
    {
        return $query->whereStatus(Self::ACTIVE);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getImage()
    {
        if ($this['image'] == null) {
            return asset('/') . "admin_assets/img/promo-dummy.jpg";
        }

        return url('/') . '/' . $this['image'];
    }

}
