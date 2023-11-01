<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

class PasswordResetController extends Controller
{
    public function showForm()
    {
        $products = Product::all();
        return view('front.passwordForm', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'new_pass_user' => 'required|min:6',
            'repeat_pass_user' => 'required|min:6|same:new_pass_user',
        ],
            [
                'new_pass_user.required' => 'Password is required',
                'repeat_pass_user' => 'Repeat is required',
                'new_pass_user.min' => 'Password is less than 6 characters',
                'repeat_pass_user.min' => 'Repeat is less than 6 characters',
                'repeat_pass_user.same' => 'Password and Repeat not same',
            ]);

        $user = auth()->user();
        $new_pass_user = $request->new_pass_user;
        $password = bcrypt($new_pass_user);
        $data = array();
        $data['password'] = $password;
        $user->update($data);

        $userId = Auth::user()->id;
        $subscribers = Subscriber::where(['user_id'=> $userId])->get();
        if($subscribers->isEmpty()) {
            $flag = false;
        }else{
            $flag = true;
        }

        $notification = array(
            'message' => 'Пароль изменен',
            'alert-type' => 'success'
        );
        return Redirect()->route('wishlist')->with($notification, $flag);

    }
}
