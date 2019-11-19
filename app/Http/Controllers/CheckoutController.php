<?php

namespace App\Http\Controllers;

use Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function pay(){
        
        Stripe::setApiKey('sk_test_P5voHXEVhoCMpBBImjxgPYPE00V5VVYDNg');

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'practice using stripe.',
            'source' => request()->stripeToken,
        ]);

        dd('your card was charged successfully.');
    }
}
