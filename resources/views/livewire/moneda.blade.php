<div>
    <div class="row">

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Catalogos /</span> Monedas</h4>

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
                            @can('create', App\Models\Categorias::class)
                                <div class="btn-group me-2 mb-2 mb-md-0">
                                    <a href="{{ route('monedas.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i> Registrar monedas
                                    </a>
                                </div>
                            @endcan
                            <!-- Botón de exportación -->
                            <div class="btn-group me-2 mb-2 mb-md-0">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Exportaciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('categorias.index') }}" class="dropdown-item">
                                                <i class="fas fa-file-excel text-success me-1"></i>
                                                Exportar a Excel
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

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
                           Lista de monedas
                        </caption>
                        <thead>
                            <tr>
                                <th>#</th>
<th></th>
                                <th>Moneda</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monedas as $moneda)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>

                                    <td>
                                        @if ($moneda->imagenes)
                                          
                                                <ul
                                                    class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                        title=" {{ $moneda->nombre }}">
                                                        <img src="{{ $moneda->imagenes->url }}" alt="{{ $moneda->nombre }}"
                                                            class="rounded-circle" />
                                                    </li>
                                                </ul>
                                     
                                        @else
                                            <ul
                                                class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                    title="{{ $moneda->nombre }}">
                                                    <img src="https://ui-avatars.com/api/?name= {{ $moneda->nombre }}"
                                                        alt="Avatar" class="rounded-circle" />
                                                </li>
                                            </ul>
                                        @endif
                                      
                                    </td>
                                    <td>{{ $moneda->nombre }}</td>

                                    <td class="text-wrap">{{ wordwrap($moneda->descripcion, 50, "\n", true) }}</td>
                                    <td><span
                                            class=" badge bg-label-{{ $moneda->estado == 1 ? 'primary' : 'danger' }} me-1">
                                            {{ $moneda->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>

                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @can('update', App\Models\Categorias::class)
                                                    <a class="dropdown-item"
                                                        href="{{ route('monedas.edit', ['monedas' => $moneda->id]) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('delete', App\Models\Categorias::class)
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="confirmAction({{ $moneda->id }})">
                                                        <i
                                                            class="fas fa-{{ $moneda->estado == 1 ? 'trash-alt' : 'toggle-on' }}"></i>
                                                        {{ $moneda->estado == 1 ? 'Eliminar' : 'Activar' }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                        <form id="deleteForm{{ $moneda->id }}"
                                            action="{{ route('monedas.destroy', ['monedas' => $moneda->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button id="submitBtn{{ $moneda->id }}" type="submit"></button>
                                        </form>

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
                            <li class="page-item {{ $monedas->onFirstPage() ? 'disabled' : '' }}">
                                <button type="button" class="page-link" wire:click="previousPage" {{ $monedas->onFirstPage() ? 'disabled' : '' }}>
                                    Previo
                                </button>
                            </li>
                
                            <!-- Botones para cada página -->
                            @foreach ($monedas->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif
                
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <li class="page-item {{ $page == $monedas->currentPage() ? 'active' : '' }}">
                                            <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">
                                                {{ $page }}
                                            </button>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                
                            <!-- Botón para la página siguiente -->
                            <li class="page-item {{ $monedas->hasMorePages() ? '' : 'disabled' }}">
                                <button type="button" class="page-link" wire:click="nextPage" {{ $monedas->hasMorePages() ? '' : 'disabled' }}>
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
<script>
    function confirmAction(categoriaId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Quieres cambiar el estado de este categoría?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, cambiar estado'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('deleteForm' + categoriaId);

                // Agregar un campo oculto al formulario para indicar la acción
                var actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = '_method';
                actionInput.value = 'DELETE';
                form.appendChild(actionInput);

                // Enviar el formulario
                form.submit();
            }
        });
    }
</script>
