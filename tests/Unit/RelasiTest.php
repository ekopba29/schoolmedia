<?php

namespace Tests\Unit;

use App\Models\Student;
use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RelasiTest extends TestCase
{
    use RefreshDatabase;
     /**
     * A basic test example.
     *
     * @return void
     */
    public function test_relasi()
    {
        // admin tidak memiliki relasi ke siswa
        $admin = User::factory()->create();
        $this->assertNull($admin->student);

        // siswa memiliki relasi ke user
        $student = Student::factory()->create();
        $this->assertInstanceOf(User::class, $student->user);
        // siswa memiliki relasi ke kelas
        $this->assertInstanceOf(StudentClass::class, $student->student_class);

        // user memiliki relasi ke siswa
        $user = User::find($student->user_id);
        $this->assertInstanceOf(Student::class, $user->student);

        // kelas mempunyai banyak siswa
        Student::create(
            [
                'user_id' => User::factory()->create(
                    [
                        'role' => 'siswa',
                    ]
                )->id,
                'student_class_id' => $student->student_class->id
            ]
        );

        $this->assertcount(2, Student::where('student_class_id', $student->student_class->id)->get());
    }
}
