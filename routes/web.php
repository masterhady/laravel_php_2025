<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/iti', function(){
    return "Hello ITI";
});

// Route --> call controller 
// Route::get('/students', [StudentController::class, 'listStudents'])->name("list");


Route::get('/students/{id}',[StudentController::class, 'getStudent'] )->name("show");


Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index')->middleware('auth');

Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show')->middleware('auth');


Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teachers.create');

Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');

Route::get('/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teachers.delete');

// /teachers/333   fvjbfhv   4574567 

Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teachers.edit');
// 

Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');


// controller resource--> index, show, create, store, edit, update, destroy
Route::resource('/departments', DepartmentController::class);
// Route::get('/departments/delete/{id}', [DepartmentController::class, 'destory'])->name('teachers.delete');

// Route::resource('anyaothername', DepartmentController::class)->name('index', 'departments.index')
//     ->name('create', 'departments.create')
//     ->name('store', 'departments.store')
//     ->name('show', 'departments.show')
//     ->name('edit', 'departments.edit')
//     ->name('update', 'departments.update')
//     ->name('destroy', 'departments.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){
    // Route::resource('/departments', DepartmentController::class);
    Route::get('/students', [StudentController::class, 'listStudents'])->name("list");
});


use App\Http\Controllers\Auth\GithubController;

Route::get('/auth/github', [GithubController::class, 'redirectToGithub']);
Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback']); // url --> github

