<?php

use App\Http\Controllers\programasdeformacionController;
use App\Http\Controllers\regionalesController;
use App\Http\Controllers\epsController;
use App\Http\Controllers\roladministrativoController;
use App\Http\Controllers\tiposdocumentosController;
use App\Http\Controllers\aprendicesController;
use App\Http\Controllers\centrodeformacionController;
use App\Http\Controllers\enteconformadoresController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');



Route::get('/clear', function () {
    artisan::call('cache:clear');

});

//Route::get('/programas',[programasdeformacionController::class,'index'])->name('Programas.index');
//Route::get('/programascreate',[programasdeformacionController::class,'create'])->name('Programas.create');
Route::resource('/programas', programasdeformacionController::class);

//Route::get('/regionales',[regionalesController::class,'index'])->name('Regionales.index');
//Route::get('/regionalescreate',[regionalesController::class,'create'])->name('Regionales.create');
Route::resource('/regionales', regionalesController::class);

Route::resource('/eps', epsController::class);

Route::resource('/rolesadministrativos', roladministrativoController::class);

Route::resource('/tiposdocumentos', tiposdocumentosController::class);

Route::resource('/aprendices', aprendicesController::class);

Route::resource('/centrosdeformacion', centrodeformacionController::class);

Route::resource('/enteconformadores',enteconformadoresController::class);
