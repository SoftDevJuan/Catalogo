<?php

namespace App\http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReporteInventarioMail;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }


    private function cargarDT($consulta)
    {
        $productos = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('producto.edit', $value['id']);
            $acciones = '
           <div class="btn-acciones">
               <div class="btn-circle">
                   <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                       <i class="far fa-edit"></i>
                   </a>
                    <a role="button" class="btn btn-danger" onclick="modal(' . $value['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal"">
                       <i class="far fa-trash-alt"></i>
                   </a>
               </div>
           </div>';


            $productos[$key] = array(
                $acciones,
                $value['id'],
                $value['nombre'],
                $value['descripcion'],
                $value['precio'],
                $value['stock'],
                $value['status'],
            );
        }
        return $productos;
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'referencia' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    // Guarda la imagen y obtiene la ruta
    $imagePath = $request->file('referencia')->store('thumbnails', 'public');

    // Prepara los datos en un formato clave-valor
    $data = [
        'nombre' => $request->input('nombre'),
        'descripcion' => $request->input('descripcion'),
        'precio' => $request->input('precio'),
        'stock' => $request->input('stock'),
        'referencia' => $imagePath,  // Aquí asignamos el path de la imagen
    ];

    // Crea el producto con los datos
    Producto::create($data);

    // Redirige con un mensaje de éxito
    return redirect()->route('productos')->with('message', 'Producto creado correctamente');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.edit', array(
            'producto'=>$producto
        ));
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'status' => 'required',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->status= $request->input('status');
        $producto->save();
        return redirect()->route('producto.index')->with(array('mensaje' => 'Producto actualizado correctamente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deleteProducto(Request $request, string $id){
        $producto = Producto::findOrFail($id);

        if($producto){
            $producto->status = 0;
            $producto->update();
            return redirect()->route('producto.index')->with('message', 'Producto eliminado correctamente.');
        }else{
            return redirect()->route('producto.index')->with('message', 'El producto que intenta eliminar no existe en la bae de datos.');
        }
    }


    public function enviarReporte(Request $request)
    {
        // Obtener el correo de destino desde el request
        $email = $request->input('email');

        if (!$email) {
            return response()->json(['error' => 'El email es obligatorio'], 400);
        }

        // Obtener productos
        $productos = Producto::all();

        // Generar PDF con los datos
        $pdf = \PDF::loadView('pdf.reporte_inventario', compact('productos'));

        // Guardar el PDF temporalmente
        $pdfPath = storage_path('app/public/reporte_inventario.pdf');
        $pdf->save($pdfPath);

        // Enviar correo con el PDF adjunto
        Mail::to($email)->send(new ReporteInventarioMail($pdfPath));

        // Opcional: Eliminar el archivo después del envío
        Storage::delete('public/reporte_inventario.pdf');
        return redirect()->route('producto.index')->with('message', 'Reporte enviado correctamente.');
    }



    public function enviar_pdf_cliente(Request $request)
{
    // Obtener el correo de destino desde el request
    $email = $request->input('correo');
    $id_producto = (int) $request->input('id'); // Asegurar que es un entero

    if (!$email) {
        return response()->json(['error' => 'El email es obligatorio'], 400);
    }

    // Obtener productos por ID
    $productos = Producto::where('id', $id_producto)->get();
    //$productos = Producto::all();
    // Verificar si la colección está vacía
    if ($productos->isEmpty()) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    // Generar PDF con los datos
    $pdf = \PDF::loadView('pdf.reporte_cliente', compact('productos'));

    // Guardar el PDF temporalmente
    $pdfPath = storage_path('app/public/reporte_inventario.pdf');
    $pdf->save($pdfPath);

    // Enviar correo con el PDF adjunto
    Mail::to($email)->send(new ReporteInventarioMail($pdfPath));

    // Eliminar el archivo después del envío
    Storage::delete('public/reporte_inventario.pdf');

    return response()->json(['message' => 'Reporte enviado correctamente.'], 200);
}




}
