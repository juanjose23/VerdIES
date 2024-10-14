<div>
    <div class="row">

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Areas de conocimiento /</span> Universidades</h4>

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
                            @can('create', App\Models\Universidades::class)
                                <div class="btn-group me-2 mb-2 mb-md-0">
                                    <a href="{{ route('areas.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i> Registrar Universidad
                                    </a>
                                </div>
                            @endcan
                            <!-- Botón de exportación -->
                          

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
                            Lista de universidades
                        </caption>
                        <thead>
                            <tr>
                                <th>#</th>
                
                                <th>Universidad</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                <tr class="odd">
                                    <td>{{ $loop->index + 1 }}</td>
                                  


                                    <td class="sorting_1">
                                        <div class="d-flex justify-content-start align-items-center user-name">

                                            <div class="avatar-wrapper">


                                                @if ($area->imagenes)
                                                    <div class="avatar avatar-sm me-3"><img
                                                            src="{{ $area->imagenes->url }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                @else
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="https://ui-avatars.com/api/?name= {{ $area->nombre }}"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="" class="text-body text-truncate">
                                                    <span class="fw-medium">{{ wordwrap($area->nombre , 15, "\n", true) }}</span>
                                                </a>
                                            </div>

                                        </div>
                                    </td>

                                    <td class="text-wrap">{{ wordwrap($area->descripcion, 50, "\n", true) }}</td>
                                    <td><span
                                            class=" badge bg-label-{{ $area->estado == 1 ? 'primary' : 'danger' }} me-1">
                                            {{ $area->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>

                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @can('update', App\Models\Universidades::class)
                                                    <a class="dropdown-item"
                                                        href="{{ route('areas.edit', ['areas' => $area->id]) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('delete', App\Models\Universidades::class)
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="confirmAction({{ $area->id }})">
                                                        <i
                                                            class="bx bx-{{ $area->estado == 1 ? 'trash-alt' : 'toggle-left' }}"></i>
                                                        {{ $area->estado == 1 ? 'Eliminar' : 'Activar' }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                        <form id="deleteForm{{ $area->id }}"
                                            action="{{ route('areas.destroy', ['areas' => $area->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button id="submitBtn{{ $area->id }}" type="submit"></button>
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
                            <li class="page-item {{ $areas->onFirstPage() ? 'disabled' : '' }}">
                                <button type="button" class="page-link" wire:click="previousPage"
                                    {{ $areas->onFirstPage() ? 'disabled' : '' }}>
                                    Previo
                                </button>
                            </li>

                            <!-- Botones para cada página -->
                            @foreach ($areas->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                    </li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <li
                                            class="page-item {{ $page == $areas->currentPage() ? 'active' : '' }}">
                                            <button type="button" class="page-link"
                                                wire:click="gotoPage({{ $page }})">
                                                {{ $page }}
                                            </button>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach

                            <!-- Botón para la página siguiente -->
                            <li class="page-item {{ $areas->hasMorePages() ? '' : 'disabled' }}">
                                <button type="button" class="page-link" wire:click="nextPage"
                                    {{ $areas->hasMorePages() ? '' : 'disabled' }}>
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
            text: '¿Quieres cambiar el estado de esta Area de conocimiento?',
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
