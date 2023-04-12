<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentStoreController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'categories' => Category::with('subcategories')->whereNull('parent_id')->active()->orderByDesc('id')->get(),
            'content_store' => Content::active()->orderByDesc('id')->get()
        ];

        return view('content-store', $data);
    }
}
