<?php

namespace Database\Seeders;

use App\Models\ProfileSchool;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ProfileSchool::factory()->create();
        User::factory()->create(['email' => 'admin@admin.com']);
        $class1 = StudentClass::factory()->create();
        $class2 = StudentClass::factory()->create();
        Student::factory(10)->create(['student_class_id' => $class1]);
        Student::factory(10)->create(['student_class_id' => $class2]);
    }
}
