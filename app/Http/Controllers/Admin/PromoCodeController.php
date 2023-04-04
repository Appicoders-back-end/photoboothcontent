<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('work');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promo_codes = PromoCode::all();
        return view('admin.promoCode.promo-codes', compact('promo_codes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        try {
            $request->validate([
                "name" => "required",
                "amount" => "required",
                "code" => "required",
                "image" => "required",
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('admin_assets\img\promo-codes'), $imageName);

            $promo_code = new PromoCode();
            $promo_code->name = $request->name;
            $promo_code->amount = $request->amount;
            $promo_code->type = $request->type;
            $promo_code->code = $request->code;
            $promo_code->image = $imageName;

            if ($promo_code->save()) {
                return back()->with('success', 'Promo Codes created');
            }
            return back()->with('error', 'Promo Codes  not created');
        } catch (\Exception $exception) {
            return redirect()->route('admin.promo.create')->with('error', $exception->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
