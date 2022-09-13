<?php

namespace App\Http\Controllers;

use App\Models\Addressbook;
use App\Models\MailingList;
use App\Models\MailingTemplate;
use Illuminate\Http\Request;

class MailingListController extends Controller
{

    public function index()
    {

        $mailingLists = MailingList::join('addressbooks', 'mailing_lists.id_addressbook' , '=', 'addressbooks.id')
            ->join('mailing_templates', 'mailing_lists.id_mailing_template', '=', 'mailing_templates.id')
            ->select(
                'mailing_lists.id',
                'mailing_lists.name',
                'mailing_lists.status',
                'mailing_lists.created_at',
                'addressbooks.name as addressbook_name',
                'mailing_templates.name as mailing_template_name'
            )
            ->simplePaginate(20);

        return view('mailing-lists.index', [
            'mailingLists' => $mailingLists,
        ]);
    }

    public function create()
    {

        $addressbooks = Addressbook::all();
        $templates = MailingTemplate::all();

        return view('mailing-lists.add', [
            'addressbooks' => $addressbooks,
            'templates' => $templates,
        ]);
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => ['required','string','max:50'],
            'id_addressbook' => ['required', 'integer'],
            'id_mailing_template' => ['required', 'integer'],
            'status' => ['required', 'string']
        ]);

        try {
            MailingList::create($validationData);
        }
        catch (QueryException $exception){
            return redirect(route('mailing-lists.create'))->withErrors('Ошибки в форме');
        }
        return redirect(route('mailing-lists.index'));
    }

}
