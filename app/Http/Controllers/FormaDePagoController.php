<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormaDePagoController extends Controller
{
    public function index()
    {
        return view('formasdepago');
    }
}
