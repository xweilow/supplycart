<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Redirect;

class RegistrationController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $existingUser = User::where('email', request()->email)->first();
        if(!empty($existingUser)) {
            Session::flash('message', "Email is unavailable");
            return Redirect::back();
        }

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/products');
    }
}
