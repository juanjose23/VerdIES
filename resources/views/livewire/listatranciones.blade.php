<div>
    <div class="row">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <!-- Campo de búsqueda -->
                        <div class="input-group mb-3" style="max-width: 300px;">
                            <input type="text" wire:model.live.debounce.300ms="buscar"
                                class="form-control form-control rounded-start"
                                placeholder="Buscar...">
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-end flex-wrap mt-3 mt-md-0">
                            <!-- Botón para crear una categoría -->
                            @can('create', App\Models\Roles::class)
                                <div class="btn-group me-2 mb-2 mb-md-0">
                                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i> Registrar Roles
                                    </a>
                                </div>
                            @endcan


                            <!-- Selector de cantidad de registros -->
                            <div>
                                <select name="buscador" id="buscador" wire:model.live="perPage"
                                    class="form-select mt-2 mt-md-0">
                                    <option value="">Mostrar en:</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="0">Todos</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">#</span>
                                </th>

                                <th scope="col" class="px-4 py-3">Promocion</th>
                                <th scope="col" class="px-4 py-3">Usuario</th>
                                <th scope="col" class="px-4 py-3">Puntos</th>
                                <th scope="col" class="px-4 py-3">Estado</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transciones as $rol)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>


                                    <td>{{ $rol->promociones->nombre }}</td>

                                    <td class="text-wrap">
                                        {{ $rol->users->email }}
                                    </td>
                                    <td class="text-wrap">
                                        {{ $rol->puntos }}
                                    </td>

                                    <td>
                                        <span
                                            class="badge rounded-pill {{ $rol->estado == 1 ? 'bg-success' : 'bg-warning' }}">
                                            {{ $rol->estado == 1 ? 'Canjeado' : 'Aceptar' }}
                                        </span>
                                    </td>
                                  
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <!-- Botón para la página anterior -->
                            <li
                                class="page-item {{ $transciones->onFirstPage() ? 'disabled' : '' }}">
                                <button type="button" class="page-link"
                                    wire:click="previousPage"
                                    {{ $transciones->onFirstPage() ? 'disabled' : '' }}>
                                    Previo
                                </button>
                            </li>

                            <!-- Botones para cada página -->
                            @foreach ($transciones->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span
                                            class="page-link">{{ $element }}</span></li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <li
                                            class="page-item {{ $page == $transciones->currentPage() ? 'active' : '' }}">
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
                                class="page-item {{ $transciones->hasMorePages() ? '' : 'disabled' }}">
                                <button type="button" class="page-link"
                                    wire:click="nextPage"
                                    {{ $transciones->hasMorePages() ? '' : 'disabled' }}>
                                    Siguiente
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
