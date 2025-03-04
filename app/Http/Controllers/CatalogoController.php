<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CatalogoController extends Controller
{
    public function index()
    {
        return view('catalogo.catalogo');
    }

    public function nosotros()
    {
        return view('catalogo.nosotros');
    }

    public function contacto()
    {
        return view('catalogo.contacto');
    }

    public function obtenerProductos()
    {
        $productos = Producto::where('status', 1)->get();
        return response()->json($productos);
    }
}
