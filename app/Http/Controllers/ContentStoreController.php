<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Page;

class ContentStoreController extends Controller
{
    public function index(Request $request)
    {
        $contentPage = Page::firstOrCreate([
            'slug' => 'content'
        ], [
            'slug' => 'content',
            'name' => 'Content Store'
        ]);

        $baseContentQuery = Content::query()->active();

        if (isset($request->keyword) && $request->keyword != null) {
            $baseContentQuery = $baseContentQuery->where('name', 'like', '%' . $request->keyword . '%')->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        if (isset($request->categories) && $request->categories != null) {
            $baseContentQuery = $baseContentQuery->whereIn('category_id', $request->categories);
        }

        $data = [
            'content' => json_decode($contentPage->content),
            'categories' => Category::with('subcategories')->whereNull('parent_id')->active()->orderByDesc('id')->get(),
            'content_store' => $baseContentQuery->orderByDesc('id')->get()
        ];

        return view('content-store', $data);
    }
}
