<?php

namespace App\Http\Controllers\Murid;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileMuridController extends Controller
{
    private function isYou(Student $student)
    {
        if ($student->user->student->id !== auth()->user()->student->id) {
            return abort(403);
        }
        return true;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    public function edit(Student $profileMurid)
    {
        $this->isYou($profileMurid);
        return view('students.formStudentSelf', ['student' => $profileMurid]);
    }

    public function update(Request $request, Student $profileMurid)
    {
        $this->isYou($profileMurid);

        $validateUser = $request->validate([
            'email' => 'required|unique:users,email,' . $profileMurid->user->email . ',email|email',
            'name' => 'required',
        ]);

        $profileMurid->user->update($validateUser);

        $validateStudent = $request->validate([
            'student_class_id' => 'required|exists:student_classes,id'
        ]);

        $profileMurid->update($validateStudent);
        Auth::login($profileMurid->user->fresh());
        return back()->with('notifSuccessUpdate','ok');
        

    }
}
