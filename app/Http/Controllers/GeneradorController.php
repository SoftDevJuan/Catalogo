<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Models\Producto;

class GeneradorController extends Controller
{
    public function imprimir(){
        $productos = Producto::all();
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('pdf/ejemplo', compact('today', 'productos'));
        return $pdf->download('ejemplo.pdf');
      
   }
   
}
