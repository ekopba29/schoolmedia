<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManageStudentController extends Controller
{

    public function index()
    {
        return view('students.index',['students' => Student::with(['user','student_class'])->latest()->simplePaginate(5)]);
    }

    public function create()
    {
        return view('students.formStudent');
    }


    public function store(Request $request)
    {
        $validateUser = $request->validate([
            'email' => 'required|unique:users,email|email',
            'name' => 'required',
        ]);


        $user = User::create(
            array_merge(
                [
                    'role' => 'siswa',
                    'password' => Hash::make(Str::random(10))
                ],
                $validateUser
            )
        );

        $validateStudent = $request->validate([
            'student_class_id' => 'required|exists:student_classes,id'
        ]);

        Student::create(array_merge(
            [
                'user_id' => $user->id
            ],
            $validateStudent
        ));

        return back()->with('notifSuccessCreate', 'ok');

    }



    public function edit(Student $student)
    {
        return view('students.formStudent',['student' => $student]);
    }


    public function update(Request $request, Student $student)
    {
        $validateUser = $request->validate([
            'email' => 'required|unique:users,email,'.$student->user->email.',email|email',
            'name' => 'required',
        ]);

        // $student->user->update(array_merge(
        //     [
        //         'role' => 'siswa',
        //         'password' => Hash::make(Str::random(10))
        //     ],
        //     $validateUser
        // ));

        $student->user->update($validateUser);

        $validateStudent = $request->validate([
            'student_class_id' => 'required|exists:student_classes,id'
        ]);

        // $student->update(array_merge(
        //     [
        //         'user_id' => $student->user->id
        //     ],
        //     $validateStudent
        // ));

        $student->update($validateStudent);

        return back()->with('notifSuccessUpdate', 'ok');
    }

   
    public function destroy(Student $student)
    {
        $student->user->delete();
        $student->delete();
        return back()->with('notifSuccessDelete','ok');
    }
}
