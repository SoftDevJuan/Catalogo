@extends('layouts.header')

@section('content')

    <header>
        <h1>Catálogo de Productos</h1>
    </header>


    <main>
        <div class="catalogo" id="catalogo">
           
        </div>
    </main>
    
    
    <div id="modal" class="modal" style="display:none">
        <div class="modal-content" >
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2 id="modal-titulo"></h2>
            <img id="modal-imagen" src="" alt="">
            <p id="modal-descripcion"></p>
            <p id="modal-stock"></p>
            <strong id="modal-precio"></strong><br>
            <div>
            <button class="btn btn-primary" id="apartar" onclick="mostrarCorreo()">Apartar</button>
            </div>

            <!-- Campo de correo y botón Confirmar (inicialmente ocultos) -->
        <div id="campo-correo" style="display:none;">
            <input type="email" id="correo" placeholder="Ingresa tu correo" required class="form-control">
            <button class="btn btn-warning" id="confirmar" style="display:none;">Confirmar</button>
        </div>
            
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
    console.log("script cargado");
    const catalogo = document.getElementById("catalogo");

    // Función para obtener productos desde el backend
    async function obtenerProductos() {
        try {
            const response = await fetch("/obtener_catalogo"); 
            catalogo.innerHTML = "";  
            // Verifica que la respuesta sea válida
            if (!response.ok) {
                throw new Error("Error al obtener los productos");
            }
            // Convierte la respuesta en formato JSON
            const productos = await response.json(); 
            productos.forEach(producto => {
                console.log(producto);
                const productoHTML = `
                    <div class="producto" onclick="abrirModal('${producto.id}','${producto.nombre}', 'storage/${producto.referencia}', '${producto.descripcion}', '${producto.stock}','${producto.precio}')">
                        <img src="storage/${producto.referencia}" alt="${producto.nombre}">
                        <div class="info">
                            <h3>${producto.nombre}</h3>
                            <p>${producto.descripcion}</p>
                        </div>
                    </div>
                `;
                catalogo.innerHTML += productoHTML;
            });
        } catch (error) {
            console.error("Error al obtener productos:", error);
        }
    }

    // Cargar productos al inicio
    obtenerProductos();
});

    </script>

    <script>
        function abrirModal(id, titulo, imagen, descripcion, stock, precio) {

            if(id && titulo && imagen && descripcion && stock && precio){
                console.log(id,titulo,"ok");
                document.getElementById("modal-titulo").textContent = titulo;
                document.getElementById("modal-imagen").src = imagen;
                document.getElementById("modal-descripcion").textContent = descripcion;
                document.getElementById("modal-stock").textContent = `En stock: ${stock}`;
                document.getElementById("modal-precio").textContent = `Precio: ${precio}`;
                document.getElementById("modal").style.display = "flex";

                // Aquí, el evento de confirmación se agrega correctamente
                var confirmar = document.getElementById('confirmar');
                if (confirmar) {
                    // Se pasa una función anónima para evitar que se ejecute de inmediato
                    confirmar.addEventListener('click', function() {
                        confirmarCorreo(id);
                    });
                }
            }
            
        }

        function cerrarModal() {
            document.getElementById("modal").style.display = "none";
        }

        // Muestra el campo de correo y el botón de confirmar
        function mostrarCorreo() {
            document.getElementById("apartar").style.display = "none";
            document.getElementById("campo-correo").style.display = "block";
            document.getElementById("confirmar").style.display = "inline-block";
        }

        // Función para enviar el correo al servidor
        async function confirmarCorreo(id) {
            const correo = document.getElementById("correo").value;
            if (correo) {
                try {
                    // Realiza el POST al servidor con el correo y el id del producto
                    const response = await fetch(`/enviar_pdf_cliente?correo=${correo}&id=${id}`);

                    if (!response.ok) {
                        throw new Error("Error al enviar el correo");
                    }

                    alert("Se envió a: " + correo);
                    cerrarModal();  // Cierra el modal después de enviar el correo
                } catch (errores) {
                    console.error(errores);
                    alert("Hubo un error al intentar enviar el correo.");
                }
            } else {
                alert("Por favor, ingresa un correo válido.");
            }
        }
    </script>



@endsection