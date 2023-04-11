<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Page;
use App\Models\PromoCode;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function dashboard()
    {
        $user = User::find(auth()->user()->id);
        return view('dashboard',compact('user'));
    }

    public function editProfile(){
        $user = User::find(auth()->user()->id);
        return view('profile',compact('user'));
    }

    public function updateProfile(Request $request){
        try {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'contact_no' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);

            $user = User::find(auth()->user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name.' '.$request->last_name;
            $user->contact_no = $request->contact_no;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('dashboard')->with('success', "Profile Updated Successfully");

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function payment(){
        return view('payment');
    }

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
