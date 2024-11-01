<div>

    <div class="card mb-6">
        <div class="card-header d-flex flex-wrap justify-content-between gap-4">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-0">Nuestro aliados</h5>
                <p class="mb-0">{{$totalUsuarios}}</p>
            </div>
            <div class="d-flex justify-content-md-end align-items-center column-gap-6 flex-sm-row flex-column row-gap-4">
                <input type="text" 
             wire:model.live.debounce.300ms="buscar"
                placeholder="Buscar por nombre ..." 
                class="form-control mb-3" />
               

               
            </div>
        </div>
        <div class="card-body">
            <div class="row gy-6 mb-6">
                @foreach ($promociones as $index => $promocion)
                    <div class="col-lg-6 mb-4"> <!-- Asegúrate de que las columnas tengan un margen inferior -->
                        <div class="card p-2 h-100 shadow-none border">
                            <div class="card-body d-flex justify-content-between flex-wrap-reverse">
                                <div class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                                    <div class="card-title">
                                        <h5 class="text-primary mb-2">{{ $promocion->name }}</h5>
                                        <p class="text-body w-sm-80 app-academy-xl-100">
                                            Horario 8:00 AM - 3:00 PM
                                        </p>
                                    </div>
                                    <div class="mb-0">
                                        <a href="{{ route('establecimientos') }}" class="btn btn-sm btn-primary">Ver promociones</a>

                                    </div>
                                </div>
                                <div class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-4 mb-sm-0">
                                    <img class="img-fluid scaleX-n1-rtl"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Burger_King_logo_%281999%29.svg/512px-Burger_King_logo_%281999%29.svg.png"
                                        alt="boy illustration" />
                                </div>
                            </div>
                        </div>
                    </div>
            
                    @if (($index + 1) % 2 == 0) <!-- Cierra la fila después de cada dos columnas -->
                        </div>
                        <div class="row gy-6 mb-6">
                    @endif
                @endforeach
            </div>
            
            
            <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                <ul class="pagination justify-content-center">
                    <!-- Botón para la página anterior -->
                    <li
                        class="page-item {{ $promociones->onFirstPage() ? 'disabled' : '' }}">
                        <button type="button" class="page-link"
                            wire:click="previousPage"
                            {{ $promociones->onFirstPage() ? 'disabled' : '' }}>
                            
                        </button>
                    </li>

                    <!-- Botones para cada página -->
                    @foreach ($promociones->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span
                                    class="page-link">{{ $element }}</span></li>
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
                    <li
                        class="page-item {{ $promociones->hasMorePages() ? '' : 'disabled' }}">
                        <button type="button" class="page-link"
                            wire:click="nextPage"
                            {{ $promociones->hasMorePages() ? '' : 'disabled' }}>
                            
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
