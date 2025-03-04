
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Document</title>
   <style>
          --bs-table-bg: #f8f9fa; /* Fondo claro */
    --bs-table-color: #212529; /* Texto oscuro */
    --bs-table-border-color: #dee2e6; /* Bordes suaves */
    --bs-table-hover-bg: #e9ecef; /* Fondo al pasar el mouse */
    --bs-table-hover-color: #212529; /* Texto al pasar el mouse */
    border-radius: 12px; /* Bordes redondeados */
    overflow: hidden; /* Para que los bordes no se desborden */
}

#example th {
    background-color: #004085; /* Azul marino */
    color: white; /* Texto blanco */
    font-weight: bold;
    text-align: center;
    padding: 12px;
    border: none;
}

#example td {
    text-align: center;
    padding: 10px;
}

#example tbody tr:nth-child(odd) {
    background-color: #f1f1f1; /* Gris claro para filas impares */
}

#example tbody tr:hover {
    background-color: #d1ecf1; /* Azul claro */
    transition: background-color 0.3s ease-in-out;
}

#example td:last-child {
    font-weight: bold;
    color: #28a745; /* Verde para el status */
}
   </style>
</head>
<body>
<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id Producto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{number_format($producto->precio, 2)}}</td>
                            <td>{{$producto->stock}}</td>
                            <td>{{$producto->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</body>
</html>
