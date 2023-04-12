<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::active()->orderByDesc('id')->get();
        $data = [
            'coupons' => $coupons
        ];

        return view('coupons', $data);
    }
}
