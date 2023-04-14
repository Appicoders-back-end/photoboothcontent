<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public const Active = 'active';
    public const InActive = 'inactive';

    public const DURATION_WEEK = 'week';
    public const DURATION_MONTH = 'month';
    public const DURATION_YEAR = 'year';

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function isSubcribed($user_subcription_id){
        $membership = UserSubscription::where('user_id',auth()->user()->id)->latest()->first();

        if ($membership->subscription_id == $user_subcription_id){
            return true;
        }else{
            return false;
        }
    }
}
