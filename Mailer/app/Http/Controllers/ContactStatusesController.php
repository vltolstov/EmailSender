<?php

namespace App\Http\Controllers;

use App\Models\ContactStatus;
use Illuminate\Http\Request;

class ContactStatusesController extends Controller
{

    public function index()
    {

        $contacts = ContactStatus::leftJoin('contacts', 'contact_statuses.email', '=' , 'contacts.email')
            ->leftJoin('addressbooks', 'contacts.addressbook_id', '=', 'addressbooks.id')
            ->select('contact_statuses.email', 'addressbooks.name as addressbook_name', 'status')
            ->simplePaginate(20);

        foreach ($contacts as $contact) {
            if ($contact['status'] == 1) {
                $contact['status'] = 'Заблокирован';
            }
        }

        return view('blocked', [
            'contacts' => $contacts,
        ]);
    }


    public function addBlockedContact($email = null)
    {

        if($email){
            ContactStatus::insert([
                'email' => $email,
                'status' => 1
            ]);
        }

        return view('unsubscribe', [
            'email' => $email,
        ]);

    }

}
