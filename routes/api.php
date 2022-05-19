<?php

use Illuminate\{
    Support\Facades\Route,
    Support\Facades\Auth,
    Http\Request,
};
use App\Http\Controllers\{
    CourseAttemptController,
    CourseController,
    AuthController,
};

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return response()->json(Auth::user());
    });

    Route::post('/logout', [AuthController::class, 'logOut']);

    Route::apiResources([
        'course' => CourseController::class,
        'course.attempt' => CourseAttemptController::class,
    ]);
});

Route::post('login', [AuthController::class, 'logIn']);
