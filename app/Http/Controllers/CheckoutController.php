<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        if(Cart::content()->count() == 0){
            Session::flash('info', 'Your cart is still empty. Do some shopping.');
            return redirect()->back();
        }
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

        Session::flash('success', 'Purchased successful. Wait for our email.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchasedSuccessful);

        return redirect('/');
    }
}
