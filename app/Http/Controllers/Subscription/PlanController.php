<?php

namespace App\Http\Controllers\Subscription;

use App\Models\Subscription;
use App\Service\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

class PlanController
{
    public function getPlans()
    {
        return response()->json(config('stripe.plans'));
    }

    public function processPlanSelection(Request $request, StripeService $stripeService)
    {
        $validated = $request->validate([
            'plan' => 'required|in:basic,pro',
            'user_id' => 'required|integer', // Ensure you pass the user ID
        ]);

        // Assuming the user ID is passed from the registration process
        $id = $validated['user_id'];

        // Create Stripe payment session
        $payload = (object) [
            'plan' => $validated['plan'],
            'user_id' => $id, // Use the authenticated user's ID
        ];

        $response = $stripeService->createPayment($payload);

        // Check if the response is successful and return the appropriate response
        if ($response['status'] === 'success') {
            return response()->json([
                'status' => 'success',
                'url' => $response['data']['url'],
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => $response['message'],
            ], 400); // Return a 400 error for client-side issues
        }
    }

    public function paymentSuccess(Request $request)
    {
        $session_id = $request->get('session_id');

        // Instantiate StripeClient with your secret key
        $stripe = new StripeClient(config('stripe.secret_key'));

        // Retrieve the session and subscription details
        $session = $stripe->checkout->sessions->retrieve($session_id);
        $subscription = $stripe->subscriptions->retrieve($session->subscription);

        // Save subscription details to the database
        Subscription::create([
            'user_id' => Auth::id(),
            'stripe_subscription_id' => $subscription->id,
            'plan' => $subscription->items->data[0]->price->product,
            'status' => $subscription->status,
            'current_period_start' => date('Y-m-d H:i:s', $subscription->current_period_start),
            'current_period_end' => date('Y-m-d H:i:s', $subscription->current_period_end),
        ]);

        // Return a JSON response
        return response()->json([
            'message' => 'Payment successful!',
            'subscription_id' => $subscription->id,
            'status' => $subscription->status,
            'current_period' => [
                'start' => date('Y-m-d H:i:s', $subscription->current_period_start),
                'end' => date('Y-m-d H:i:s', $subscription->current_period_end),
            ],
        ]);
    }
}
