@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar producto </h2>
       <form action="{{ route('sucursal.update', $sucursal->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{$sucursal->nombre}}" />
           </div>
           <div class="form-group">
               <label for="descripcion">Ubicación</label>
               <textarea class="form-control" id="descripcion" name="ubicacion">{{$sucursal->ubicacion}}</textarea>
           </div>
           
           <button type="submit" class="btn btn-success">Guardar sucursal</button>
       </form>
   </div>
</div>
@endsection
