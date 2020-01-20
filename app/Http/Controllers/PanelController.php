<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $contacts = auth()->user()->contacts;
        return view('panel.panel', compact('contacts'));
    }


    public function searchContact(Request $request)
    {
        $this->validate($request, [
            'word' => 'nullable|string|max:30'
        ]);

        $words = explode(" ", $request->word);

        foreach ($words as $key => $word)
            $words[$key] = '%' . $word . '%';

        $contacts = auth()->user()->contacts()
            ->where('first_name', 'LIKE', $words)
            ->where('last_name', 'LIKE', $words)
            ->paginate(20);

        $word = $request->word;

        return view('panel.search.contacts', compact('contacts', 'word'));
    }


    public function searchPhone(Request $request)
    {
        $this->validate($request, [
            'word' => 'nullable|string|max:30'
        ]);

        if (!is_numeric($request->word))
            return redirect(route('contacts.index'));

        $contacts = auth()->user()->contacts()->pluck('id')->all();

        $phones = Phone::whereIn('contact_id', $contacts)->where('number', 'LIKE', '%' . $request->word . '%')->paginate(20);

        $word = $request->word;

        return view('panel.search.phones', compact('phones', 'word'));
    }
}
