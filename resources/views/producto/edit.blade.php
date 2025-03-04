@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar producto </h2>
       <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @method('PUT')
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="form-group">
               <label for="nombre">Nombre</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}" />
           </div>
           <div class="form-group">
               <label for="descripcion">Descripción</label>
               <textarea class="form-control" id="descripcion" name="descripcion">{{$producto->descripcion}}</textarea>
           </div>
           <div class="form-group">
               <label for="precio">Precio</label>
               <textarea class="form-control" id="precio" name="precio">{{$producto->precio}}</textarea>
           </div>
           <div class="form-group">
               <label for="precio">Stock</label>
               <textarea class="form-control" id="stock" name="stock">{{$producto->stock}}</textarea>
           </div>
           <div class="form-group">
               <label for="status">Status</label>
               <textarea class="form-control" id="status" name="status">{{$producto->status}}</textarea>
           </div>
           <button type="submit" class="btn btn-success">Guardar producto</button>
       </form>
   </div>
</div>
@endsection
