<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Alerts;

class AlertsController extends Controller
{

    /* ----------------------------------------------------------- */
    /* Send a notification by mail to the buyer about the purchase */
    /* ----------------------------------------------------------- */
    public function sendMail(Request $request)
    {
        /* preparing data for the letter */
        $name = $request->name;
        $body = $request->body;
        $email = $request->email;
        $subject = $request->subject;
        /* send the letter */
        Mail::to($email)->send(new Alerts($name, $body));
    }

}
