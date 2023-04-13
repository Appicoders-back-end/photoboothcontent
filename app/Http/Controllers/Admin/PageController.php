<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $homePage = Page::firstOrCreate([
            'slug' => 'home'
        ], [
            'slug' => 'home',
            'name' => 'Home'
        ]);

        $data = [
            'home' => $homePage,
            'content' => json_decode($homePage->content)
        ];
        return view('admin.pages.home', $data);
    }
    public function about()
    {
        $aboutPage = Page::firstOrCreate([
            'slug' => 'about'
        ], [
            'slug' => 'about',
            'name' => 'About'
        ]);

        $data = [
            'about' => $aboutPage,
            'content' => json_decode($aboutPage->content)
        ];
        return view('admin.pages.about', $data);
    }
    public function content()
    {
        $contentPage = Page::firstOrCreate([
            'slug' => 'content'
        ], [
            'slug' => 'content',
            'name' => 'Content Store'
        ]);

        $data = [
            'content_' => $contentPage,
            'content' => json_decode($contentPage->content)
        ];
        return view('admin.pages.content', $data);
    }
    public function membership()
    {
        $membershipPage = Page::firstOrCreate([
            'slug' => 'membership'
        ], [
            'slug' => 'membership',
            'name' => 'Membership'
        ]);

        $data = [
            'membership' => $membershipPage,
            'content' => json_decode($membershipPage->content)
        ];
        return view('admin.pages.membership', $data);
    }
    public function coupon()
    {
        $couponPage = Page::firstOrCreate([
            'slug' => 'coupon'
        ], [
            'slug' => 'coupon',
            'name' => 'Coupons'
        ]);

        $data = [
            'coupon' => $couponPage,
            'content' => json_decode($couponPage->content)
        ];
        return view('admin.pages.coupon', $data);
    }
    public function storeHomePage(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if ($request->headerSectionImage) {
                $headerSectionImage = saveFile($request->headerSectionImage, "homepage");
                $request->merge(['headerSectionImg' => $headerSectionImage]);
            }

            if ($request->aboutSectionImage) {
                $aboutSectionImage = saveFile($request->aboutSectionImage, "homepage");
                $request->merge(['aboutSectionImg' => $aboutSectionImage]);
            }

            if ($request->servicesSectionImage) {
                $servicesSectionImage = saveFile($request->servicesSectionImage, "homepage");
                $request->merge(['servicesSectionImg' => $servicesSectionImage]);
            }

            $page->content = json_encode($request->except('id', '_token', 'headerSectionImage', 'aboutSectionImage', 'servicesSectionImage'));
            $page->save();

            return redirect()->route('admin.home')->with('success', 'Homepage has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
    public function storeAboutPage(Request $request){
        try {
            $page = Page::find($request->id);
            if ($request->about_image) {
                $about_image = saveFile($request->about_image, "aboutpage");
                $request->merge(['aboutImg' => $about_image]);
            }else{
                if($page){
                  $request->merge(['aboutImg' => $request->old_image]);  
                }
            }
            if ($request->ser_about_image) {
                $ser_about_image = saveFile($request->ser_about_image, "aboutpage");
                $request->merge(['aboutServImg' => $ser_about_image]);
            }else{
                if($page){
                  $request->merge(['aboutServImg' => $request->old_serv_image]);  
                }
            }
            $page->content = json_encode($request->except('id', '_token', 'about_image','ser_about_image'));
            $page->save();

            return redirect()->route('admin.about')->with('success', 'About page has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
    public function storeContentPage(Request $request){
        try {
            $page = Page::find($request->id);
            if ($request->content_image) {
                $content_image = saveFile($request->content_image, "contentpage");
                $request->merge(['contentImg' => $content_image]);
            }else{
                if($page){
                  $request->merge(['contentImg' => $request->old_image]);  
                }
            }
            $page->content = json_encode($request->except('id', '_token', 'content_image'));
            $page->save();

            return redirect()->route('admin.content')->with('success', 'Content page has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
    public function storeMembershipPage(Request $request){
        try {
            $page = Page::find($request->id);
            if ($request->membership_image) {
                $membership_image = saveFile($request->membership_image, "membershippage");
                $request->merge(['membershipImg' => $membership_image]);
            }else{
                if($page){
                  $request->merge(['membershipImg' => $request->old_image]);  
                }
            }
            $page->content = json_encode($request->except('id', '_token', 'membership_image'));
            $page->save();

            return redirect()->route('admin.membership')->with('success', 'Membership page has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
    public function storeCouponPage(Request $request){
        try {
            $page = Page::find($request->id);
            if ($request->coupon_image) {
                $coupon_image = saveFile($request->coupon_image, "couponpage");
                $request->merge(['couponImg' => $coupon_image]);
            }else{
                if($page){
                  $request->merge(['couponImg' => $request->old_image]);  
                }
            }
            $page->content = json_encode($request->except('id', '_token', 'coupon_image'));
            $page->save();

            return redirect()->route('admin.coupon')->with('success', 'Coupon page has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
}
