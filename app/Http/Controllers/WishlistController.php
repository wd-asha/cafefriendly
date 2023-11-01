<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /* ------------------------------------------- */
    /* User's personal account after authorization */
    /* ------------------------------------------- */
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

    /* ---------------------------- */
    /* Delete product from wishlist */
    /* ---------------------------- */
    public function destroy($id)
    {
        Wishlist::find($id)->forceDelete();
        $notification = array(
            'message' => 'Продукт удален из избранного',
            'alert-type' => 'success'
        );
        /* to User's personal account */
        return Redirect()->back()->with($notification);
    }
    /* end delete product from wishlist */

    /* ---------------------- */
    /* Add coffee in wishlist */
    /* ---------------------- */
    public function favorite($id)
    {
        /* preparing the data */
        $data = array();
        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        /* add product in wishlist */
        Wishlist::create($data);
        $notification = array(
            'message' => 'Продукт добавлен в избранное',
            'alert-type' => 'success'
        );
        /* to User's personal account */
        return Redirect()->back()->with($notification);
    }
    /* end add coffee in wishlist */

    /* ------------------------- */
    /* Add equipment in wishlist */
    /* ------------------------- */
    public function favoriteEquipment($id)
    {
        /* preparing the data */
        $data = array();
        $data['user_id'] = Auth::user()->id;
        $data['equipment_id'] = $id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        /* add equipment in wishlist */
        Wishlist::insert($data);
        $notification = array(
            'message' => 'Equipment successfully added in Wishlist',
            'alert-type' => 'success'
        );
        /* to User's personal account */
        return Redirect()->back()->with($notification);
    }
    /* end add equipment in wishlist */
}
