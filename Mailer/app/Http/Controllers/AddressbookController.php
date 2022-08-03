<?php

namespace App\Http\Controllers;

use App\Models\Addressbook;
use Illuminate\Http\Request;

class AddressbookController extends Controller
{

    public function index()
    {
        $addressbooks = Addressbook::all();

        return view('addressbooks.index', [
            'addressbooks' => $addressbooks,
        ]);

    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => ['required','string','max:50'],
            'user' => ['required','string','max:50'],
            'password' => ['required','string','max:50'],
            'server_ip' => ['required','string','max:50'],
            'server_port' => ['required','string','max:50'],
            'addressbook_hash' => ['required','string','max:50'],
        ]);

        try{
            Addressbook::create($validationData);
        }
        catch (QueryException $exception){
            return redirect(route('addressbooks.index'))->withErrors('Ошибки в форме');
        }
        return redirect(route('addressbooks.index'));
    }

    public function destroy(Addressbook $addressbook)
    {
        $addressbook->delete();
        return redirect()->route('addressbooks.index');
    }

}
