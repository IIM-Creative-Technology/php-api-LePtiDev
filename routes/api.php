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
Route::put('/speakers/{id}', [\App\Http\Controllers\SpeakerController::class, 'update']);
