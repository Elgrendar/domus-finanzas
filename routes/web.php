<?php

use Illuminate\Support\Facades\Route;

//Cargamos los controladores
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\FormaDePagoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [InicioController::class, 'index'])->name('inicio.index');
    Route::resource('categorias', CategoriaController::class);
    Route::resource('subcategorias', SubcategoriaController::class);
    Route::resource('cuentas', CuentaController::class);
    Route::resource('establecimientos', EstablecimientoController::class);
    Route::resource('formasdepago', FormaDePagoController::class);
    Route::resource('movimientos', MovimientoController::class);
    Route::resource('usuarios', UsuariosController::class);
});
