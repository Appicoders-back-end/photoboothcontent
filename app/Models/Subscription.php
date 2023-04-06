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
        return $this->belongsTo(Category::class); //todo will fixed
    }
}
