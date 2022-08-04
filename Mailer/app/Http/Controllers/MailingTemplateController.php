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

    public function store(Request $request)
    {

        $validationData = $request->validate([
            'name' => ['required','string','max:50'],
            'content' => ['required', 'string']
        ]);

        try {
            MailingTemplate::create($validationData);
        }
        catch (QueryException $exception){
            return redirect(route('mailing-templates.create'))->withErrors('Ошибки в форме');
        }
        return redirect(route('mailing-templates.index'));

    }

}
