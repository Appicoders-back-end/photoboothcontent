<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    public const IMAGE = 'image';
    public const VIDEO = 'video';
    public const DOCUMENT = 'document';
    public const AUDIO = 'audio';

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    public function scopeActive($query)
    {
        return $query->whereStatus(Self::ACTIVE);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImage()
    {
        if ($this['image'] == null) {
            return asset('/') . "admin_assets/img/promo-dummy.jpg";
        }

        return url('/') . '/' . $this['image'];
    }

    public function getThumbnailImage()
    {
        if ($this['image'] == null) {
            return asset('/') . "admin_assets/img/promo-dummy.jpg";
        }

        return url('/') . '/' . $this['thumbnail_image'];
    }

    public function downloads()
    {
        return $this->hasMany(UserDownload::class);
    }

    public function isAlreadyDownloaded()
    {

        if (!auth()->check()) {
            return false;
        }

        $isAlreadyExist = UserDownload::where('content_id', $this->id)->exists();
        if ($isAlreadyExist) {
            return true;
        }

        return false;
    }

    public function getWatermarkAttachment()
    {
        if ($this['watermark_attachment'] == null) {
            return asset('/') . "admin_assets/img/promo-dummy.jpg";
        }

        return url('/') . '/' . $this['watermark_attachment'];
    }
}
