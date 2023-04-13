<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Services\StripeService;
use Illuminate\Http\Request;
use App\Models\Page;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membershipPage = Page::firstOrCreate([
            'slug' => 'membership'
        ], [
            'slug' => 'membership',
            'name' => 'Membership'
        ]);

        $data = [
            'content' => json_decode($membershipPage->content),
            'subscriptions' => Subscription::where('status',Subscription::Active)->get()
        ];
        
        return view('membership',$data);
    }

    public function buyMembership(Request $request, StripeService $stripeService)
    {

    }
}
