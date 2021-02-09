<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Models\Log;

class SessionsController extends Controller
{
    public function destroy()
    {
        $log = New Log();
        $log->user_id = auth()->user()->id;
        $log->activity = 'Logout';
        $log->save();

        Session::forget('cart');
        auth()->logout();

        return redirect()->to('/products');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            Session::flash('message', "The email or password is incorrect, please try again");
            return Redirect::back();
        }

        $log = New Log();
        $log->user_id = auth()->user()->id;
        $log->activity = 'Login';
        $log->save();

        return redirect()->to('/products');
    }
}
