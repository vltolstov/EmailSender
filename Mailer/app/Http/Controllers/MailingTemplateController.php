<?php

namespace App\Http\Controllers;

use App\Models\MailingTemplate;
use Illuminate\Http\Request;

class MailingTemplateController extends Controller
{

    public function index()
    {

        $templates = MailingTemplate::all();

        return view('mailing-templates.index', [
            'templates' => $templates,
        ]);

    }

    public function create()
    {

        return view('mailing-templates.add', [
            'test' => 'test',
        ]);

    }

}
