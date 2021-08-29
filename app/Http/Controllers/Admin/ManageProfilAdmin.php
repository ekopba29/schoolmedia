<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageProfilAdmin extends Controller
{
    
    public function show(User $profileAdmin)
    {
        return view('admin.profileAdmin', ['user' => $profileAdmin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profileAdmin)
    {
        return view('admin.formProfileAdmin', ['user' => $profileAdmin]);
    }

    public function update(Request $request, User $profileAdmin)
    {
        $validateUser = $request->validate([
            'email' => 'required|unique:users,email,' . $profileAdmin->email . ',email|email',
            'name' => 'required',
        ]);

        $profileAdmin->update($validateUser);

        return back()->with('notifSuccessUpdate', 'ok');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('notifSuccessDelete', 'ok');
    }
}
