<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'group' => 'nullable|string|max:10'
        ]);

        $contacts = null;
        $group_cat = null;

        if ($request->group != null) {
            $group = auth()->user()->groups()->find($request->group);
            if ($group != null) {
                $contacts = $group->contacts()->latest()->paginate(20);
                $group_cat = $group->id;
            } else
                $contacts = auth()->user()->contacts()->latest()->paginate(20);
        } else {
            $contacts = auth()->user()->contacts()->latest()->paginate(20);
        }


        return view('panel.contacts.list', compact('contacts', 'group_cat'));
    }

    public function create()
    {
        $groups = auth()->user()->groups;
        return view('panel.contacts.add', compact('groups'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:30',
            'last_name'  => 'required|string|max:30',
            'email'      => 'nullable|string|max:191',
            'address'    => 'nullable|string|max:50',
            'describe'   => 'nullable|string'
        ]);

        $group = null;

        if ($request->group) {
            if (!in_array($request->group, auth()->user()->groups()->pluck('id')->all()))
                return back();
            $group = $request->group;
        }

        auth()->user()->contacts()->create([
            'group_id'   => $group,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'address'    => $request->address,
            'describe'   => $request->describe,
        ]);

        return redirect(route('contacts.index'));
    }


    public function edit(Contact $contact)
    {
        $groups = auth()->user()->groups;
        return view('panel.contacts.edit', compact('contact', 'groups'));
    }

    public function show(Contact $contact)
    {
        return view('panel.contacts.show', compact('contact'));
    }


    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:30',
            'last_name'  => 'required|string|max:30',
            'email'      => 'nullable|string|max:191',
            'address'    => 'nullable|string|max:50',
            'describe'   => 'nullable|string'
        ]);

        $group = null;

        if ($request->group) {
            if (!in_array($request->group, auth()->user()->groups()->pluck('id')->all()))
                return back();
            $group = $request->group;
        }

        $contact->update([
            'group_id'   => $group,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'address'    => $request->address,
            'describe'   => $request->describe,
        ]);

        return redirect(route('contacts.show', ['id' => $contact->id]));
    }


    public function destroy(Contact $contact)
    {
        if (auth()->user()->contacts()->find($contact->id) != null)
            $contact->delete();
        return redirect(route('contacts.index'));
    }
}
