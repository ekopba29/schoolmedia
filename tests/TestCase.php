<?php

namespace Tests;

use App\Models\ProfileSchool;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $siswa;
    protected $admin;


    protected function signInStudent(User $user = null)
    {
        $siswa = $this->siswa = $user ?? Student::factory()->create();
        $this->actingAs($siswa->user);
        return $this;
    }

    protected function signInAdmin(User $user = null)
    {
        $admin = $this->admin = $user ?? User::factory()->create();
        $this->actingAs($admin);
    }
}
