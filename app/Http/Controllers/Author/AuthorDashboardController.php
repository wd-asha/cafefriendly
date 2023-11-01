<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

class AuthorDashboardController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /* ------------------------------------------- */
    /* User's personal account after authorization */
    /* ------------------------------------------- */
    /* duplicate HomeController */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        $wishlists = Wishlist::all();
        $userId = Auth::user()->id;
        $subscribers = Subscriber::where(['user_id'=> $userId])->get();
        if($subscribers->isEmpty()) {
            $flag = false;
        }else{
            $flag = true;
        }
        /* to User's personal account */
        return view('wishlist', compact('wishlists', 'orders', 'flag', 'products', 'subscribers'));
    }

}
