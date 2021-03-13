<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*
* Auth Middleware
*/

Route::group([
    "middleware" => 'api',
    "prefix" => 'auth',
], function(){
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'],);
});

Route::middleware('jwt.auth')->group(function(){

    /*
    * Classroom Route
    */
    Route::get('/classrooms', [\App\Http\Controllers\ClassroomController::class, 'index']);
    Route::get('/classrooms/{id}', [\App\Http\Controllers\ClassroomController::class, 'show']);
    Route::get('/classrooms/students/{id}', [\App\Http\Controllers\ClassroomController::class, 'indexStudents']);
    Route::post('/classrooms', [\App\Http\Controllers\ClassroomController::class, 'create']);
    Route::put('/classrooms', [\App\Http\Controllers\ClassroomController::class, 'update']);


    /*
    * Students Route
    */
    Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index']);
    Route::get('/students/{id}', [\App\Http\Controllers\StudentController::class, 'show']);
    Route::get('/students/marks/{id}', [\App\Http\Controllers\StudentController::class, 'indexMarks']);
    Route::post('/students', [\App\Http\Controllers\StudentController::class, 'create']);
    Route::put('/students', [\App\Http\Controllers\StudentController::class, 'update']);
    Route::delete('/students/{id}', [\App\Http\Controllers\StudentController::class, 'destroy']);


    /*
    * Speakers Route
    */
    Route::get('/speakers', [\App\Http\Controllers\SpeakerController::class, 'index']);
    Route::get('/speakers/{id}', [\App\Http\Controllers\SpeakerController::class, 'show']);
    Route::post('/speakers', [\App\Http\Controllers\SpeakerController::class, 'create']);
    Route::put('/speakers', [\App\Http\Controllers\SpeakerController::class, 'update']);


    /*
    * Courses Route
    */
    Route::get('/courses', [\App\Http\Controllers\CourseController::class, 'index']);
    Route::get('/courses/{id}', [\App\Http\Controllers\CourseController::class, 'show']);
    Route::post('/courses', [\App\Http\Controllers\CourseController::class, 'create']);
    Route::put('/courses', [\App\Http\Controllers\CourseController::class, 'update']);


    /*
    * Marks Route
    */
    Route::get('/marks/students/{id}', [\App\Http\Controllers\MarkController::class, 'show']);
    Route::post('/marks', [\App\Http\Controllers\MarkController::class, 'create']);

});
