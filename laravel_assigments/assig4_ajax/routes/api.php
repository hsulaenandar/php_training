<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Student\StudentApiController;
use Illuminate\Support\Facades\Route;
use App\Models\Student\Student;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/store', [StudentApiController::class, 'store']);
Route::get('/ajax-crud', [StudentApiController::class, 'index']);
Route::put('/update', [StudentApiController::class, 'update']);
Route::delete('/delete', [StudentApiController::class, 'destroy']);

Route::get('/edit/{id}', [StudentApiController::class, 'show']);

Route::post('/search', [StudentApiController::class, 'search'])->name('web.search');

