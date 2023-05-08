<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentStore\Images\CreateContentStoreImageRequest;
use App\Http\Requests\Admin\ContentStore\Images\UpdateContentStoreImageRequest;
use App\Models\Category;
use App\Services\ContentStoreService;
use App\Models\Content;

class ContentImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Content::with('category')->where('type', Content::IMAGE)->orderByDesc('id')->get();
        $data = [
            'images' => $images
        ];

        return view('admin.content_store.images.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => Category::where('type', Category::IMAGE)->select('id', 'name')->get(),
        ];

        return view('admin.content_store.images.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContentStoreImageRequest $request, ContentStoreService $contentStoreService)
    {
        $contentStoreService->store($request->all());

        return redirect()->route('admin.content_images.index')->with('success', 'Image has been created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data = [
            'categories' => Category::where('type', Category::IMAGE)->select('id', 'name')->get(),
            'content' => Content::find($id)
        ];

        return view('admin.content_store.images.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentStoreImageRequest $request, ContentStoreService $contentStoreService)
    {
        $contentStoreService->update($request->all());

        return redirect()->route('admin.content_images.index')->with('success', 'Image has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleteContent = Content::find($id);
            if ($deleteContent->downloads->count() == 0) {
                deleteAttachment($deleteContent->thumbnail_image);
                deleteAttachment($deleteContent->image);
            }
            $res = $deleteContent->delete();
            if ($res) {
                return back()->with('success', 'Photo has been deleted successfully.');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.content_images.index')->with('error', $exception->getMessage());
        }
    }
}
