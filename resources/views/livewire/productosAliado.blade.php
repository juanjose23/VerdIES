<div class="tf-grid-layout tf-col-2 lg-col-4">
    @foreach ($productos as $producto)
    <div class="card-product style-9">
        <div class="card-product-wrapper">
            <a href="product-detail.html" class="product-img">
                <img class="lazyload img-product" data-src="https://res.cloudinary.com/drmoodyde/image/upload/v1728884271/carnita_asada_aoaww8.webp" src="https://res.cloudinary.com/drmoodyde/image/upload/v1728884271/carnita_asada_aoaww8.webp" alt="image-product">
                <img class="lazyload img-hover" data-src="images/products/vegetable2.jpg" src="images/products/vegetable2.jpg" alt="image-product">
            </a>
            <div class="list-product-btn absolute-2">
                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                    <span class="icon icon-heart"></span>
                    <span class="tooltip">Add to Wishlist</span>
                    <span class="icon icon-delete"></span>
                </a>
                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                    <span class="icon icon-compare"></span>
                    <span class="tooltip">Add to Compare</span>
                    <span class="icon icon-check"></span>
                </a>
                <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                    <span class="icon icon-view"></span>
                    <span class="tooltip">Quick View</span>
                </a>
            </div>
        </div>
        <div class="card-product-info">
            @foreach ($producto->detallePromociones as $detalle)
            <div class="inner-info">
                <a href="product-detail.html" class="title link fw-6">{{ wordwrap($producto->nombre , 15, "\n", true) }}</a>
                <span class="price fw-6">{{ $detalle->cantidadmoneda }} {{ $detalle->moneda->nombre }}</span>
            </div>
            <div class="list-product-btn">
                <a href="javascript:void(0);" wire:click="cargarProducto({{ $producto->id }})"
                    class="box-icon quick-add tf-btn-loading">
                    <span class="icon icon-bag"></span>
                    <span class="tooltip">Add to cart</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('mostrarModalQuickAdd', function(producto) {
            console.log("Producto recibido:", producto); // Verificar el objeto completo recibido

            const productoData = producto.producto;
            const puntosDisponibles = parseFloat(productoData.moneda.puntos);
            const puntosRequeridos = parseFloat(productoData.detalle_promociones[0]?.cantidadmoneda);
            const inputCantidad = document.getElementById('quantityInput');
            const btnAgregarCarrito = document.querySelector('.btn-add-to-cart');
            const plusBtn = document.getElementById('plusBtn');
            const minusBtn = document.getElementById('minusBtn');

            // Eliminar los event listeners previos si existen
            plusBtn.replaceWith(plusBtn.cloneNode(true));
            minusBtn.replaceWith(minusBtn.cloneNode(true));


            // Debug: Mostrar puntos disponibles y requeridos en consola
            console.log("Puntos disponibles:", puntosDisponibles);
            console.log("Puntos requeridos para un producto:", puntosRequeridos);

            // Validación inicial: si no hay puntos suficientes para el primer producto
            if (puntosDisponibles < puntosRequeridos) {
                console.warn("No tienes suficientes puntos para esta promoción.");
                alert("No tienes suficientes puntos para canjear esta promoción.");
                return;
            }

            // Función para actualizar el precio total según la cantidad
            const actualizarPrecioTotal = () => {
                const cantidad = parseInt(inputCantidad.value) || 1;
                const precioTotal = puntosRequeridos * cantidad;
                btnAgregarCarrito.querySelector('.tf-qty-price').textContent = `$${precioTotal.toFixed(2)}`;
                console.log(`Precio total actualizado: $${precioTotal.toFixed(2)} para cantidad: ${cantidad}`);
            };

            // Evento en el botón + (incrementar)
            document.getElementById('plusBtn').addEventListener('click', function() {
                let cantidad = parseInt(inputCantidad.value) || 1;
                const puntosNecesarios = (cantidad + 1) * puntosRequeridos;
                console.log("Intentando incrementar. Puntos necesarios:", puntosNecesarios);

                if (puntosDisponibles >= puntosNecesarios) { // Permitir incrementar si hay puntos
                    inputCantidad.value = ++cantidad;
                    actualizarPrecioTotal();
                    console.log("Cantidad incrementada a:", cantidad);
                } else {
                    alert("No tienes suficientes puntos para incrementar esta cantidad.");
                    console.warn("Cantidad no incrementada. Puntos insuficientes.");
                }
            });

            // Evento en el botón - (decrementar)
            document.getElementById('minusBtn').addEventListener('click', function() {
                let cantidad = parseInt(inputCantidad.value) || 1;
                if (cantidad > 1) {
                    inputCantidad.value = --cantidad;
                    actualizarPrecioTotal();
                    console.log("Cantidad decrementada a:", cantidad);
                } else {
                    console.warn("Cantidad mínima alcanzada. No se puede disminuir más.");
                }
            });

            // Actualizar el contenido del modal
            if (productoData.detalle_promociones && productoData.detalle_promociones[0]) {
                document.querySelector('#quick_add .image img').src = productoData.detalle_promociones[0].monedas.imagen_url || 'ruta/a/imagen/predeterminada.jpg';
                document.querySelector('#quick_add .content a').textContent = productoData.nombre;
                document.getElementById('productDescription').textContent = productoData.descripcion;
                document.querySelector('#quick_add .price').textContent = `${puntosRequeridos} ${productoData.detalle_promociones[0].monedas.nombre}`;
                document.getElementById('yourExactlyCoin').textContent = `Tu cantidad de ${productoData.moneda.nombre} : ${productoData.moneda.puntos}`;
                console.log("Modal contenido actualizado.");
            } else {
                console.warn("No se encontraron promociones para el producto seleccionado.");
            }

            // Abre el modal
            var myModal = new bootstrap.Modal(document.getElementById('quick_add'), {
                keyboard: false
            });
            myModal.show();

            // Actualizar el precio total inicial al abrir el modal
            actualizarPrecioTotal();

            // Evento para resetear el modal cuando se cierra
            document.getElementById('quick_add').addEventListener('hide.bs.modal', function() {
                // Reseteo de campos y variables
                inputCantidad.value = 1; // Restablece la cantidad al valor inicial
                btnAgregarCarrito.querySelector('.tf-qty-price').textContent = '$0.00'; // Restablece el precio total
            });
        });
    });
</script>