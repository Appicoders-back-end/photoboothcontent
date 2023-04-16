<?php

namespace App\Http\Controllers;

use App\Mail\SendCouponCode;
use App\Models\Coupon;
use App\Models\PaymentMethod;
use App\Models\PromoCode;
use App\Models\Subscription;
use App\Models\UserCoupon;
use App\Models\UserSubscription;
use App\Services\StripeService;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index()
    {
        $contentPage = Page::firstOrCreate([
            'slug' => 'coupon'
        ], [
            'slug' => 'coupon',
            'name' => 'Coupons'
        ]);
        $coupons = Coupon::active()->orderByDesc('id')->get();

        $data = [
            'content' => json_decode($contentPage->content),
            'coupons' => $coupons
        ];

        return view('coupons', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function myCoupons()
    {
        $coupons = UserCoupon::with('subscription')->where('user_id', auth()->user()->id)->orderBydesc('id')->get();
        return view('myCoupons', compact('coupons'));
    }

    public function couponCheckout(Request $request, Coupon $coupon)
    {
        if (!auth()->user()->hasMembership()) {
            return redirect()->route('memberships')->with('error', "You have to buy membership first");
        }

        $data = [
            'coupon' => $coupon,
            'payment_methods' => PaymentMethod::where('user_id', auth()->user()->id)->select('id', 'card_holder_name', 'card_brand', 'card_end_number')->get()
        ];

        return view('buy-coupon', $data);
    }

    public function buyCoupon(Request $request, StripeService $stripeService)
    {
        $validator = Validator::make($request->all(), [
            'coupon_id' => 'required',
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        try {
            $user = auth()->user();
            $customerId = $user->stripe_customer_id;
            $coupon = Coupon::find($request->coupon_id);
            $paymentMethod = PaymentMethod::find($request->payment_method);
            $price = $coupon->price;
            $discount = null;
            if ($request->promo_code_id) {
                $promoCode = PromoCode::find($request->promo_code_id);
                $discount = $this->getDiscountedPrice($promoCode, $price);
                $price = $price - $discount;
            }
            $charge = $stripeService->createCharge($customerId, $paymentMethod->stripe_source_id, $price, "Coupon payment");

            $generatedCode = generateRandomString(6);
            UserCoupon::create([
                'user_id' => $user->id,
                'price' => $price,
                'actual_price' => $coupon->price,
                'discount' => $discount,
                'stripe_charge_id' => $charge->id,
                'code' => $generatedCode,
                'total_videos' => $coupon->number_of_video,
                'total_images' => $coupon->number_of_images,
                'total_documents' => $coupon->number_of_documents,
            ]);

            Mail::to($user->email)->send(new SendCouponCode($user, $generatedCode, 'Coupon Purchased'));

            return redirect()->route('thankyou')->with('success', 'Coupon has been purchased successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function applyPromo(Request $request)
    {
        try {
            $couponCode = Coupon::find($request->coupon_id);
            $promoCode = PromoCode::where('code', $request->promo_code)->first();

            if (!$promoCode) {
                return response()->json([
                    'success' => false,
                    'message' => "Invalid Coupon"
                ]);
            }

            $discount = $this->getDiscountedPrice($promoCode, $couponCode->price);

            return response()->json([
                'success' => true,
                'message' => "Coupon has been applied successfully",
                'data' => ['promo_code_id' => $promoCode->id, 'discount' => $discount, 'total' => $couponCode->price - $discount]
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    private function getDiscountedPrice(PromoCode $promoCode, $totalPrice)
    {
        if ($promoCode->type == PromoCode::FIXED) {
            return $promoCode->amount;
        }

        return ($totalPrice * $promoCode->amount) / 100;
    }
}
