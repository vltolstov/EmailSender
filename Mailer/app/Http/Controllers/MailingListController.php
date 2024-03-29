<?php

namespace App\Http\Controllers;

use App\Mail\EmailShipped;
use App\Models\Addressbook;
use App\Models\Config;
use App\Models\Contact;
use App\Models\MailingList;
use App\Models\MailingTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailingListController extends Controller
{

    public function index()
    {

        $mailingLists = MailingList::join('addressbooks', 'mailing_lists.id_addressbook', '=', 'addressbooks.id')
            ->join('mailing_templates', 'mailing_lists.id_mailing_template', '=', 'mailing_templates.id')
            ->select(
                'mailing_lists.id',
                'mailing_lists.name',
                'mailing_lists.status',
                'mailing_lists.created_at',
                'addressbooks.name as addressbook_name',
                'mailing_templates.name as mailing_template_name'
            )
            ->orderBy('id', 'desc')
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
            'name' => ['required', 'string', 'max:50'],
            'id_addressbook' => ['required', 'integer'],
            'id_mailing_template' => ['required', 'integer'],
            'status' => ['required', 'string']
        ]);

        try {
            MailingList::create($validationData);
        } catch (QueryException $exception) {
            return redirect(route('mailing-lists.create'))->withErrors('Ошибки в форме');
        }
        return redirect(route('mailing-lists.index'));
    }

    public function edit(MailingList $mailingList)
    {

        $addressbook = Addressbook::all();
        $templates = MailingTemplate::all();

        return view('mailing-lists.edit', [
            'mailingList' => $mailingList,
            'templates' => $templates,
            'addressbooks' => $addressbook
        ]);

    }

    public function update(Request $request, MailingList $mailingList)
    {

        $validationData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'id_addressbook' => ['required', 'integer'],
            'id_mailing_template' => ['required', 'integer'],
            'status' => ['required', 'string']
        ]);

        $mailingList->update($validationData);

        return redirect()->route('mailing-lists.index');

    }

    public function destroy(MailingList $mailingList)
    {

        $mailingList->delete();
        return redirect()->route('mailing-lists.index');

    }

    public function send(MailingList $mailingList)
    {

        $arr = [];
        $config = Config::get();
        foreach ($config as $item){
            $arr[$item->name] = $item->value;
        }

        $template = MailingTemplate::where('id', $mailingList->id_mailing_template)->first();
        $subject = $mailingList->name;
        $contacts = Contact::leftJoin('contact_statuses', 'contacts.email', '=', 'contact_statuses.email')
            ->select(
              'contacts.id',
              'contacts.email',
              'contact_statuses.status'
            )
            ->where('addressbook_id', $mailingList->id_addressbook)
            ->where('status', Null)
            ->get();

        foreach ($contacts as $contact){

            $unSubscribeText = MailingTemplateController::unsubscribe($contact->email);
            $content = "$template->content $unSubscribeText";

            Mail::to($contact->email)
                ->queue(new EmailShipped(
                    $content,
                    $subject,
                    $contact->email,
                    $arr['from-email'],
                    $arr['from-name'],
                    $arr['reply-to-email'],
                    $arr['reply-to-name'],
                    $arr['baseUrl']
                    )
                );
        }

        $mailingList->status = 'Отправлено';
        $mailingList->save();

        return redirect()->route('mailing-lists.index');
    }

}
