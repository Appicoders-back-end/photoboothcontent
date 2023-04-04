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
        $promo_codes = PromoCode::all();
        return view('admin.promoCode.index', compact('promo_codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promoCode.promo-codes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required",
                "amount" => "required",
                "code" => "required|unique:promo_codes",
                "image" => "required",
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('admin_assets\img\promo-codes'), $imageName);

            $promo_code = new PromoCode();
            $promo_code->name = $request->name;
            $promo_code->amount = $request->amount;
            $promo_code->type = $request->type;
            $promo_code->code = $request->code;
            $promo_code->status = $request->status;
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
        $promo_code = PromoCode::find($id);
        return view('admin.promoCode.edit', compact('promo_code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $promo_code = PromoCode::find($id);

            if ($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('admin_assets\img\promo-codes'), $imageName);
                $promo_code->image = $imageName;
            }

            $promo_code->name = $request->name;
            $promo_code->amount = $request->amount;
            $promo_code->type = $request->type;
            $promo_code->code = $request->code;
            $promo_code->status = $request->status;

            if ($promo_code->save()) {
                return redirect()->route('admin.promo.index')->with('success', "Promo Code Updated Successfully");
            }
            return back()->with('error', 'Promo Code  not Updated');
        } catch (\Exception $exception) {
            return redirect()->route('admin.promo.index')->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deletePromo = PromoCode::find($id);
            $res = $deletePromo->delete();
            if($res){
                return back()->with('success','Promo Code has been successfully deleted .');
            }
        } catch (\Exception $exception) {
            return redirect()->route('admin.promo.index')->with('error', $exception->getMessage());
        }
    }
}
