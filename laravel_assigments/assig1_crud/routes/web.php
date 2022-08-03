<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Subject\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/create', [StudentController::class, 'create']);
Route::post('/', [StudentController::class, 'store']);
Route::get('/index', [StudentController::class, 'index']);
Route::get('/edit/{id}', [StudentController::class, 'show']);
Route::post('/update/{id}', [StudentController::class, 'update']);
Route::get('/{id}/delete', [StudentController::class, 'destroy']);
// Route::get('/delete/{id}', [StudentController::class, 'destroy']);

Route::get('/subject', [SubjectController::class, 'create']);
Route::post('/subject', [SubjectController::class, 'store']);
Route::get('subject/index', [SubjectController::class, 'index']);
Route::get('subject/edit/{id}', [SubjectController::class, 'show']);
Route::post('subject/update/{id}', [SubjectController::class, 'update']);
Route::get('subject/{id}/delete', [SubjectController::class, 'destroy']);
