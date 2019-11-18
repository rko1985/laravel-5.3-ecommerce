<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Product;

class ShoppingController extends Controller
{
    public function add_to_cart(){
        
        $pdt = Product::find(request()->pdt_id);

        $cart = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        return redirect()->route('cart');
    }

    public function cart(){
        return view('cart');
    }
}
