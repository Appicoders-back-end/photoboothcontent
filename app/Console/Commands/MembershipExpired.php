<?php

namespace App\Console\Commands;

use App\Models\PaymentMethod;
use App\Models\Subscription;
use App\Models\UserSubscription;
use App\Services\StripeService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MembershipExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'membership:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire user membership';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

            $userSubscription = UserSubscription::where('end_date', date('Y-m-d'))->where('is_canceled', false)->first();

            $stripeService = new StripeService();
            $user = auth()->user();
            $customerId = $user->stripe_customer_id;

            $subscription = Subscription::find($userSubscription->subscription_id);
            $paymentMethod = PaymentMethod::find($userSubscription->payment_method_id);

            $buySubscription = $stripeService->buySubscription($customerId, $subscription, $paymentMethod);
            $userSubscription->update([
                'end_date' => getPlanExpiryDate($subscription),
            ]);

            Log::info("Membership renew successfully");
            $this->info("Membership renew successfully");

            return Command::SUCCESS;
        } catch (\Exception $exception) {
            Log::info("Membership renew Exception: " . $exception->getMessage());
            $this->info("Membership renew Exception: " . $exception->getMessage());

            return Command::FAILURE;
        }
    }
}
