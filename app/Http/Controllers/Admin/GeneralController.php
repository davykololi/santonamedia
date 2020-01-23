<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Admin;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getContacts()
    {
        $contacts = Contact::latest()->get();
        
        return view('admin.general.contacts',['contacts' => $contacts]);
    }

    public function getContact(Contact $contact)
    {
        
        return view('admin.general.contact',['contact' => $contact]);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->withSuccess('The contact deleted successfully');
    }
}
