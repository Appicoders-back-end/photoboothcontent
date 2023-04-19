<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coupon_id',
        'subscription_id',
        'stripe_charge_id',
        'code',
        'price',
        'actual_price',
        'discount',
        'total_videos',
        'downloaded_videos',
        'total_images',
        'downloaded_images',
        'total_documents',
        'downloaded_documents',
        'total_audio',
        'downloaded_audio'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class)->withTrashed();
    }

    public function checkVideosDownloadLimit()
    {
        return $this->total_videos - $this->downloaded_videos;
    }

    public function checkImagesDownloadLimit()
    {
        return $this->total_images - $this->downloaded_images;
    }

    public function checkDocumentDownloadLimit()
    {
        return $this->total_documents - $this->downloaded_documents;
    }
}
