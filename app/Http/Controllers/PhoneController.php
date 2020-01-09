<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function create()
    {
        return view('panel.phones.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required|exists:contacts,id',
            'title'   => 'required|string|max:30',
            'phone'   => 'required|string|max:15'
        ]);

        $contact = Contact::find($request->contact);

        $contact->phones()->create([
            'contact_id' => $request->contact,
            'title'      => $request->title,
            'phone'      => $request->phone,
        ]);

        return redirect(route('contacts.show')->compact($content));
    }


    public function edit(Phone $phone)
    {
        return view('panel.phones.edit', compact('phone'));
    }


    public function update(Request $request, Phone $phone)
    {
        $this->validate($request, [
            'title'   => 'required|string|max:30',
            'phone'   => 'required|string|max:15'
        ]);

        $contact = Contact::find($request->contact);

        $contact->phones()->create([
            'title'      => $request->title,
            'phone'      => $request->phone,
        ]);

        return redirect(route('contacts.show')->compact($content));
    }


    public function destroy(Phone $phone)
    {
        $phone->delete();

        return back();
    }
}
