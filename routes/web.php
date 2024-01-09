<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/solicitar-historias-clinica', function(){
    return view('page-clinical-stories-request');
})->name('solicitar_historias_clinicas');

/*Route::get('/recibir-historias-clinica', function(){
    return view('page-clinical-stories-request');
})->name('solicitar_historias_clinicas');*/
