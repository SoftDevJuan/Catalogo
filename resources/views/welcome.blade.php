@extends('layouts.header')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1;
        }
        .carousel-inner img {
            height: 100vh;
            object-fit: cover;
        }
        .cards-overlay {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            z-index: 10;
            background-color: none;
            padding: 20px;
            border-radius: 15px;
            
        }
        .carousel-container {
            position: relative;
        }
        div.card.h-100{
            background: rgba(0, 0, 0, 0.7) !important;
            color: white !important;
        }
        div.card-body.text-center,.col-md-4{
            background-color: none;
        }
        #mapa{
            margin: 30px;
            height: 400px;
            

        }
    </style>

    <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Carrusel -->
    <div class="carousel-container">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
            <div class="carousel-item active">
                    <img src="images/logo.webp"" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bienvenido a GameGadgets</h5>
                        <p>Encuentra las mejores piezas compatibles para tus equipos.</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img src="images/imagen1.webp"" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bienvenido a GameGadgets</h5>
                        <p>Encuentra las mejores piezas compatibles para tus equipos.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/imagen2.webp"" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Variedad de Productos</h5>
                        <p>Descubre lo que tenemos disponible en nuestras tiendas físicas.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/imagen3.webp" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Reservas Fáciles</h5>
                        <p>Aparta tu producto por una hora con solo un clic.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Cards Overlay -->
        <div class="cards-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Sobre Nosotros</h5>
                                <p class="card-text">Somos una plataforma dedicada a ayudarte a encontrar piezas compatibles y disponibles para tus equipos de cómputo, consolas y más.</p>
                                <a href="#about" class="btn btn-primary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Catálogo</h5>
                                <p class="card-text">Explora nuestro catálogo de productos y descubre qué es compatible con tus dispositivos registrados.</p>
                                <a href="/catalog" class="btn btn-primary">Ver Catálogo</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">Contacto</h5>
                                <p class="card-text">¿Tienes dudas o comentarios? ¡Contáctanos!</p>
                                <a href="/contact" class="btn btn-secondary">Contáctanos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mapa de Ubicación -->
<div class="map-container" id="mapa"></div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container text-center">
            <p>&copy; 2025 GameGadgets. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<script>
        // Función para inicializar el mapa
        function initMap() {
            // Coordenadas de la zapatería
            const ubicacion = { lat: 19.432608, lng: -99.133209 }; // Aquí pones la latitud y longitud reales
    
            // Crear el mapa y centrarlo en las coordenadas
            const map = L.map('mapa').setView([ubicacion.lat, ubicacion.lng], 30); // Nivel de zoom 14
    
            // Agregar el mapa base de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            // Agregar un marcador en la ubicación
            L.marker([ubicacion.lat, ubicacion.lng]).addTo(map)
                .bindPopup("<b>Game Gadjets</b><br>Ubicación de nuestra tienda.")
                .openPopup();
        }
    
        // Llamar a la función para inicializar el mapa cuando se cargue la página
        window.onload = initMap;
    </script>

    @endsection