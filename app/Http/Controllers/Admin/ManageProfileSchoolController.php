<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSchool;
use Illuminate\Http\Request;

class ManageProfileSchoolController extends Controller
{
    public function show(ProfileSchool $profileSchool)
    {
        return view('school.profile.profileSchool', compact('profileSchool'));
    }

    public function edit(ProfileSchool $profileSchool)
    {
        return view('school.profile.formProfileSchool', compact('profileSchool'));
    }

    public function update(Request $request, ProfileSchool $profileSchool)
    {
        $profileSchool->update($request->validate([
            'name' => 'required',
            'address' => 'required',
        ]));
        return back()->with('notifSuccessUpdate', 'ok');
    }
}
