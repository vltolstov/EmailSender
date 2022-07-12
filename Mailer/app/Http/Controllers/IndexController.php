<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IndexController extends Controller
{

    public function index()
    {

        if(Auth::guest()){
            return redirect(route('login'));
        }

        $response = Gate::inspect('view-inner-part', [self::class]);
        if($response->denied()){
            abort($response->code(), $response->message());
        }


        return view('index');

    }

}
