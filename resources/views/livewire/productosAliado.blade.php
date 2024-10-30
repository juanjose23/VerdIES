<div class="tf-grid-layout tf-col-2 lg-col-4">
    @foreach ($productos as $producto)
    <div class="card-product style-9">
        <div class="card-product-wrapper">
            <a href="product-detail.html" class="product-img">
                <img class="lazyload img-product" data-src="{{ $producto ->imagenes ->url }}" src="{{ $producto ->imagenes ->url }}" alt="image-product">
                <img class="lazyload img-hover" data-src="images/products/vegetable2.jpg" src="images/products/vegetable2.jpg" alt="image-product">
            </a>
            <!-- <div class="list-product-btn absolute-2">
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
            </div> -->
        </div>
        <div class="card-product-info">
            @foreach ($producto->detallePromociones as $detalle)
            <div class="inner-info">
                <a class="title link fw-6">{{ wordwrap($producto->nombre , 15, "\n", true) }}</a>
                <span class="price fw-6">{{ $detalle->cantidadmoneda }} {{ $detalle->moneda->nombre }}</span>
            </div>
            <div class="list-product-btn">
                <a href="javascript:void(0);" wire:click="cargarProducto({{ $producto->id }})"
                    class="box-icon quick-add tf-btn-loading">
                    <span class="icon icon-bag"></span>
                    <span class="tooltip">Añadir al carrito</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
