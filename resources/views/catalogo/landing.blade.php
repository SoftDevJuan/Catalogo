@extends('layouts.header')

@section('content')
    <!-- Carrusel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
                <img src="https://via.placeholder.com/1920x600" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenido a Mi Catálogo</h5>
                    <p>Encuentra las mejores piezas compatibles para tus equipos.</p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1920x600" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenido a Mi Catálogo</h5>
                    <p>Encuentra las mejores piezas compatibles para tus equipos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x600" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Variedad de Productos</h5>
                    <p>Descubre lo que tenemos disponible en nuestras tiendas físicas.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x600" class="d-block w-100" alt="Slide 3">
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

    <!-- Sobre Nosotros -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2>Sobre Nosotros</h2>
            <p>Somos una plataforma dedicada a ayudarte a encontrar piezas compatibles y disponibles para tus equipos de cómputo, consolas y más.</p>
        </div>
    </section>

    <!-- Catálogo -->
    <section id="catalog" class="py-5 bg-light">
        <div class="container text-center">
            <h2>Catálogo</h2>
            <p>Explora nuestro catálogo de productos y descubre qué es compatible con tus dispositivos registrados.</p>
            <a href="/catalog" class="btn btn-primary">Ver Catálogo</a>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contact" class="py-5">
        <div class="container text-center">
            <h2>Contacto</h2>
            <p>¿Tienes dudas o comentarios? ¡Contáctanos!</p>
            <a href="/contact" class="btn btn-secondary">Contáctanos</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; 2025 Mi Catálogo. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



@endsection