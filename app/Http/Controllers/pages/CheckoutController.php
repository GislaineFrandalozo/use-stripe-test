<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::get();
        $user = Auth::user();
        return view('content.pages.pages-checkout', [
            'intent' => $user->createSetupIntent(),
            'user' => $user,
            'plan' => $plans[0]
        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $paymentMethod = $request->payment_method;

        $plans = Plan::get();
        $plan = $plans[0];

        $user->newSubscription($plan, $plan->stripe_plan)
             ->create($paymentMethod);
    }


    public function update(Request $request)
    {
        $user = $request->user();

        $paymentMethod = $request->payment_method;

        $user->updateDefaultPaymentMethod($paymentMethod);
    }
}
