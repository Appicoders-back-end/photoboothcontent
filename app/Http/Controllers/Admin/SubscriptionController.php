<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subscription\CreateSubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Services\StripeService;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::get();
        return view('admin.subscriptions.index', ['subscriptions' => $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubscriptionRequest $request, StripeService $stripeService)
    {
        try {
            $product = $stripeService->createProduct($request);
            $plan = $stripeService->createPlan($request, $product);
            $subscription = new Subscription();
            $subscription->name = $request->name;
            $subscription->stripe_plan_id = $plan->id;
            $subscription->stripe_product_id = $product->id;
            $subscription->price = $request->price;
            $subscription->interval_time = $request->interval_time;
            $subscription->description = $request->description;
            $subscription->save();

            return redirect()->route('admin.subscriptions.index')->with('success', __('Subscription has been created successfully'));
        } catch (Exception $exception) {
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
