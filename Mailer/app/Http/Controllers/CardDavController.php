<?php

namespace App\Http\Controllers;

use App\Library\Services\CardDav;
use App\Models\Addressbook;
use App\Models\Contact;

class CardDavController extends Controller
{

    public function updateContacts(CardDav $cardDav)
    {

        Contact::truncate();
        $addressbooks = Addressbook::all();


        foreach ($addressbooks as $addressbook){

            $contactList = $cardDav->getContacts(
                $addressbook['server_ip'],
                $addressbook['server_port'],
                $addressbook['addressbook_hash'],
                $addressbook['user'],
                $addressbook['password']
            );

            foreach ($contactList as $item){
                $contact = new Contact();
                $contact->email = $item;
                $contact->addressbook_id = $addressbook['id'];
                $contact->save();
            }


        }

        return 'ok';

    }

}
