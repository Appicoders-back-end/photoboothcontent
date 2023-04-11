<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Page;
use App\Models\PromoCode;
use App\Models\Subscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $homePage = Page::firstOrCreate([
            'slug' => 'home'
        ], [
            'slug' => 'home',
            'name' => 'Home'
        ]);

        $data = [
            'content' => json_decode($homePage->content),
            'promoCodes' => PromoCode::active()->get(),
            'coupons' => Coupon::active()->get(),
        ];
        // dd($data);
        return view('home', $data);
    }

    public function aboutUs()
    {
        return view('about-us');
    }

}
