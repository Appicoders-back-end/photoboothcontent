<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentStore\Documents\CreateContentStoreDocumentRequest;
use App\Http\Requests\Admin\ContentStore\Documents\UpdateContentStoreDocumentRequest;
use App\Models\Category;
use App\Models\Content;
use App\Services\ContentStoreService;
use Illuminate\Http\Request;

class ContentDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Content::with('category')->where('type', Content::DOCUMENT)->get();
        $data = [
            'images' => $images
        ];

        return view('admin.content_store.documents.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => Category::where('type', Category::DOCUMENT)->select('id', 'name')->get(),
        ];

        return view('admin.content_store.documents.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContentStoreDocumentRequest $request, ContentStoreService $contentStoreService)
    {
        $contentStoreService->store($request->all());

        return redirect()->route('admin.content_documents.index')->with('success', 'Document has been created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'categories' => Category::where('type', Category::DOCUMENT)->select('id', 'name')->get(),
            'content' => Content::find($id)
        ];

        return view('admin.content_store.documents.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentStoreDocumentRequest $request, ContentStoreService $contentStoreService)
    {
        $contentStoreService->update($request->all());

        return redirect()->route('admin.content_documents.index')->with('success', 'Content has been updated successfully');
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
                return back()->with('success', 'Document has been deleted successfully.');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.content_documents.index')->with('error', $exception->getMessage());
        }
    }
}
