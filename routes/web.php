<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseStudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[CourseStudentController::class,'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas de Cursos
Route::middleware('auth')->group(function () {
    Route::get('/courses',[CourseController::class,'index'])->name('courses.index');
    Route::get('/courses/create',[CourseController::class,'create'])->name('courses.create');
    Route::post('/courses',[CourseController::class,'store'])->name('courses.store');
    Route::get('/courses/{course}',[CourseController::class,'edit'])->name('courses.edit');
    Route::put('/courses/{course}',[CourseController::class,'update'])->name('courses.update');
    Route::delete('/courses/{course}',[CourseController::class,'destroy'])->name('courses.destroy');
});

//Rutas de Estudiantes

Route::middleware('auth')->group(function(){
    Route::get('/students',[StudentController::class,'index'])->name('students.index');
    Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
    Route::post('/students/',[StudentController::class,'store'])->name('students.store');
    Route::get('/students/{student}',[StudentController::class,'edit'])->name('students.edit');
    Route::get('/students/{student}/show',[StudentController::class,'show'])->name('students.show');
    Route::put('/students/',[StudentController::class,'update'])->name('students.update');
    Route::delete('/students/{student}',[StudentController::class,'destroy'])->name('students.destroy');
});

Route::middleware('auth')->group(function(){
    Route::post('/coursestudent/{student}',[CourseStudentController::class,'store'])->name('coursestudent.store');
});

require __DIR__.'/auth.php';
