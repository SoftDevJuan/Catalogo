@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Crear un nuevo Producto</h2>
   </div>
   <div class="row">
       <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
               <label for="nombre">Nombre del Producto</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" />
           </div>
           <div class="form-group">
               <label for="descripcion">Descripción</label>
               <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
           </div>
           <div class="form-group">
               <label for="precio">Precio</label>
               <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" />
           </div>
           <div class="form-group">
               <label for="stock">Stock</label>
               <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" />
           </div>

           <div class="form-group">
                   <label for="image">Imagen</label>
                   <input type="file" class="form-control" id="image" name="referencia" />
            </div>

           <button type="submit" class="btn btn-success">Guardar Producto</button>
       </form>
   </div>
</div>
@endsection