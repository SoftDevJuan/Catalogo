@extends('layouts.header')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin-top: 40px;
        }
        .card {
            background: rgba(40, 40, 40, 0.9);
            color: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            padding: 20px;
            margin-bottom: 20px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            padding: 10px;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            outline: none;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #1e88e5;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background-color: #1565c0;
        }
    </style>

    <div class="container">
        <div class="card">
            <h1>Contacto</h1>
            <p>Ponte en contacto con nosotros llenando el siguiente formulario:</p>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="Tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" rows="4" placeholder="Tu mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

@endsection