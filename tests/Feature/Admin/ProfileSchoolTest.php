<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ProfileSchool;

class ProfileSchoolTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_school_profile()
    {
        $this->signInAdmin();
        $this->withoutExceptionHandling();
        $school = ProfileSchool::factory()->create();
        // load form edit school profile
        $this->get(route('profile_school.edit', ['profile_school' => $school->id]))->assertSee($school->name);
        // patch profile
        $newProfile = ['name' => 'edit school profile', 'address' => 'edit'];
        $this->patch(route('profile_school.update', ['profile_school' => $school->id]), $newProfile);
        $this->assertEquals(['name' => $school->fresh()->name, 'address' => $school->fresh()->address], $newProfile);
    }
}
