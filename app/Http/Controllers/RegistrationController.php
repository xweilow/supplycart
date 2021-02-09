<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
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

        $log = New Log();
        $log->user_id = auth()->user()->id;
        $log->activity = 'Login';
        $log->save();

        return redirect()->to('/products');
    }
}
