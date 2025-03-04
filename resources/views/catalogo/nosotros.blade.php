@extends('layouts.header')

@section('content')

    <div class="container">
        <div class="card">
            <h1>Sobre Nosotros</h1>
            <p>Somos una plataforma dedicada a conectar a los usuarios con los productos tecnológicos que necesitan, asegurando compatibilidad y disponibilidad en tiendas físicas.</p>
        </div>
        
        <div class="card">
            <h2>Misión</h2>
            <img src="/images/logo.webp" alt="Misión">
            <p>Facilitar la compra de hardware tecnológico proporcionando información detallada sobre compatibilidad y stock disponible en tiempo real.</p>
        </div>
        
        <div class="card">
            <h2>Visión</h2>
            <img src="/images/mision.jpg" alt="Visión">
            <p>Ser la plataforma líder en la gestión de productos tecnológicos en tiendas físicas, ofreciendo una experiencia de compra innovadora.</p>
        </div>
        
        <div class="card">
            <h2>Valores</h2>
            <img src="/images/valores.webp" alt="Valores">
            <ul>
                <li>Innovación</li>
                <li>Transparencia</li>
                <li>Compromiso con el cliente</li>
                <li>Calidad</li>
            </ul>
        </div>
        
    </div>


    <style>
        
        .containere {
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
        .card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .btn-light {
            background-color: #1e88e5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn-light:hover {
            background-color: #1565c0;
        }
    </style>

    @endsection