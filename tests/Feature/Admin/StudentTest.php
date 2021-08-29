<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use App\Models\ProfileSchool;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_admin_can_add_student()
    {
        // untuk buat profil sekolah 
        ProfileSchool::factory()->create();
        
        $this->signInAdmin();
        // admin can load form add student
        $this->get(route('students.create'))->assertOk();

        $postSiswa = [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'student_class_id' => StudentClass::factory()->create()->id,
        ];

        // Saved in user table
        $this->post(route('students.store'), $postSiswa);
        $this->assertDatabaseHas('users', [
            'email' => $postSiswa['email'],
            'name' => $postSiswa['name']
        ]);

        // Saved in student table
        $this->assertDatabaseHas(
            'students',
            [
                'student_class_id' => $postSiswa['student_class_id']
            ]
        );
    }

    public function test_admin_can_update_student()
    {
        $this->signInAdmin();

        // succes view edit page
        $student = Student::factory()->create();
        $user = $student->user;
        $this
            ->get(
                route(
                    'students.edit',
                    ['student' => $student->id]
                )
            )->assertSee($user->name);

        $studentUpdate = [
            'name' => 'Edit',
            'email' => 'edit@mail.com',
            'student_class_id' => StudentClass::factory()->create()->id
        ];

        $this->patch(route('students.update', ['student' => $student->id]),$studentUpdate);
       
        $this->assertEquals(
            $studentUpdate,
            [
                'name' => $user->fresh()->name,
                'email' => $user->fresh()->email,
                'student_class_id' => $student->fresh()->student_class_id
            ]
        );
    }

}
