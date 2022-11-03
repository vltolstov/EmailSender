<?php

namespace App\Http\Controllers;

use App\Models\MailingTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailingTemplateController extends Controller
{

    public function index()
    {

        $templates = DB::table('mailing_templates')
            ->orderBy('id', 'desc')
            ->get();

        return view('mailing-templates.index', [
            'templates' => $templates,
        ]);

    }

    public function create()
    {

        return view('mailing-templates.add');

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

    public function edit(MailingTemplate $mailingTemplate)
    {
        return view('mailing-templates.edit', [
            'mailingTemplate' => $mailingTemplate,
        ]);
    }

    public function update(Request $request, MailingTemplate $mailingTemplate)
    {

        $validationData = $request->validate([
            'name' => ['required','string','max:50'],
            'content' => ['required', 'string']
        ]);

        $mailingTemplate->update($validationData);

        return redirect()->route('mailing-templates.index');

    }

    public function copy(MailingTemplate $mailingTemplate)
    {

        $copyData = [
            'name' => 'Копия ' . $mailingTemplate->name,
            'content' => $mailingTemplate->content
        ];

        try {
            MailingTemplate::create($copyData);
        }
        catch (QueryException $exception){
            return redirect(route('mailing-templates.create'))->withErrors('Ошибки в форме');
        }
        return redirect(route('mailing-templates.index'));

    }

    public function destroy(MailingTemplate $mailingTemplate)
    {

        $mailingTemplate->delete();
        return redirect()->route('mailing-templates.index');

    }

    public static function unsubscribe($email)
    {

        $text = view('mailing-templates/unsubscribe-text', [
            'email' => $email
        ]);

        return $text;
    }

}
