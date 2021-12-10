<?php

use App\Http\Controllers\PhrasesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PhrasesController::class, 'index']);

Route::get('/create', [PhrasesController::class, 'create']);

Route::get('/edit/{id}', [PhrasesController::class, 'edit']);

Route::post('/store', [PhrasesController::class, 'store']);

Route::put('/update/{id}', [PhrasesController::class, 'update']);

Route::delete('/delete/{id}', [PhrasesController::class, 'destroy']);
