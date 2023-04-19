<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendCouponCode;
use App\Models\PaymentMethod;
use App\Models\Subscription;
use App\Models\UserCoupon;
use App\Models\UserSubscription;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\throwException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verified()
    {
        try {
            $user = auth()->user();
            $customerId = $user->stripe_customer_id;
            $subscription = Subscription::find(1);
            $coupon = $subscription->coupon;

            UserSubscription::create([
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
                'price' => $subscription->price,
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

            Mail::to($user->email)->send(new SendCouponCode($user, $generatedCode, 'Welcome To '. config('app.name', 'Photobooth Content')));

            return redirect()->route('thankyou')->with('success', 'Your account has been verified successfully');
        } catch (\Exception $exception) {
            throw new \ErrorException($exception->getMessage());
        }
    }
}
