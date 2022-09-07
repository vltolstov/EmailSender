<?php

namespace App\Http\Controllers;

use App\Models\MailingList;
use Illuminate\Http\Request;

class MailingListController extends Controller
{

    public function index()
    {

        $mailingLists = MailingList::all();

        return view('mailing-lists.index', [
            'mailingLists' => $mailingLists,
        ]);
    }

}
