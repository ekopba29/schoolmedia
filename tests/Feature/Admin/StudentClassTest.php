<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\StudentClass;
use App\Models\ProfileSchool;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentClassTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthorized_cannot_view_classes_page()
    {
        $response = $this->get(route('student_class.index'));
        $response->assertStatus(403);
    }

    public function test_admin_can_create_class()
    {
        // test_admin_view_classes_page        
        
        ProfileSchool::factory()->create();

        $this->signInAdmin();

        $this
            ->get(route('student_class.index'))
            ->assertStatus(200);

        // test_admin_visit_form_create_student_class
        // $this
        //     ->get(route('student_class.index'))
        //     ->assertStatus(200);

        $dataPostOk = ['class_name' => "Test"];
        $dataPostNOK1 = ['class_name' => ""];
        $dataPostNOK2 = [];

        // Post Data kelas lengkap 
        $this
            ->post(route('student_class.store'), $dataPostOk)
            ->assertRedirect(route('student_class.index'));
        $this
            ->assertDatabaseHas('student_classes', $dataPostOk);

        // // Post Data kelas tidak lengkap 
        $this
            ->post(route('student_class.store'), $dataPostNOK1)
            ->assertSessionHasErrors('class_name');
        $this
            ->post(route('student_class.store'), $dataPostNOK2)
            ->assertSessionHasErrors('class_name');
    }

    public function test_admin_can_update_class()
    {
        $this->signInAdmin();
        
        $dataPostOk = ['class_name' => "Test"];
        $dataPostEdit = ['class_name' => "Edit"];

        $dataClass = StudentClass::factory()->create($dataPostOk);
        // dd($dataClass);
        // test_admin_visit_form_edit_student_class
        $this
            ->get(route('student_class.edit', ['student_class' => $dataClass->id]))
            ->assertSee($dataClass->class_name);

        // test_admin_visit_404_form_edit_student_class
        $this
            ->get(route('student_class.edit', ['student_class' => 140450000]))
            ->assertNotFound();

        // // Patch Data kelas lengkap 
        $this
            ->patch(
                route('student_class.update', ['student_class' => $dataClass->id]),
                $dataPostEdit
            );
        $this->assertEquals($dataClass->fresh()->class_name, $dataPostEdit['class_name']);
    }

    // public function test_admin_can_delete_class()
    // {
    //     $this->signInAdmin();

    //     $dataClass = StudentClass::factory()->create();
    //     $this->delete(route('student_class.destroy', ['student_class' => $dataClass->id]));
    //     // $this->assertDatabaseMissing('student_classes', ['id' => $dataClass->id]);
    // }
}
