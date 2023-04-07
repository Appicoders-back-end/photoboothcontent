<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentStore\Videos\CreateContentStoreVideoRequest;
use App\Http\Requests\Admin\ContentStore\Videos\UpdateContentStoreVideoRequest;
use App\Models\Category;
use App\Models\Content;
use App\Services\ContentStoreService;

class ContentVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Content::with('category')->where('type', Content::VIDEO)->get();
        $data = [
            'videos' => $videos
        ];

        return view('admin.content_store.videos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => Category::where('type', Category::VIDEO)->select('id', 'name')->get(),
        ];

        return view('admin.content_store.videos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContentStoreVideoRequest $request, ContentStoreService $contentStoreService)
    {
        $contentStoreService->store($request->all());

        return redirect()->route('admin.content_videos.index')->with('success', 'Video has been created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'categories' => Category::where('type', Category::VIDEO)->select('id', 'name')->get(),
            'content' => Content::find($id)
        ];

        return view('admin.content_store.videos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentStoreVideoRequest $request, ContentStoreService $contentStoreService)
    {
        $contentStoreService->update($request->all());

        return redirect()->route('admin.content_videos.index')->with('success', 'Video has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
