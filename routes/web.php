<?php

use App\Http\Controllers\programasdeformacionController;
use App\Http\Controllers\regionalesController;
use App\Http\Controllers\epsController;
use App\Http\Controllers\roladministrativoController;
use App\Http\Controllers\tiposdocumentosController;
use App\Http\Controllers\aprendicesController;
use App\Http\Controllers\centrodeformacionController;
use App\Http\Controllers\enteconformadoresController;
use App\Http\Controllers\fichacaracterizacionController;
use App\Http\Controllers\instructoresController;
use App\Http\Controllers\bitacorasController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::get('/login', [loginController::class, 'showLogin'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/usuarios/create', [loginController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [loginController::class, 'store'])->name('usuarios.store');

Route::get('/', function () {
    return view('inicio');     
    })->middleware('auth')->name('inicio');


Route::middleware('auth')->group(function () {

    Route::resource('/bitacoras', bitacorasController::class);

Route::resource('/programas', programasdeformacionController::class);
Route::resource('/regionales', regionalesController::class);
Route::resource('/eps', epsController::class);
Route::resource('/rolesadministrativos', roladministrativoController::class);
Route::resource('/tiposdocumentos', tiposdocumentosController::class);
Route::resource('/aprendices', aprendicesController::class);
Route::resource('/centrosdeformacion', centrodeformacionController::class);
Route::resource('/enteconformadores',enteconformadoresController::class);
Route::resource('/fichacaracterizacion',fichacaracterizacionController::class);
Route::resource('/instructores',instructoresController::class);
Route::resource('/bitacoras',bitacorasController::class);

});

Route::get('/clear', function () {
    artisan::call('cache:clear');

});