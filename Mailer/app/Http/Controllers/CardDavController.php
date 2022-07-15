<?php

namespace App\Http\Controllers;

use App\Library\Services\CardDav;
use App\Models\Addressbook;

class CardDavController extends Controller
{

    public function update(CardDav $cardDav)
    {

        $addressbooks = Addressbook::all();
        var_dump($addressbooks);
        die;

        //$cardDav->getContacts();


        //получает данные с помощью СardDavService
        //обновляет бд
        //перезагружает страницу

    }

}
