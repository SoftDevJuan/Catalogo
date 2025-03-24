<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/enviar-reporte', [ProductoController::class, 'enviarReporte'])->name('enviar.reporte');
Route::get('/enviar_pdf_cliente', [ProductoController::class, 'enviar_pdf_cliente'])->name('enviar.reporte_cliente');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/producto', [ProductoController::class, 'create'])->name('productos');
Route::get('/producto/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/destroy/{id}', [ProductoController::class, 'deleteProducto'])->name('producto.destroy');
Route::get('/producto/index', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/obtener_catalogo', [CatalogoController::class, 'obtenerProductos']);
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');
Route::get('/nosotros', [CatalogoController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [CatalogoController::class, 'contacto'])->name('contacto');

Route::post('/sucursal/store', [SucursalController::class, 'store'])->name('sucursal.store');
Route::get('/sucursal', [SucursalController::class, 'create'])->name('sucursal');
Route::get('/sucursales', [SucursalController::class, 'index'])->name('sucursales');
Route::get('/sucursal/edit/{id}', [SucursalController::class, 'edit'])->name('sucursal.edit');
Route::delete('/sucursal/destroy/{id}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
Route::put('/sucursal/update/{id}', [SucursalController::class, 'update'])->name('sucursal.update');


Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario', [UsuarioController::class, 'create'])->name('usuario');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::delete('/usuario/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
Route::put('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');




Route::resource('asset', App\Http\Controllers\AssetController::class)->middleware('auth');
Route::get('/video-file/{filename}', array(
    'as' => 'fileVideo',
    'uses' => 'App\Http\Controllers\AssetController@getVideo'
));
Route::get('/miniatura/{filename}', array(
    'as' => 'imageVideo',
    'uses' => 'App\Http\Controllers\AssetController@getImage'
));
 
Auth::routes();
Route::get('/imprimir', [App\Http\Controllers\GeneradorController::class, 'imprimir'])->name('imprimir');
