<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* ------------------------------------------------------- */
    /* User's personal account after authorization (not admin) */
    /* ------------------------------------------------------- */
    /* duplicate AuthorDashboardController */
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

    /* or change
    public const HOME = 'wishlist
    in RouteServiceProvider */
}
