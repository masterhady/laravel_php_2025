<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\AuthController;

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


Route::post('/register', [AuthController::class, "register"]);
Route::post('/login', [AuthController::class, "login"]);

Route::middleware("auth:sanctum")->group(function(){
    Route::post('/logout', [AuthController::class, "logout"]);
});
// 
 // middleware 
// 
