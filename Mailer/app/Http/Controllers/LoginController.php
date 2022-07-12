<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        if(Auth::check()){
            return redirect()->intended(route('index'));
        }

        $formFields = $request->only(['name', 'password']);


        if(Auth::attempt($formFields, $remember = true)){
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }


        return redirect(route('login'))->withErrors([
            'email' => 'Ошибка входа'
        ]);

    }

}
