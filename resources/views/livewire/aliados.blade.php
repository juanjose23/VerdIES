<div>
    <div class="card-header d-flex flex-wrap justify-content-between gap-4">
        <div class="card-title mb-0 me-1">
            <h5 class="mb-0">Todos los locales</h5>
            <p class="mb-0">{{ $contador }}</p>

        </div>
        <div class="d-flex justify-content-md-end align-items-center column-gap-6 flex-sm-row flex-column row-gap-4">
            <select class="form-select" wire:model.live="buscar">
                <option value="">Todos los locales</option>
                @foreach ($users as $aliados)
                    <option value="{{ $aliados->name }}">{{ $aliados->name }}</option>
                @endforeach

            </select>

            <div class="form-check form-switch my-2 ms-2">
                <input type="checkbox" class="form-check-input" id="CourseSwitch">
                <label class="form-check-label text-nowrap mb-0" for="CourseSwitch">Hide completed</label>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row gy-6 mb-6">
            @foreach ($users as $aliado)
                <div class="col-lg-6">
                    <div class="card p-2 h-100 shadow-none border">
                        <div class="card-body d-flex justify-content-between flex-wrap-reverse">
                            <div
                                class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                                <div class="card-title">
                                    <h5 class="text-primary mb-2">{{ wordwrap($aliado->name, 15, "\n", true) }}</h5>
                                    <p class="text-body w-sm-80 app-academy-xl-100">
                                        <!-- Agrega aquí más contenido si es necesario -->
                                    </p>
                                </div>
                                <div class="mb-0">
                                    <a class="btn btn-sm btn-primary"
   href="{{ route('cliente.show', $aliado->slug) }}">Ver promociones</a>
                                </div>
                            </div>
                            <div
                                class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-4 mb-sm-0">
                                @if ($aliado->imagenes)
                                    <img class="img-fluid scaleX-n1-rtl" src="{{ $aliado->imagenes->url }}"
                                        alt="Foto de perfil de {{ $aliado->name }}" />
                                @else
                                    <img class="img-fluid scaleX-n1-rtl"
                                        src="https://ui-avatars.com/api/?name={{ $aliado->name }}"
                                        alt="Foto por defecto" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
           <!-- Paginación personalizada -->
    <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
        <ul class="pagination mb-0 pagination-rounded">
            <!-- Botón de primera página -->
            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" wire:click="gotoPage(1)" href="javascript:void(0);">
                    <i class="bx bx-chevrons-left bx-sm scaleX-n1-rtl"></i>
                </a>
            </li>
            
            <!-- Botón de página anterior -->
            <li class="page-item {{ $users->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" wire:click="previousPage" href="javascript:void(0);">
                    <i class="bx bx-chevron-left bx-sm scaleX-n1-rtl"></i>
                </a>
            </li>
            
            <!-- Números de página -->
            @foreach ($users->links()->elements[0] as $page => $url)
                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage({{ $page }})" href="javascript:void(0);">{{ $page }}</a>
                </li>
            @endforeach
            
            <!-- Botón de página siguiente -->
            <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" wire:click="nextPage" href="javascript:void(0);">
                    <i class="bx bx-chevron-right bx-sm scaleX-n1-rtl"></i>
                </a>
            </li>
            
            <!-- Botón de última página -->
            <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" wire:click="gotoPage({{ $users->lastPage() }})" href="javascript:void(0);">
                    <i class="bx bx-chevrons-right bx-sm scaleX-n1-rtl"></i>
                </a>
            </li>
        </ul>
    </nav>
    </div>

</div>
