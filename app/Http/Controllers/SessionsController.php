<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class SessionsController extends Controller
{
    public function destroy()
    {
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

        return redirect()->to('/products');
    }
}
