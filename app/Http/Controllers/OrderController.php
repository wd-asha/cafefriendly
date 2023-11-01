<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /* ---------------------------------------- */
    /*       Show shopping cart contents        */
    /* ---------------------------------------- */
    public function checkout()
    {
        $cartItems = Cart::content();
        $products = Product::all();
        $categories = Category::all();
        /* to the checkout page (with shopping cart) */
        return view('checkout', compact('cartItems', 'products', 'categories'));
    }
    /* ---- end Show shopping cart contents --- */
}
