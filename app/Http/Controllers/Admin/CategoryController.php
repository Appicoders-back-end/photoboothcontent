<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subcategories')->whereNull('parent_id')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "type" => "required_if:parent_id,==,null",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        try {
            $category = new Category();

            $parentCat = null;
            if ($request->parent_id) {
                $parentCat = Category::where("id", $request->parent_id)->first();
            }
//            $imageName = saveFile($request->image, "categories");

            $category->name = $request->name ?? null;
            $category->parent_id = $request->parent_id;
            $category->slug = Str::slug($request->name);
            $category->type = $parentCat?->type;
            $category->description = $request->description ?? null;
            $category->status = $request->status;
//            $category->image = $imageName;
            $category->save();

            return redirect()->route('admin.categories.index')->with('success', 'Category has been created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sub_categories = Category::where('parent_id', $id)->get();
        $categories = Category::find($id);
        return view('admin.categories.sub_categories', compact('sub_categories', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $category = Category::find($id);
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                "name" => "required",
            ]);

            $category = Category::find($id);
            /*if ($request->image) {
                deleteAttachment($category->image);
                $imageName = saveFile($request->image, "categories");
                $category->image = $imageName;
            }*/

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description ?? null;
            $category->status = $request->status;
            $category->parent_id = $request->parent_id ?? null;

            $category->save();
            return redirect()->route('admin.categories.index')->with('success', "Category Updated Successfully");

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleteCategory = Category::find($id);
            deleteAttachment($deleteCategory->image);
            $res = $deleteCategory->delete();
            if ($res) {
                return back()->with('success', 'Category has been successfully deleted .');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.categories.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Request $request , $id){
        try {
            $category = Category::find($id);

            $category->status = ($request->status == 'inactive')?Category::INACTIVE:Category::ACTIVE;
            $category->save();
            return redirect()->route('admin.categories.index')->with('success', 'Status has been updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
