<?php

namespace App\Http\Controllers;

use App\Http\Requests\Front\UpdatePassword;
use App\Http\Requests\FrontEnd\UpdatePasswordRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Coupon;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\PaymentMethod;
use App\Models\PromoCode;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        $paymentMethods = PaymentMethod::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $userSubcription = UserSubscription::where('user_id', auth()->user()->id)->where('is_expired',0)->orderBy('id', 'DESC')->first();
        $user = User::find(auth()->user()->id);
        return view('dashboard', compact('user', 'paymentMethods','userSubcription'));
    }

    public function editProfile()
    {
        $user = User::find(auth()->user()->id);
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'contact_no' => 'required|numeric|digits:10',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }

            $user = User::find(auth()->user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->contact_no = $request->contact_no;
            $user->save();

            return redirect()->route('dashboard')->with('success', "Profile Updated Successfully");

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function changePassword(){
        return view('changePassword');
    }

    public function updatePassword(UpdatePasswordRequest $request){
        try {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('changePassword')->with('success', __('Password has been updated successfully!'));
        } catch (\Exception $exception) {
            return redirect()->route('changePassword')->with('error', $exception->getMessage());
        }
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

        $categories = Category::with('subcategories')->active()->whereNull('parent_id')->select('id', 'name', 'type')->orderByDesc('id')->get()->each(function ($category) {
            $contents = Content::where('category_id', $category->id)->orWhereIn('category_id', $category->subcategories->count() > 0 ? $category->subcategories->pluck('id')->toArray() : [])->orderByDesc('id')->get();
            $category->contents = $contents;
        });

        $data = [
            'content' => json_decode($homePage->content),
            'promoCodes' => PromoCode::active()->get(),
            'coupons' => Coupon::active()->limit(3)->orderBydesc('id')->get(),
            'categories' => $categories
        ];

        return view('home', $data);
    }

    public function aboutUs()
    {
        $aboutPage = Page::firstOrCreate([
            'slug' => 'about'
        ], [
            'slug' => 'about',
            'name' => 'About'
        ]);

        $data = [
            'content' => json_decode($aboutPage->content)
        ];

        return view('about-us', $data);
    }

    public function contactUs(){
        return view('contact-us');
    }

    public function contactStore(Request $request){
        try {

             $validator = Validator::make($request->all(), [
                 "name" => "required",
                 "email" => "required",
                 "phone" => "required",
                 "message" => "required",
             ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->phone = $request->phone;
            $inquiry->message = $request->message;
            $inquiry->save();

            return redirect()->route('contact-us')->with('success', __('Your Query has been submitted successfully!'));
        } catch (\Exception $exception) {
            return redirect()->route('contact-us')->with('error', $exception->getMessage());
        }
    }

    public function thankyou()
    {
        return view('thankyou');
    }

}
