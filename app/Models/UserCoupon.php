<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_id',
        'stripe_charge_id',
        'code',
        'price',
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
}
