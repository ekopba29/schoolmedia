<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class ManageStudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('studentClass.index', ['classes' => StudentClass::with(['student'])->simplePaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentClass.formStudentClass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'class_name' => ['required']
            ]
        );

        StudentClass::create($validation);

        return back()->with('notifSuccessCreate', 'ok');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $studentClass)
    {
        return view('studentClass.formStudentClass', ['class' => $studentClass]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentClass $studentClass)
    {
        $validation = $request->validate(
            [
                'class_name' => ['required']
            ]
        );

        $studentClass->update($validation);

        return back()->with('notifSuccessUpdate', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $studentClass)
    {
        $studentClass->delete();
        return back()->with('notifSuccessDelete','ok');
    }
}
