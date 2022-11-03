<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {

        $contacts = Contact::join('addressbooks', 'contacts.addressbook_id', '=', 'addressbooks.id')
        ->select(
            'contacts.id',
            'contacts.email',
            'addressbooks.name as addressbook_name'
        )
        ->simplePaginate(20);

        return view('contacts', [
            'contacts' => $contacts,
        ]);

    }



}
