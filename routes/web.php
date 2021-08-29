<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManageProfilAdmin;
use App\Http\Controllers\Admin\ManageStudentController;
use App\Http\Controllers\Admin\ManageStudentClassController;
use App\Http\Controllers\Admin\ManageProfileSchoolController;
use App\Http\Controllers\Murid\DashboardMuridController;
use App\Http\Controllers\Murid\ProfileMuridController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('murid', DashboardMuridController::class)->middleware(['siswa']);
Route::resource('profile_murid', ProfileMuridController::class)->middleware(['siswa']);
Route::resource('profile_admin', ManageProfilAdmin::class)->middleware(['admin']);
Route::resource('student_class', ManageStudentClassController::class)->middleware(['admin']);
Route::resource('students', ManageStudentController::class)->middleware(['admin']);
Route::resource('profile_school', ManageProfileSchoolController::class)
    ->middleware(['admin'])
    ->only(['show', 'edit', 'update']);

require __DIR__ . '/auth.php';
