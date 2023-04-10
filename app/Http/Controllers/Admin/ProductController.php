<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                "title" => "required",
                'price' => "numeric|between:0,99999.99",
                "description" => "required",
                "image" => "required|array",
            ]);
            
            $product=Product::create([
                'title'=>$request->title,
                'price'=>$request->price,
                'description'=>$request->description
            ]);
            foreach ($request->image as $key => $product_image) {
               $product_image= $product_image->store('product_images', 'public');
               ProductImages::insert([
                   "product_id"=>$product->id,
                   'image' =>  $product_image
               ]);
            }
            return redirect()->route('admin.product.index')->with('success', 'Product has been created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                "title" => "required",
                'price' => "numeric|between:0,99999.99",
                "description" => "required",
            ]);
            $product=Product::findOrFail($id);

            $product->update([
                'title'=>$request->title,
                'price'=>$request->price,
                'description'=>$request->description
            ]);
            return redirect()->route('admin.product.index')->with('success', "Product Updated Successfully");

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
            $deleteProduct = Product::find($id);
            $productImages=ProductImages::where('product_id',$id)->get();
            foreach ($productImages as $key => $pdImages) {
                $folderPath = storage_path('app/public/'.$pdImages->image);
                if(File::exists($folderPath)) {
                    File::delete($folderPath);
                }
            }
            ProductImages::where('product_id',$id)->delete();
            $res = $deleteProduct->delete();
            if ($res) {
                return back()->with('success', 'Product has been successfully deleted .');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.product.index')->with('error', $exception->getMessage());
        }
    }
}
