<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/iti', function(){
    return "Hello ITI";
});

// Route --> call controller 
Route::get('/students', [StudentController::class, 'listStudents'])->name("list");


Route::get('/students/{id}',[StudentController::class, 'getStudent'] )->name("show");


Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');

Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teachers.create');

Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');


Route::get('/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teachers.delete');

// /teachers/333   fvjbfhv   4574567 
// 