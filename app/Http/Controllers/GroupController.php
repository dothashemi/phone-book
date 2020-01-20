<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = auth()->user()->groups()->latest()->paginate(20);

        return view('panel.groups.list', compact('groups'));
    }


    public function create()
    {
        return view('panel.groups.add');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30'
        ]);

        auth()->user()->groups()->create([
            'name' => $request->name
        ]);

        return redirect(route('groups.index'));
    }


    public function edit(Group $group)
    {
        if (auth()->user()->groups()->find($group->id) != null)
            return view('panel.groups.edit', compact('group'));
        return back();
    }


    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30'
        ]);

        if (auth()->user()->groups()->find($group->id) != null) {

            $group->update([
                'name' => $request->name
            ]);

            return redirect(route('groups.index'));
        }
        return back();
    }


    public function destroy(Group $group)
    {
        if (auth()->user()->groups()->find($group->id) != null)
            $group->delete();
        return back();
    }
}