<script>
    $(function() {
        // Configuración del toast
        toastr.options = {
            maxOpened: 1, // Solo permite un toast visible a la vez
            autoDismiss: true,
            preventDuplicates: true, // Evita duplicados// Previene toasts duplicados
            closeButton: true, // Habilita el botón de cierre
            progressBar: true, // Barra de progreso (opcional)
            positionClass: "toast-top-right", // Ubicación en la pantalla
            timeOut: 5000, // Duración en milisegundos
            extendedTimeOut: 2000, // Tiempo extendido cuando el mouse está sobre el toast
            showEasing: "swing", // Animación de entrada
            hideEasing: "linear", // Animación de salida
            showMethod: "fadeIn", // Método de aparición
            hideMethod: "fadeOut", // Método de desaparición
        };
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Función para actualizar el precio total, ahora fuera del evento Livewire.on
        function actualizarPrecioTotal() {
            const inputCantidad = document.getElementById('quantityInput');
            const cantidad = parseInt(inputCantidad.value) || 1;
            const puntosRequeridos = parseFloat(inputCantidad.dataset.puntosRequeridos) || 0; // Si 'puntosRequeridos' depende de otro valor, puedes pasar el valor como parámetro
            const precioTotal = puntosRequeridos * cantidad;
            actualizarSpanPrecio(precioTotal);
            console.log(`Precio total actualizado: $${precioTotal.toFixed(2)} para cantidad: ${cantidad}`);
        }

        // Escucha el evento 'mostrarModalQuickAdd' de Livewire
        Livewire.on('mostrarModalQuickAdd', function(producto) {
            console.log("Producto recibido:", producto);

            // Extrae los datos del producto
            const productoData = producto.producto;
            const detallePromocion = productoData.detalle_promociones[0] || {};
            const cantidadDisponibleInicial = parseFloat(detallePromocion.cantidad) || 0;
            const puntosRequeridos = parseFloat(detallePromocion.cantidadmoneda) || 0;
            const monedaId = productoData.moneda.id;
            const productoId = productoData.id;
            const inputCantidad = document.getElementById('quantityInput');
            inputCantidad.dataset.puntosRequeridos = puntosRequeridos; // Asigna puntosRequeridos para usar en actualizarPrecioTotal
            const btnAgregarCarrito = document.getElementById('addToCart');
            const plusBtn = document.getElementById('plusBtn');
            const minusBtn = document.getElementById('minusBtn');

            // Verifica los datos en el localStorage
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const puntosDisponiblesObj = JSON.parse(localStorage.getItem('puntosDisponibles')) || {};
            const cantidadDisponibleObj = JSON.parse(localStorage.getItem('cantidadDisponible')) || {};
            let puntosDisponibles = puntosDisponiblesObj[monedaId] || parseFloat(productoData.moneda.puntos);
            let cantidadDisponible = cantidadDisponibleObj[productoId] !== undefined ? cantidadDisponibleObj[productoId] : cantidadDisponibleInicial;

            console.log("Puntos disponibles iniciales:", puntosDisponibles);
            console.log("Puntos requeridos para un producto:", puntosRequeridos);
            console.log("Cantidad disponible inicial:", cantidadDisponible);

            // Valida la disponibilidad de cantidad y puntos
            if (!validarDisponibilidad(cantidadDisponible, puntosDisponibles, puntosRequeridos)) return;

            // Función para actualizar el precio total
            const actualizarPrecioTotal = () => {
                const cantidad = parseInt(inputCantidad.value) || 1;
                const precioTotal = puntosRequeridos * cantidad;
                actualizarSpanPrecio(precioTotal);
                console.log(`Precio total actualizado: $${precioTotal.toFixed(2)} para cantidad: ${cantidad}`);
            };

            // Limpia los eventos anteriores para evitar duplicados
            limpiarEventosAnteriores(plusBtn, minusBtn, btnAgregarCarrito);

            // Reasigna los elementos después de clonar
            const newPlusBtn = document.getElementById('plusBtn');
            const newMinusBtn = document.getElementById('minusBtn');
            const newBtnAgregarCarrito = document.getElementById('addToCart');

            // Asigna los eventos a los botones
            asignarEventos(newPlusBtn, newMinusBtn, newBtnAgregarCarrito, inputCantidad, puntosDisponibles, puntosRequeridos, cantidadDisponible, carrito, productoData, monedaId, productoId, puntosDisponiblesObj, cantidadDisponibleObj);

            // Actualiza el contenido del modal
            actualizarContenidoModal(productoData, cantidadDisponible, puntosRequeridos, puntosDisponibles);
            // Muestra el modal
            var myModal = new bootstrap.Modal(document.getElementById('quick_add'), {
                keyboard: false
            });
            myModal.show();

            // Llama a actualizarPrecioTotal
            actualizarPrecioTotal();


            // Resetea el modal al cerrarlo
            document.getElementById('quick_add').addEventListener('hide.bs.modal', function() {
                inputCantidad.value = 1;
                btnAgregarCarrito.querySelector('.tf-qty-price').textContent = '$0.00';
            });
        });

        // Función para validar la disponibilidad de cantidad y puntos
        function validarDisponibilidad(cantidadDisponible, puntosDisponibles, puntosRequeridos) {
            if (cantidadDisponible < 1) {
                toastr.error("No hay cantidad disponible para este producto.", "Cantidad insuficiente");
                return false;
            }

            if (puntosDisponibles < puntosRequeridos) {
                toastr.error("No tienes suficientes puntos para canjear esta promoción.", "Fondos insuficientes");
                return false;
            }

            return true;
        }

        // Función para actualizar el span del precio total
        function actualizarSpanPrecio(precioTotal) {
            const spanPrecio = document.getElementById('spanPriceCart');
            if (spanPrecio) {
                spanPrecio.textContent = `${precioTotal.toFixed(2)}`;
            } else {
                console.error('No se encontró el elemento con el ID spanPriceCart');
            }
        }

        // Función para limpiar los eventos anteriores
        function limpiarEventosAnteriores(plusBtn, minusBtn, btnAgregarCarrito) {
            if (plusBtn) plusBtn.replaceWith(plusBtn.cloneNode(true));
            if (minusBtn) minusBtn.replaceWith(minusBtn.cloneNode(true));
            if (btnAgregarCarrito) btnAgregarCarrito.replaceWith(btnAgregarCarrito.cloneNode(true));
        }

        // Función para asignar los eventos a los botones
        function asignarEventos(newPlusBtn, newMinusBtn, newBtnAgregarCarrito, inputCantidad, puntosDisponibles, puntosRequeridos, cantidadDisponible, carrito, productoData, monedaId, productoId, puntosDisponiblesObj, cantidadDisponibleObj) {
            if (newPlusBtn) {
                newPlusBtn.addEventListener('click', function() {
                    let cantidad = parseInt(inputCantidad.value) || 1;
                    const puntosNecesarios = (cantidad + 1) * puntosRequeridos;
                    console.log("Intentando incrementar. Puntos necesarios:", puntosNecesarios);

                    if (puntosDisponibles >= puntosNecesarios) {
                        if (cantidad < cantidadDisponible) {
                            inputCantidad.value = ++cantidad;
                            actualizarPrecioTotal();
                        } else {
                            // Mostrar toast cuando no hay más cantidad disponible
                            toastr.warning("No hay más cantidad disponible para este producto.", "Cantidad insuficiente");
                        }
                    } else {
                        // Mostrar toast cuando no hay suficientes puntos
                        toastr.error("No tienes suficientes puntos para incrementar esta cantidad.", "Fondos insuficientes");
                    }
                });
            }



            if (newMinusBtn) {
                newMinusBtn.addEventListener('click', function() {
                    let cantidad = parseInt(inputCantidad.value) || 1;
                    if (cantidad > 1) {
                        inputCantidad.value = --cantidad;
                        actualizarPrecioTotal();
                    }
                });
            }

            if (newBtnAgregarCarrito) {
                newBtnAgregarCarrito.addEventListener('click', function() {
                    const cantidad = parseInt(inputCantidad.value) || 1;
                    const puntosUsados = cantidad * puntosRequeridos;
                    const puntosRestantes = puntosDisponibles - puntosUsados;
                    const cantidadRestante = cantidadDisponible - cantidad;

                    const productoExistente = carrito.find(item => item.id === productoData.id);

                    if (productoExistente) {
                        productoExistente.cantidad += cantidad;
                        productoExistente.puntosUsados += puntosUsados;
                    } else {
                        carrito.push({
                            id: productoData.id,
                            nombre: productoData.nombre,
                            cantidad: cantidad,
                            puntosUsados: puntosUsados,
                            monedaId: monedaId,
                            imagen: productoData.imagenes.url
                        });
                    }

                    puntosDisponiblesObj[monedaId] = puntosRestantes;
                    cantidadDisponibleObj[productoId] = cantidadRestante;
                    localStorage.setItem('carrito', JSON.stringify(carrito));
                    localStorage.setItem('puntosDisponibles', JSON.stringify(puntosDisponiblesObj));
                    localStorage.setItem('cantidadDisponible', JSON.stringify(cantidadDisponibleObj));

                    actualizarCarrito();
                });
            }
        }

        // Función para actualizar el contenido del modal
        function actualizarContenidoModal(productoData, cantidadDisponible, puntosRequeridos, puntosDisponibles) {
            if (productoData.detalle_promociones && productoData.detalle_promociones[0]) {
                const imgProduct = document.getElementById('imgProduct');
                if (imgProduct) {
                    imgProduct.src = productoData.imagenes.url || 'ruta/a/imagen/predeterminada.jpg';
                } else {
                    console.error('No se encontró el elemento con el ID imgProduct');
                }
                document.querySelector('#quick_add .content a').textContent = productoData.nombre;
                document.getElementById('productDescription').textContent = productoData.descripcion;
                document.getElementById('quantityAvailable').textContent = cantidadDisponible;
                document.querySelector('#quick_add .price').textContent = `${puntosRequeridos} ${productoData.detalle_promociones[0].monedas.nombre}`;
                document.getElementById('yourExactlyCoin').textContent = `Tu cantidad de ${productoData.moneda.nombre} : ${puntosDisponibles}`;
            }
        }

        // Función para actualizar el carrito en el DOM
        function actualizarCarrito() {
            if (!localStorage.getItem('carrito')) {
                let notificationCartSpan = document.getElementById('notificationCartSpan').style.display = 'none';
            }
            else {
                let notificationCartSpan = document.getElementById('notificationCartSpan').style.display = 'block';
            }
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const carritoItemsContainer = document.querySelector('.tf-mini-cart-items');
            const subtotalElement = document.querySelector('.tf-totals-total-value');
            carritoItemsContainer.innerHTML = '';

            let subtotal = 0;

            carrito.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.classList.add('tf-mini-cart-item');
                itemElement.innerHTML = `
                        <div class="tf-mini-cart-image">
                            <a href="product-detail.html">
                                <img src="${item.imagen}" alt="${item.nombre}">
                            </a>
                        </div>
                        <div class="tf-mini-cart-info">
                            <a class="title link" href="product-detail.html">${item.nombre}</a>
                            <div class="price fw-6">$${item.puntosUsados.toFixed(2)}</div>
                            <div class="tf-mini-cart-btns">
                                <div class="wg-quantity small">
                                    <span class="btn-quantity minus-btn">-</span>
                                    <input type="text" name="number" value="${item.cantidad}">
                                    <span class="btn-quantity plus-btn">+</span>
                                </div>
                                <div class="tf-mini-cart-remove">Eliminar</div>
                            </div>
                        </div>`;

                carritoItemsContainer.appendChild(itemElement);

                subtotal += item.puntosUsados;
            });

            subtotalElement.textContent = `$${subtotal.toFixed(2)} USD`;

            // Asigna eventos a los botones del carrito
            asignarEventosCarrito();
        }

        // Función para asignar eventos a los botones del carrito
        function asignarEventosCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const puntosDisponiblesObj = JSON.parse(localStorage.getItem('puntosDisponibles')) || {};
            const cantidadDisponibleObj = JSON.parse(localStorage.getItem('cantidadDisponible')) || {};

            document.querySelectorAll('.tf-mini-cart-item').forEach((itemElement, index) => {
                const plusBtn = itemElement.querySelector('.plus-btn');
                const minusBtn = itemElement.querySelector('.minus-btn');
                const inputCantidad = itemElement.querySelector('input[name="number"]');
                const producto = carrito[index];
                const puntosRequeridos = producto.puntosUsados / producto.cantidad;
                const monedaId = producto.monedaId;
                const productoId = producto.id;
                let puntosDisponibles = puntosDisponiblesObj[monedaId];
                let cantidadDisponible = cantidadDisponibleObj[productoId];
                let cantidadDisponibleTemp = cantidadDisponibleObj[productoId] + inputCantidad.value;

                if (plusBtn) {
                    plusBtn.addEventListener('click', function() {
                        let cantidad = parseInt(inputCantidad.value) || 1;
                        const puntosNecesarios = puntosRequeridos;
                        console.log("Intentando incrementar. Puntos necesarios:", puntosNecesarios);


                        if (puntosDisponibles >= puntosNecesarios) {
                            console.log("Puntos suficientes para incrementar la cantidad.");
                            if (cantidad < cantidadDisponibleTemp) {
                                inputCantidad.value = ++cantidad;
                                producto.cantidad = cantidad;
                                producto.puntosUsados = cantidad * puntosRequeridos;
                                puntosDisponibles -= puntosRequeridos;
                                cantidadDisponible -= 1;
                                puntosDisponiblesObj[monedaId] = puntosDisponibles;
                                cantidadDisponibleObj[productoId] = cantidadDisponible;
                                localStorage.setItem('carrito', JSON.stringify(carrito));
                                localStorage.setItem('puntosDisponibles', JSON.stringify(puntosDisponiblesObj));
                                localStorage.setItem('cantidadDisponible', JSON.stringify(cantidadDisponibleObj));
                                actualizarCarrito();
                            } else {
                                
                                toastr.warning("No hay más cantidad disponible para este producto.", "Cantidad insuficiente");
                            }
                        } else {
                            
                            toastr.error("No tienes suficientes puntos para incrementar esta cantidad.", "Fondos insuficientes");
                        }
                    });
                }

                if (minusBtn) {
                    minusBtn.addEventListener('click', function() {
                        let cantidad = parseInt(inputCantidad.value) || 1;
                        if (cantidad > 1) {
                            inputCantidad.value = --cantidad;
                            producto.cantidad = cantidad;
                            producto.puntosUsados = cantidad * puntosRequeridos;
                            puntosDisponibles += puntosRequeridos;
                            cantidadDisponible += 1;
                            puntosDisponiblesObj[monedaId] = puntosDisponibles;
                            cantidadDisponibleObj[productoId] = cantidadDisponible;
                            localStorage.setItem('carrito', JSON.stringify(carrito));
                            localStorage.setItem('puntosDisponibles', JSON.stringify(puntosDisponiblesObj));
                            localStorage.setItem('cantidadDisponible', JSON.stringify(cantidadDisponibleObj));
                            actualizarCarrito();
                        }
                    });
                }
            });
        }

        // Llama a la función al cargar la página para actualizar el carrito con los datos almacenados
        actualizarCarrito();
    });
</script>