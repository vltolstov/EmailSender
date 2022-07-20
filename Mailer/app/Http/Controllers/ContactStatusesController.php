<?php

namespace App\Http\Controllers;

use App\Models\ContactStatus;
use Illuminate\Http\Request;

class ContactStatusesController extends Controller
{

    public function index()
    {

        $contacts = ContactStatus::join('contacts', 'contact_statuses.email', '=' , 'contacts.email')
            ->join('addressbooks', 'contacts.addressbook_id', '=', 'addressbooks.id')
            ->select('contact_statuses.email', 'addressbooks.name as addressbook_name', 'status')
            ->simplePaginate(20);

        foreach ($contacts as $contact) {
            if($contact['status'] == 1){
                $contact['status'] = 'Заблокирован';
            } else {
                $contact['status'] = 'Ok';
            }

        }

        return view('blocked', [
            'contacts' => $contacts,
        ]);
    }
}
