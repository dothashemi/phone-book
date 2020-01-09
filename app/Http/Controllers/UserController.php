<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'password' => 'nullable|string|max:191'
        ]);

        $user->update($request->all());

        return redirect('/panel');
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        
        auth()->logout();

        return redirect('/');
    }
}
