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
