<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $student = User::factory()->create(['role'=>'siswa']);
        $student_class = StudentClass::factory()->create();
        return [
            'user_id' => $student->id,
            'student_class_id' => $student_class->id,
        ];
    }
}
