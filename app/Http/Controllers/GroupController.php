<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::latest()->paginate(20);

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
        return view('panel.groups.edit', compact('group'));
    }


    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30'
        ]);

        $group->update([
            'name' => $request->name
        ]);

        return redirect(route('groups.index'));
    }


    public function destroy(Group $group)
    {
        $group->delete();

        return back();
    }
}
