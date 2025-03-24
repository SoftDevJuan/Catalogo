@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Usuario </h2><br>
       
       <form action="{{ route('usuario.update', $usuario->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
               <input type="text" class="form-control" id="nombre" name="name" value="{{$usuario->name}}" />
           </div>

           <div class="form-group">
               <label for="descripcion">Correo</label>
               <input type="email" class="form-control" id="descripcion" name="email" value="{{$usuario->email}}">
           </div>
           
           <button type="submit" class="btn btn-success">Guardar usuario</button>
      
        </form>


   </div>
</div>
@endsection
