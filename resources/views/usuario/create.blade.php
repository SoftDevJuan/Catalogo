@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Crear nuevo usuario</h2>
   </div>
   <div class="row">
       <form action="{{ route('usuario.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra CSRF -->
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="form-group">
               <label for="nombre">Nombre de la Sucursal</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" />
           </div>
           <div class="form-group">
               <label for="descripcion">Ubicación</label>
               <textarea class="form-control" id="ubicacion" name="ubicacion">{{ old('ubicacion') }}</textarea>
           </div>
          
           <button type="submit" class="btn btn-success">Guardar Sucursal</button>
       </form>
   </div>
</div>
@endsection