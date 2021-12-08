<?php

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

/**
 * Qualquer rota da web será "lidada" com o vue-router,
 * e portanto todas apontam para o arquivo welcome que é onde
 * está declarado o id #app que é referenciado pelo Vue
 */
Route::get('/{any?}', [
    function () {
        return view('welcome');
    }
])->where('any', '.*');
