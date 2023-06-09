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
            } else {
                if ($page) {
                    $request->merge(['headerSectionImg' => $request->old_image]);
                }
            }

            if ($request->aboutSectionImage) {
                $aboutSectionImage = saveFile($request->aboutSectionImage, "homepage");
                $request->merge(['aboutSectionImg' => $aboutSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['aboutSectionImg' => $request->old_image_about]);
                }
            }

            if ($request->servicesSectionImage) {
                $servicesSectionImage = saveFile($request->servicesSectionImage, "homepage");
                $request->merge(['servicesSectionImg' => $servicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['servicesSectionImg' => $request->old_image_service]);
                }
            }

            if ($request->bulletOneServicesSectionImage) {
                $bulletOneServicesSectionImage = saveFile($request->bulletOneServicesSectionImage, "homepage");
                $request->merge(['bulletOneImg' => $bulletOneServicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['bulletOneImg' => $request->old_b_one_image_service]);
                }
            }

            if ($request->bulletTwoServicesSectionImage) {
                $bulletTwoServicesSectionImage = saveFile($request->bulletTwoServicesSectionImage, "homepage");
                $request->merge(['bulletTwoImg' => $bulletTwoServicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['bulletTwoImg' => $request->old_b_two_image_service]);
                }
            }

            if ($request->bulletThreeServicesSectionImage) {
                $bulletThreeServicesSectionImage = saveFile($request->bulletThreeServicesSectionImage, "homepage");
                $request->merge(['bulletThreeImg' => $bulletThreeServicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['bulletThreeImg' => $request->old_b_three_image_service]);
                }
            }

            $page->content = json_encode($request->except('id', '_token', 'headerSectionImage', 'aboutSectionImage', 'servicesSectionImage', 'bulletOneServicesSectionImage', 'bulletTwoServicesSectionImage', 'bulletThreeServicesSectionImage'));
            $page->save();

            return redirect()->route('admin.home')->with('success', 'Homepage has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    public function storeAboutPage(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if ($request->about_image) {
                $about_image = saveFile($request->about_image, "aboutpage");
                $request->merge(['aboutImg' => $about_image]);
            } else {
                if ($page) {
                    $request->merge(['aboutImg' => $request->old_image]);
                }
            }
            if ($request->ser_about_image) {
                $ser_about_image = saveFile($request->ser_about_image, "aboutpage");
                $request->merge(['aboutServImg' => $ser_about_image]);
            } else {
                if ($page) {
                    $request->merge(['aboutServImg' => $request->old_serv_image]);
                }
            }

            if ($request->bulletOneServicesSectionImage) {
                $bulletOneServicesSectionImage = saveFile($request->bulletOneServicesSectionImage, "homepage");
                $request->merge(['bulletOneImg' => $bulletOneServicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['bulletOneImg' => $request->old_b_one_image_service]);
                }
            }

            if ($request->bulletTwoServicesSectionImage) {
                $bulletTwoServicesSectionImage = saveFile($request->bulletTwoServicesSectionImage, "homepage");
                $request->merge(['bulletTwoImg' => $bulletTwoServicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['bulletTwoImg' => $request->old_b_two_image_service]);
                }
            }

            if ($request->bulletThreeServicesSectionImage) {
                $bulletThreeServicesSectionImage = saveFile($request->bulletThreeServicesSectionImage, "homepage");
                $request->merge(['bulletThreeImg' => $bulletThreeServicesSectionImage]);
            } else {
                if ($page) {
                    $request->merge(['bulletThreeImg' => $request->old_b_three_image_service]);
                }
            }
            $page->content = json_encode($request->except('id', '_token', 'about_image', 'ser_about_image'));
            $page->save();

            return redirect()->route('admin.about')->with('success', 'About page has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    public function storeContentPage(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if ($request->content_image) {
                $content_image = saveFile($request->content_image, "contentpage");
                $request->merge(['contentImg' => $content_image]);
            } else {
                if ($page) {
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

    public function storeMembershipPage(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if ($request->membership_image) {
                $membership_image = saveFile($request->membership_image, "membershippage");
                $request->merge(['membershipImg' => $membership_image]);
            } else {
                if ($page) {
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

    public function storeCouponPage(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if ($request->coupon_image) {
                $coupon_image = saveFile($request->coupon_image, "couponpage");
                $request->merge(['couponImg' => $coupon_image]);
            } else {
                if ($page) {
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

    public function shop()
    {
        $shopPage = Page::firstOrCreate([
            'slug' => 'shop'
        ], [
            'slug' => 'shop',
            'name' => 'Shop'
        ]);

        $data = [
            'shop' => $shopPage,
            'content' => json_decode($shopPage->content)
        ];
        return view('admin.pages.shop', $data);
    }

    public function storeShopPage(Request $request)
    {
        try {
            $page = Page::find($request->id);
            if ($request->shop_image) {
                $shop_image = saveFile($request->shop_image, "shoppage");
                $request->merge(['shopImg' => $shop_image]);
            } else {
                if ($page) {
                    $request->merge(['shopImg' => $request->old_image]);
                }
            }
            $page->content = json_encode($request->except('id', '_token', 'shop_image'));
            $page->save();

            return redirect()->route('admin.shop')->with('success', 'Shop page has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
}
