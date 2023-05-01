<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('content.pages.pages-checkout', [
            'intent' => $user->createSetupIntent(),
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        dump($request);
       // dd($request->payment_method);
        $user = $request->user();
        $paymentMethod = $request->paymentMethodId;

        $user->newSubscription('default', 'price_monthly')
             ->quantity(5)
             ->create($paymentMethod);

        
        dump($user->hasPaymentMethod());
    }
}
