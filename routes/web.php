<?php

use App\Http\Controllers\programasdeformacionController;
use App\Http\Controllers\regionalesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

/*Route::get('/programas', function () {
    return view('Programas.index');
});

Route::get('/eps', function () {
    return view('Eps.index');
});

Route::get('/regionales', function () {
    return view('Regionales.index');
});

Route::get('/rolesadministrativos', function () {
    return view('RolesAdminostrativos.index');
});

Route::get('/tipodocumentos', function () {
    return view('Programas.index');
});
*/

Route::get('/clear', function () {
    artisan::call('cache:clear');

});

//Route::get('/programas',[programasdeformacionController::class,'index'])->name('Programas.index');
//Route::get('/programascreate',[programasdeformacionController::class,'create'])->name('Programas.create');
Route::resource('/programas', programasdeformacionController::class);

//Route::get('/regionales',[regionalesController::class,'index'])->name('Regionales.index');
//Route::get('/regionalescreate',[regionalesController::class,'create'])->name('Regionales.create');
Route::resource('/regionales', regionalesController::class);



