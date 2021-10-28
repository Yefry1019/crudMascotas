<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegaController;

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

Route::get('/', function () {
    return view('auth.login');
});

/*
Route::get('/bodega', function () {
    return view('bodega.index');
});

Route::get('/bodega/create', [BodegaController::class,'create']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::resource('bodega',BodegaController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);



Route::get('/home', [BodegaController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function()
{
    Route::get('/', [BodegaController::class, 'index'])->name('home');
}
);
