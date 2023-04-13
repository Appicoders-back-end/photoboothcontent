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

        $data = [
            'content' => json_decode($contentPage->content),
            'categories' => Category::with('subcategories')->whereNull('parent_id')->active()->orderByDesc('id')->get(),
            'content_store' => Content::active()->orderByDesc('id')->get()
        ];
        return view('content-store', $data);
    }
}
