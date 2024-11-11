<div>
    @php
    $idUsuario = session('IdUser');
    $roleUsuario = App\Models\RolesUsuarios::where('users_id', $idUsuario)->first();
@endphp
    <div class="row">

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Promociones /</span> Promociones</h4>

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
                            @can('create', App\Models\Promociones::class)
                                <div class="btn-group me-2 mb-2 mb-md-0">
                                    <a href="{{ route('promociones.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i> Registrar Promociones
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
                            Lista de Materiales
                        </caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Promocion</th>
                                <th>Categoría</th>
                            

                                @if ($roleUsuario->roles_id != 6)
                                    <th>Aliados</th>
                                @endif

                                <th>Cupos</th>
                                <th>Costo</th>
                                <th>Divisa</th>
                                <th>Precio</th>
                                <th>Fecha de vencimiento </th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promociones as $material)
                                <tr class="odd">
                                    <td>{{ $loop->index + 1 }}</td>

                                    <td class="sorting_1">
                                        <div class="d-flex justify-content-start align-items-center user-name">

                                            <div class="avatar-wrapper">


                                                @if ($material->imagenes)
                                                    <div class="avatar avatar-sm me-3"><img
                                                            src="{{ $material->imagenes->url }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                @else
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="https://ui-avatars.com/api/?name= {{ $material->nombre }}"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="" class="text-body text-truncate">
                                                    <span class="fw-medium">{{ $material->nombre }}</span>
                                                </a>
                                            </div>

                                        </div>
                                    </td>
                                    <td>{{ $material->categorias->nombre }}</td>
                                    @if ($roleUsuario->roles_id != 6)
                                        <td>{{ $material->users->name }}</td>
                                    @endif

                                    <td>{{ $material->detalles->cantidad ?? 'N/A' }}</td>
                                    <td>{{ $material->detalles->valor ?? 'N/A' }}</td>

                                    <td>{{ $material->detalles->monedas->nombre }}
                                        {{ $material->detalles->cantidadmoneda ?? 'N/A' }}</td>
                                    <td>{{ $material->fecha_vencimiento }}</td>
                                    <td class="text-wrap">{{ wordwrap($material->descripcion, 50, "\n", true) }}</td>
                                    <td><span
                                            class=" badge bg-label-{{ $material->estado == 1 ? 'primary' : 'danger' }} me-1">
                                            {{ $material->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>

                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @can('update', App\Models\Promociones::class)
                                                    <a class="dropdown-item"
                                                        href="{{ route('promociones.edit', ['promociones' => $material->id]) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('delete', App\Models\Promociones::class)
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="confirmAction({{ $material->id }})">
                                                        <i
                                                            class="bx bx-{{ $material->estado == 1 ? 'trash-alt' : 'toggle-left' }}"></i>
                                                        {{ $material->estado == 1 ? 'Eliminar' : 'Activar' }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                        <form id="deleteForm{{ $material->id }}"
                                            action="{{ route('promociones.destroy', ['promociones' => $material->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button id="submitBtn{{ $material->id }}" type="submit"></button>
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
                            <li class="page-item {{ $promociones->onFirstPage() ? 'disabled' : '' }}">
                                <button type="button" class="page-link" wire:click="previousPage"
                                    {{ $promociones->onFirstPage() ? 'disabled' : '' }}>
                                    Previo
                                </button>
                            </li>

                            <!-- Botones para cada página -->
                            @foreach ($promociones->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
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
</div>
<script>
    function confirmAction(categoriaId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Quieres cambiar el estado?',
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
