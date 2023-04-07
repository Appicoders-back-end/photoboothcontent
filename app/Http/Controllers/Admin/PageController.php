<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            $page->content = json_encode($request->except('id', '_token'));
            $page->save();

            return redirect()->route('admin.home')->with('success', 'Homepage has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
