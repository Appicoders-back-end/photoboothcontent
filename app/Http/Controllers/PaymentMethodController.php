<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('payment_method.index',compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'card_number' => 'required|numeric',
                'card_holder_name' => 'required',
                'exp_date' => 'required',
                'cvc' => 'required|numeric|digits:3',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }

            $user = auth()->user();
            $stripeService = new StripeService();
            $token = $stripeService->createToken($request);
            $stripeCustomer = $stripeService->getCustomer($user);
            $willBeDefault = $stripeCustomer->default_source == null ? true : false;
            $source = $stripeService->createSource($stripeCustomer->id, $token);
            $paymentMethod = new PaymentMethod();
            $paymentMethod->user_id           = $user->id;
            $paymentMethod->card_holder_name  = $request->card_holder_name;
            $paymentMethod->stripe_source_id  = $source->id;
            $paymentMethod->is_default_card   = 1;
            $paymentMethod->card_brand        = $source->brand;
            $paymentMethod->card_end_number   = $source->last4;

            $paymentMethod->save();
            return redirect()->route('payment-methods.index')->with('success', "Card has been added successfully");

        } catch (\Exception $exception) {
           return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = PaymentMethod::find($id);
        if ($payment) {
            $payment->delete();
            return back()->with('success', "Card has been deleted successfully");
        }
        return back()->with('error', 'Card has been not deleted ');
    }
}
