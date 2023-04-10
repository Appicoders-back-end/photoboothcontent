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
}
