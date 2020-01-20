<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function create(Request $request)
    {
        $contact = auth()->user()->contacts()->find($request->contact);
        if ($contact != null)
            return view('panel.phones.add', compact('contact'));
        return back();
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required|exists:contacts,id',
            'title'   => 'required|string|max:30',
            'number'   => 'required|string|max:15'
        ]);

        if (!is_numeric($request->number))
            return back();

        $contact = auth()->user()->contacts()->find($request->contact);

        if ($contact != null) {
            $contact->phones()->create([
                'contact_id' => $request->contact,
                'title'      => $request->title,
                'number'     => $request->number,
            ]);
            $id = $contact->id;
            return redirect(route('contacts.show', compact('id')));
        } else
            return back();
    }


    public function edit(Phone $phone)
    {
        $contact = auth()->user()->contacts()->find($phone->contact_id);
        if ($contact != null)
            return view('panel.phones.edit', compact('contact', 'phone'));
        return back();
    }


    public function update(Request $request, Phone $phone)
    {
        $this->validate($request, [
            'contact' => 'required|exists:contacts,id',
            'title'   => 'required|string|max:30',
            'number'   => 'required|string|max:15'
        ]);

        if (!is_numeric($request->number))
            return back();

        $contact = auth()->user()->contacts()->find($request->contact);

        if ($contact != null && in_array($phone->id, $contact->phones()->pluck('id')->all())) {
            $phone->update([
                'title'      => $request->title,
                'number'     => $request->number,
            ]);
            $id = $contact->id;
            return redirect(route('contacts.show', compact('id')));
        } else
            return back();
    }


    public function destroy(Phone $phone)
    {
        $contact = auth()->user()->contacts()->find($phone->contact_id);
        if ($contact != null && in_array($phone->id, $contact->phones()->pluck('id')->all()))
            $phone->delete();
        return back();
    }
}
