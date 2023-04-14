<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\UserCoupon;
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function myCoupons()
    {
        $coupons = UserCoupon::where('user_id', auth()->user()->id)->orderBydesc('id')->get();
        return view('myCoupons', compact('coupons'));
    }
}
