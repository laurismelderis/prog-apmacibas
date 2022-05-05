<?php

use Illuminate\{
    Support\Facades\Route,
    Support\Facades\Auth,
    Http\Request,
};
use App\Http\Controllers\{
    AuthController,
};
use App\Http\Controllers\{
    CourseController,
};

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return Auth::user();
    });
    Route::post('/logout', [AuthController::class, 'logOut']);
});

Route::post('login', [AuthController::class, 'logIn']);

Route::get('courses', [CourseController::class, 'index']);