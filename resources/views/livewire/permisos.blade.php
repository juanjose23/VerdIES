<div>
    <div>
        <div class="row">

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Usuarios /</span> Privilegios</h4>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Campo de búsqueda -->
                            <div class="input-group mb-3" style="max-width: 300px;">
                                <input type="text" wire:model.live.debounce.300ms="buscar"
                                    class="form-control form-control rounded-start" placeholder="Buscar...">
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-end flex-wrap mt-3 mt-md-0">
                                <!-- Botón para crear una categoría -->
                                @can('create', App\Models\permisos::class)
                                    <div class="btn-group me-2 mb-2 mb-md-0">
                                        <a href="{{ route('permisos.create') }}" class="btn btn-primary">
                                            <i class="bx bx-plus me-1"></i> Registrar privilegios
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
                            <caption class="ms-4">
                                Lista de Privilegios
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">#</span>
                                    </th>
                                    <th scope="col" class="px-4 py-3">Rol</th>
                                    <th scope="col" class="px-4 py-3">N° de permisos</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $rol->roles->nombre }}</td>
                                        <td class="text-center">{{ wordwrap($rol->cantidad, 50, "\n", true) }}</td>
                                        <td>
                
                                            <div class="d-flex mb-1 align-items-center">
                                                @can('update', App\Models\permisos::class)
                                                    <a href="{{ route('permisos.edit', ['permisos' => $rol->roles->id]) }}"
                                                        class="btn btn-info" role="button">
                                                        <i class="bx bx-edit"></i>
                
                                                    </a>
                                                @endcan
                
                                                @can('delete', App\Models\permisos::class)
                                                    <div class="m-1">
                                                        <a href="{{ route('permisos.show', ['permisos' => $rol->roles->id]) }}"
                                                            class="btn btn-secondary" role="button">
                                                            <i class="bx bx-info-circle"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                            </div>
                
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
                                <li class="page-item {{ $roles->onFirstPage() ? 'disabled' : '' }}">
                                    <button type="button" class="page-link" wire:click="previousPage"
                                        {{ $roles->onFirstPage() ? 'disabled' : '' }}>
                                        Previo
                                    </button>
                                </li>

                                <!-- Botones para cada página -->
                                @foreach ($roles->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span
                                                class="page-link">{{ $element }}</span></li>
                                    @endif

                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <li class="page-item {{ $page == $roles->currentPage() ? 'active' : '' }}">
                                                <button type="button" class="page-link"
                                                    wire:click="gotoPage({{ $page }})">
                                                    {{ $page }}
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach

                                <!-- Botón para la página siguiente -->
                                <li class="page-item {{ $roles->hasMorePages() ? '' : 'disabled' }}">
                                    <button type="button" class="page-link" wire:click="nextPage"
                                        {{ $roles->hasMorePages() ? '' : 'disabled' }}>
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
</div>
