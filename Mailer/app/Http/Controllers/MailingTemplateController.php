<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailingTemplateController extends Controller
{

    public function index()
    {

        return view('mailing-template', [
            'test' => 'test',
        ]);

    }

}
