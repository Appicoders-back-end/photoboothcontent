<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_id',
        'user_coupon_id'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class)->withTrashed();
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function UserCoupon()
    {
        return $this->belongsTo(UserCoupon::class);
    }
}
