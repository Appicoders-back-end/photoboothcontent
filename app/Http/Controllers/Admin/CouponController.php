<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\CreateCouponRequest;
use App\Http\Requests\Admin\Coupon\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCouponRequest $request)
    {
        try {

            $coupon = new Coupon();
            $coupon->name = $request->name;
            $coupon->description = $request->description;
            $coupon->code = $request->code;
            $coupon->price = $request->price;
            $coupon->number_of_video = $request->number_of_video;
            $coupon->number_of_images = $request->number_of_images;
            $coupon->number_of_documents = $request->number_of_documents;
            $coupon->status = $request->status;
            $coupon->save();

            return redirect()->route('admin.coupons.index')->with('success', 'Coupon has been created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, string $id)
    {
        try {

            $coupon = Coupon::find($id);
            $coupon->name = $request->name;
            $coupon->description = $request->description;
            $coupon->code = $request->code;
            $coupon->price = $request->price;
            $coupon->number_of_video = $request->number_of_video;
            $coupon->number_of_images = $request->number_of_images;
            $coupon->number_of_documents = $request->number_of_documents;
            $coupon->status = $request->status;
            $coupon->save();

            return redirect()->route('admin.coupons.index')->with('success', 'Coupon has been updated successfully');

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
            $deleteCoupon = Coupon::find($id);
            $res = $deleteCoupon->delete();
            if ($res) {
                return back()->with('success', 'Coupon has been successfully deleted .');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.coupons.index')->with('error', $exception->getMessage());
        }
    }
}
