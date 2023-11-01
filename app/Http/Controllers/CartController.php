<?php

namespace App\Http\Controllers;

use App\Mail\Alerts;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /* ---------------------------------------- */
    /*       Show shopping cart contents        */
    /* ---------------------------------------- */
    public function index()
    {
        $cartItems = Cart::content();
        $products = Product::all();
        $categories = Category::all();
        /* to the checkout page (with shopping cart) */
        return view('cart', compact('cartItems', 'products', 'categories'));
    }
    /* ---- end Show shopping cart contents --- */

    /* ----------------------------------------- */
    /*        Add product to shopping cart       */
    /* ----------------------------------------- */
    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);

        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->product_title,
                'qty' => 1,
                'price' => $product->product_price,
                'weight' => $product->product_weight,
                'options' => [
                    'image' => $product->product_image,
                    'code' => $product->product_code,
                    'about' => $product->product_about,
                ]
            ]
        );

        $notification = array(
            'message' => 'Продукт добавлен в корзину',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -------- end Add product to shopping cart -------- */

    /* --------------------------------------------- */
    /*       Remove an item from shopping cart       */
    /* --------------------------------------------- */
    public function delete($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Продукт удален из корзины',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --- end Remove an item from shopping cart --- */

    /* --------------------------------------------- */
    /*          Recalculation of the cost            */
    /* --------------------------------------------- */
    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification = array(
            'message' => 'Продукт обновлен',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ------- end Recalculation of the cost ------- */

    /* --------------------------------- */
    /*          Order formation          */
    /* --------------------------------- */
    public function check(Request $request)
    {
        $this->validate($request, [
           'delivery' => 'required',
           'phone' => 'required',
           'email' => 'required|email:rfc',
        ],
            [
                'delivery.required' => 'Обязательно для заполнения',
                'phone.required' => 'Обязательно для заполнения',
                'email.required' => 'Обязательно для заполнения',
                'email.email' => 'Неверный формат email',
            ], []
        );

        $content = Cart::content();
        /* Prepare data for the order */
        $data = array();
        $data['user_id'] = Auth::id();
        $data['user_name'] = $request->user_name;
        $data['order_email'] = $request->email;
        $data['order_delivery'] = $request->delivery;
        $data['order_phone'] = $request->phone;
        $data['order_total'] = strval(Cart::priceTotal());
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        $order_id = Order::insertGetId($data);
        /* Prepare data for a shopping list */
        $details = array();
        foreach ($content as $row) {
            /* if purchased product */
            if ($row->weight !== 0) {
                $details['order_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_title'] = $row->name;
                $details['product_price'] = $row->price;
                $details['product_qty'] = $row->qty;
                $details['product_image'] = $row->options->image;
                $details['product_weight'] = $row->weight;
                $details['product_code'] = $row->options->code;
                $details['created_at'] = Now();
                $details['updated_at'] = Now();
                OrderItem::insert($details);
                $product = Product::find($row->id);
                $product->product_amount = $product->product_amount - (1 * $row->qty);
                $product->update();
            }
        };
        /* Notify the buyer about the purchase by email */
        /* preparing data for the letter */
        $name = $data['user_name'];
        $email = $data['order_email'];
        $body = Cart::content();
        $subject = $request->subject;
        $total = Cart::priceTotal();
        $orderid = $order_id;
        /* send a letter */
        if (Auth::check()) {
            Mail::to($email)->send(new Alerts($name, $body, $total, $orderid));
        }
        /* Deleting the contents of the shopping cart */
        Cart::destroy();
        /* return to the user’s personal account */
        $notification = array(
            'message' => 'Заказ принят',
            'alert-type' => 'success'
        );
        /*return Redirect()->to('/wishlist')->with($notification);*/
        return Redirect()->back()->with($notification);
    }
    /* --------------- end Order formation ------------------ */
}
