<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CourseController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/phptrack', function(){
    return 'hello ITI track';
});


Route::get('/testnew', function(){
    return 'new test for api';
});


// Route::get('/courses', [CourseController::class, 'index'])->name('courses'); 

Route::apiResource('courses', CourseController::class);