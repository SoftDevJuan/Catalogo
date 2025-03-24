<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
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
        User::create($request->only('nombre', 'ubicacion'));

        // Redirige con un mensaje de éxito
        return redirect()->route('usuario')->with('message', 'User creada correctamente');
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
        $usuario = User::findOrFail($id);
        return view('usuario.edit', array(
            'usuario'=>$usuario
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,['nombre'=>'required', 'ubicacion'=>'required']);

        $usuario = User::findOrFail($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->ubicacion = $request->input('ubicacion');
        $usuario->save();

        return redirect()->route('usuarios')->with('message', 'User actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        if(!$usuario){
            return redirect()->route('usuarios')->with('message', 'No se encontro la usuario');
        }

        $usuario->delete();
        return redirect()->route('usuarios')->with('message','La usuario se dio de baja');
    }
}
