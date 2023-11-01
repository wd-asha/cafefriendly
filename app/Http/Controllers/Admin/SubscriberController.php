<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe;

class SubscriberController extends Controller
{
    /* ------------------------- */
    /*    Show all subscribers   */
    /* ------------------------- */
    public function index()
    {
        $trashed = Subscriber::onlyTrashed()->paginate(10);
        $subscribers = Subscriber::latest()->paginate(10);
        return view('admin.subscriber.index', compact('subscribers', 'trashed'));
    }
    /* end show all subscribers */

    /* ----------------------------- */
    /*    Subscribe new subscriber   */
    /* ----------------------------- */
    public function subscribe()
    {
        /* preparing the data */
        $data = array();
        $data['user_id'] = Auth::user()->id;
        $data['user_name'] = Auth::user()->name;
        $data['user_email'] = Auth::user()->email;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        /* create new subscriber */
        Subscriber::create($data);
        $notification = array(
            'message' => 'Вы подписаны на новости',
            'alert-type' => 'success'
        );
        /* to page with list subscribers */
        return Redirect()->back()->with($notification);
    }
    /* end subscribe new subscriber */

    /* --------------------------- */
    /*    Unsubscribe subscriber   */
    /* --------------------------- */
    public function unsubscribe($subscriber)
    {
        Subscriber::find($subscriber)->forceDelete();
        $notification = array(
            'message' => 'Вы отписались от новостей',
            'alert-type' => 'success'
        );
        /* to page with list subscribers */
        return Redirect()->back()->with($notification);

    }

    /* ---------------------- */
    /*    Delete subscriber   */
    /* ---------------------- */
    public function delete($id)
    {
        Subscriber::find($id)->delete();
        $notification = array(
            'message' => 'Пользователь отписан',
            'alert-type' => 'success'
        );
        /* to page with list subscribers */
        return Redirect()->back()->with($notification);

    }
    /* end delete subscriber */

    /* ----------------------- */
    /*    Destroy subscriber   */
    /* ----------------------- */
    public function destroy($id)
    {
        Subscriber::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Подписчик удален',
            'alert-type' => 'success'
        );
        /* to page with list subscribers */
        return Redirect()->back()->with($notification);
    }
    /* end destroy subscriber */

    /* ----------------------- */
    /*    Restore subscriber   */
    /* ----------------------- */
    public function restore($id)
    {
        Subscriber::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Подписчик восстановлен',
            'alert-type' => 'success'
        );
        /* to page with list subscribers */
        return Redirect()->back()->with($notification);
    }
    /* end restore subscriber */

    /* -------------------- */
    /*    Show form email   */
    /* -------------------- */
    public function formMail($userEmail, $userName)
    {
        return view('admin.subscriber.mail', compact('userEmail', 'userName'));
    }
    /* end show email */

    /* ----------------------------- */
    /*    Send email to subscriber   */
    /* ----------------------------- */
    public function sendMail(Request $request)
    {
        $name = $request->name;
        $body = $request->body;
        $email = $request->email;
        $subject = $request->subject;
        Mail::to($email)->send(new Subscribe($name, $body));
        $trashed = Subscriber::onlyTrashed()->paginate(10);
        $subscribers = Subscriber::latest()->paginate(10);
        /* to page with list subscribers */
        return view('admin.subscriber.index', compact('subscribers', 'trashed'));
    }
    /* end send email to subscriber */
}
