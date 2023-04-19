<?php

namespace App\Http\Controllers;

use App\Mail\SendCouponCode;
use App\Models\PaymentMethod;
use App\Models\Subscription;
use App\Models\UserCoupon;
use App\Models\UserSubscription;
use App\Services\StripeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            'subscriptions' => Subscription::where('status', Subscription::Active)->get(),
        ];

        return view('membership', $data);
    }

    public function membershipCheckout(Request $request, Subscription $subscription)
    {
        $paymentMethods = PaymentMethod::where('user_id', auth()->user()->id)->select('id', 'card_holder_name', 'card_brand', 'card_end_number')->get();

        if ($paymentMethods->count() == 0) {
            return redirect()->route('payment-methods.create')->with('success', "You have to add payment method first.");
        }

        $data = [
            'subscription' => $subscription,
            'payment_methods' => $paymentMethods
        ];

        return view('buy-membership', $data);
    }

    public function buyMembership(Request $request, StripeService $stripeService)
    {
        $validator = Validator::make($request->all(), [
            'subscription_id' => 'required',
//            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        try {
            $user = auth()->user();
            $customerId = $user->stripe_customer_id;
            $subscription = Subscription::find($request->subscription_id);
            $paymentMethod = PaymentMethod::find($request->payment_method);
            $coupon = $subscription->coupon;

//            $buySubscription = $stripeService->buySubscription($customerId, $subscription, $paymentMethod);

            UserSubscription::create([
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
                'price' => $subscription->price,
//                'payment_method_id' => $paymentMethod->id,
//                'stripe_charge_id' => $buySubscription->id,
                'end_date' => getPlanExpiryDate($subscription),
            ]);

            $generatedCode = generateRandomString(6);
            UserCoupon::create([
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
                'code' => $generatedCode,
                'total_videos' => $coupon->number_of_video,
                'total_images' => $coupon->number_of_images,
                'total_documents' => $coupon->number_of_documents,
            ]);

            Mail::to($user->email)->send(new SendCouponCode($user, $generatedCode, 'Membership Purchased'));

            return redirect()->route('thankyou')->with('success', 'Membership has been purchased successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
