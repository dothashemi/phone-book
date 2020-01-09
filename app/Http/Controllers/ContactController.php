<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);

        return view('panel.contacts.list', compact('contacts'));
    }

    public function create()
    {
        return view('panel.contacts.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'group'     => 'nullable|exists:groups,id',
            'firstName' => 'required|string|max:50',
            'lastName'  => 'required|string|max:50',
            'email'     => 'nullable|string|max:191',
            'address'   => 'nullable|string|max:50',
            'describe'  => 'nullable|string'
        ]);

        auth()->user()->contacts()->create([
            'group_id'   => $request->group,
            'first_name' => $request->firstName,
            'last_name'  => $request->lastName,
            'email'      => $request->email,
            'address'    => $request->address,
            'describe'   => $request->describe,
        ]);

        return redirect(route('contacts.index'));
    }


    public function edit(Contact $contact)
    {
        return view('panel.contacts.edit', compact('contacts'));
    }


    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'group'     => 'nullable|exists:groups,id',
            'firstName' => 'required|string|max:50',
            'lastName'  => 'required|string|max:50',
            'email'     => 'nullable|string|max:191',
            'address'   => 'nullable|string|max:50',
            'describe'  => 'nullable|string'
        ]);

        $contact->update([
            'group_id'   => $request->group,
            'first_name' => $request->firstName,
            'last_name'  => $request->lastName,
            'email'      => $request->email,
            'address'    => $request->address,
            'describe'   => $request->describe,
        ]);

        return redirect(route('contacts.index'));
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back();
    }
}
