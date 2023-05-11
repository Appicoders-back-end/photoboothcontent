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
        $products = Product::orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $data = [
            'related_products' => Product::select('id', 'title')->get()
        ];
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                "title" => "required",
                'price' => "numeric|between:0,99999.99",
                "description" => "required",
//                "image" => "required|array",
            ]);

            $product = Product::create([
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
            ]);

            if (isset($request->images) && count($request->images) > 0) {
                foreach ($request->images as $product_image) {
                    ProductImages::insert([
                        'product_id' => $product->id,
                        'image' => $product_image
                    ]);
                }
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
        $images = $product->images;
        $imagess = [];
        foreach ($images as $image) {
            $obj['image'] = $image->image;
            $obj['name'] = str_replace('product_images/', ' ', $image->image);
            $file_path = public_path('storage/uploads/') . $image->image;
            $obj['size'] = filesize($file_path);
            $obj['path'] = url('storage/uploads/' . $image->image);
            array_push($imagess, $obj);
        }

        $data = [
            'product' => $product,
            'images' => $imagess
        ];

        return view('admin.products.edit', $data);
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
                "stock" => "required",
            ]);

            $product = Product::findOrFail($id);

            $product->update([
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description
            ]);

            ProductImages::where('product_id', $id)->forceDelete();
            if (isset($request->images) && count($request->images) > 0) {
                foreach ($request->images as $product_image) {
                    ProductImages::insert([
                        'product_id' => $product->id,
                        'image' => $product_image
                    ]);
                }
            }

            return redirect()->route('admin.product.index')->with('success', "Product Updated Successfully");

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $deleteProduct = Product::find($id);
            $productImages = ProductImages::where('product_id', $id)->get();
            foreach ($productImages as $key => $pdImages) {
                $folderPath = storage_path('app/public/' . $pdImages->image);
                if (File::exists($folderPath)) {
                    File::delete($folderPath);
                }
            }
            ProductImages::where('product_id', $id)->delete();
            $res = $deleteProduct->delete();
            if ($res) {
                return back()->with('success', 'Product has been successfully deleted .');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.product.index')->with('error', $exception->getMessage());
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            $find_image = ProductImages::where('image', $request->name)->first();
            $folderPath = storage_path('app/public/uploads/' . $request->name);

            if (File::exists($folderPath)) {
                File::delete($folderPath);
            }

            if ($find_image) {
                $find_image->forceDelete();
            }

            return response()->json([
                'status' => true,
                'message' => 'Image has been deleted successfully'
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function uploads(Request $request)
    {
        $path = 'product_images';
        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move(public_path() . '/storage/uploads/' . $path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
            'path' => $path . '/' . $name,
        ]);
    }

    public function getImages($id)
    {
        $images = ProductImages::where('product_id', $id)->get();
        foreach ($images as $image) {
            $tableImages[] = $image['filename'];
        }
        $storeFolder = public_path('uploads/gallery');
        $file_path = public_path('uploads/gallery/');
        $files = scandir($storeFolder);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && in_array($file, $tableImages)) {
                $obj['name'] = $file;
                $file_path = public_path('uploads/gallery/') . $file;
                $obj['size'] = filesize($file_path);
                $obj['path'] = url('public/uploads/gallery/' . $file);
                $data[] = $obj;
            }

        }
        return response()->json($data);
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            $product->status = ($request->status == 'inactive') ? Product::INACTIVE : Product::ACTIVE;
            $product->save();
            return redirect()->route('admin.product.index')->with('success', 'Product Status has been updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
