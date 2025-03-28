<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('sucursal.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string',
           
            
        ]);

        // Crea un nuevo producto
        Sucursal::create($request->only('nombre', 'ubicacion'));

        // Redirige con un mensaje de éxito
        return redirect()->route('sucursal')->with('message', 'Sucursal creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursal.edit', array(
            'sucursal'=>$sucursal
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,['nombre'=>'required', 'ubicacion'=>'required']);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request->input('nombre');
        $sucursal->ubicacion = $request->input('ubicacion');
        $sucursal->save();

        return redirect()->route('sucursales')->with('message', 'Sucursal actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sucursal = Sucursal::findOrFail($id);

        if(!$sucursal){
            return redirect()->route('sucursales')->with('message', 'No se encontro la sucursal');
        }

        $sucursal->delete();
        return redirect()->route('sucursales')->with('message','La sucursal se dio de baja');
    }
}
