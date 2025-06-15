<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/iti', function(){
    return "Hello ITI";
});

// Route --> call controller 
Route::get('/students', [StudentController::class, 'listStudents']);


Route::get('/students/{id}',[StudentController::class, 'getStudent'] );
