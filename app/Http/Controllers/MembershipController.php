<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Services\StripeService;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::where('status',Subscription::Active)->get();
        return view('membership',compact('subscriptions'));
    }

    public function buyMembership(Request $request, StripeService $stripeService)
    {

    }
}
