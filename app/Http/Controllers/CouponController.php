<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Page;

class CouponController extends Controller
{
    public function index()
    {
        $contentPage = Page::firstOrCreate([
            'slug' => 'coupon'
        ], [
            'slug' => 'coupon',
            'name' => 'Coupons'
        ]);
        $coupons = Coupon::active()->orderByDesc('id')->get();

        $data = [
            'content' => json_decode($contentPage->content),
            'coupons' => $coupons
        ];

        return view('coupons', $data);
    }
}
