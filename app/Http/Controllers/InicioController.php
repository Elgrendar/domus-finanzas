<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Cuenta;

class InicioController extends Controller
{
    function index()
    {
        $movimientos = Movimiento::latest()->take(10)->get();
        return view('inicio',compact('movimientos'));
    }
}
