<?php

use Illuminate\Support\Facades\Route;

//Cargamos los controladores
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\FormaDePagoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InicioController;


Route::get('/', [InicioController::class, 'index'])->name('inicio.index');
Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubcategoriaController::class);
Route::get('/cuentas', [CuentaController::class, 'index'])->name('cuentas.index');
Route::get('/establecimientos', [EstablecimientoController::class, 'index'])->name('establecimientos.index');
Route::get('/formasdepago', [FormaDePagoController::class, 'index'])->name('formasdepago.index');
Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
