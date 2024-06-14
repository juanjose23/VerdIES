<div>
    <section id="team" class="team">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar..."
                        wire:model.live.debounce.300ms="buscar">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($promociones as $material)
                            <div class="col-md-6 mt-4 mt-lg-0">
                                <div class="" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="card mb-3 shadow" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4 ">
                                                @if ($material->imagenes)
                                                    <div class="pic">
                                                        <img src="{{ $material->imagenes->url }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                @else
                                                    <div class="pic">
                                                        <img src="https://ui-avatars.com/api/?name={{ $material->nombre }}"
                                                            class="img-fluid" alt="{{ $material->nombre }}">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $material->nombre }}</h5>
                                                    <p class="card-text">
                                                        <!-- Mostrar el nombre del aliado con un icono -->
                                                        <i class="bi bi-person"></i> Aliado:
                                                        {{ $material->users->name }}<br>
                                                        <!-- Mostrar una breve descripción de la promoción con un icono -->
                                                        <i class="bi bi-card-text"></i> Acerca de :
                                                        {{ $material->descripcion }}
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-body-secondary">
                                                            <span>Moneda:
                                                                {{ $material->detalles->monedas->nombre }}</span>
                                                            <br>
                                                            <span>Valor:
                                                                {{ $material->detalles->cantidadmoneda }}</span>
                                                        </small>
                                                    </p>
                                                    @auth
                                                        <!-- Utilizando iconos de Bootstrap Icons -->
                                                        <a href="#" class="btn btn-success" onclick="confirmCanje({{ $material->id }})">
                                                            <i class="bi bi-cart-plus-fill"></i> Canjear
                                                        </a>
                                                        
                                                            <form id="canjearForm{{ $material->id }}" action="{{ route('canjear') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                <input type="hidden" name="material_id" value="{{ $material->id }}">
                                                                <button id="submitBtn{{ $material->id }}" type="submit"></button>
                                                            </form>
                                                            
                                                    @else
                                                        <!-- Utilizando iconos de FontAwesome -->
                                                        <a href="{{ route('login') }}" class="btn btn-success">Canjear ahora
                                                            <i class="fas fa-sign-in-alt"></i></a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <nav aria-label="Page navigation shadow">
                            <ul class="pagination justify-content-center">
                                <!-- Botón para la página anterior -->
                                <li class="page-item {{ $promociones->onFirstPage() ? 'disabled' : '' }}">
                                    <button type="button" class="page-link" wire:click="previousPage"
                                        {{ $promociones->onFirstPage() ? 'disabled' : '' }}>
                                        Previo
                                    </button>
                                </li>

                                <!-- Botones para cada página -->
                                @foreach ($promociones->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span
                                                class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif

                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <li
                                                class="page-item {{ $page == $promociones->currentPage() ? 'active' : '' }}">
                                                <button type="button" class="page-link"
                                                    wire:click="gotoPage({{ $page }})">
                                                    {{ $page }}
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach

                                <!-- Botón para la página siguiente -->
                                <li class="page-item {{ $promociones->hasMorePages() ? '' : 'disabled' }}">
                                    <button type="button" class="page-link" wire:click="nextPage"
                                        {{ $promociones->hasMorePages() ? '' : 'disabled' }}>
                                        Siguiente
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function confirmCanje(materialId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Quieres canjear este producto?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, canjearlo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario cuando se confirma la acción
                document.getElementById('submitBtn' + materialId).click();
            }
        });
    }
</script>
