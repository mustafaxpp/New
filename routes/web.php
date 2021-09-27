<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuezeController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentsController;
use App\Http\Livewire\StudentsComponent;
use Illuminate\Support\Facades\Route;

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
})->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('index');
// })->name('dashboard');

Route::prefix("/dashboard")->middleware(['cheack_role' ,'auth:sanctum','verified'])->group(function () {
    Route::get('/', function () {
            return view('index');
        })->name('dashboard');

    Route::get('/skills', [SkillsController::class, "index"])->name('skills');
    Route::get('/categories', [CategoryController::class, "index"])->name('categories');
    Route::get('/quezes', [QuezeController::class, "index"])->name('quezes');
    Route::get('/students', [StudentController::class, "index"])->name('students');
    Route::get('/student/{id}/profile', [StudentController::class, "show"])->name('student.profile');
    Route::get('/admins', [AdminController::class, "index"])->name('admins');
    Route::get('/admin/{id}/profile', [AdminController::class, "show"])->name('admin.profile');

});
