<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* -------------------- */
    /*    Show all orders   */
    /* -------------------- */
    public function index()
    {
        $orders = Order::latest()->where('order_status', 0)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.index', compact('orders'));
    }
    /* end show all orders */

    /* --------------- */
    /*    Show order   */
    /* --------------- */
    public function show($id)
    {
        $order = Order::find($id);
        $orderItems = OrderItem::all()->where('order_id', $id);
        /* to page with list brands */
        return view('admin.order.orderitems', compact('order', 'orderItems'));
    }
    /* end show order */

    /* ------------------------ */
    /* Set pending status order */
    /* ------------------------ */
    public function pending($id)
    {
        Order::find($id)->update([
            'order_status' => 0
        ]);
        $notification = array(
            'message' => 'Order status done',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /* ------------------------ */
    /* Set process status order */
    /* ------------------------ */
    public function process($id)
    {
        Order::find($id)->update([
            'order_status' => 1
        ]);
        /* to page with list orders */
        $notification = array(
            'message' => 'Order status done',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /* -------------------------- */
    /* Show process status orders */
    /* -------------------------- */
    public function ordersProcess()
    {
        $orders = Order::latest()->where('order_status', 1)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.ordersProcess', compact('orders'));
    }

    /* -------------------------- */
    /* Set delivered status order */
    /* -------------------------- */
    public function delivered($id)
    {
        Order::find($id)->update([
            'order_status' => 2
        ]);
        /* to page with list orders */
        $notification = array(
            'message' => 'Order status done',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /* ---------------------------- */
    /* Show delivered status orders */
    /* ---------------------------- */
    public function ordersDelivered()
    {
        $orders = Order::latest()->where('order_status', 2)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.ordersDelivered', compact('orders'));
    }

    /* ------------------------- */
    /* Set canceled status order */
    /* ------------------------- */
    public function canceled($id)
    {
        Order::find($id)->update([
            'order_status' => 3
        ]);
        /* to page with list orders */
        $notification = array(
            'message' => 'Order status done',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /* --------------------------- */
    /* Show canceled status orders */
    /* --------------------------- */
    public function ordersCanceled()
    {
        $orders = Order::latest()->where('order_status', 3)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.ordersCanceled', compact('orders'));
    }

    /* ---------------- */
    /*   Delete order   */
    /* ---------------- */
    public function orderDelete($id)
    {
        /* select all products from the order */
        $orderItems = OrderItem::latest()->where('order_id', $id);
        /* remove all products from the order */
        $orderItems->each(function ($item, $key) {
            OrderItem::find($item->id)->forceDelete();
        });
        /* delete order */
        $order = Order::find($id)->forceDelete();
        /* to page with list orders */
        $notification = array(
            'message' => 'Order delete',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end delete order */
}
