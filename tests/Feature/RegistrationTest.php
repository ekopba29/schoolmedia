<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\StudentClass;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'student_class_id' => StudentClass::factory()->create()->id
        ]);
        
        $this->assertAuthenticated();
        $response->assertRedirect(route('murid.index'));
    }
}
