<div>
    <div class="row">

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Reciclaje /</span> Recicladoras</h4>

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
                            @can('create', App\Models\Acopios::class)
                                <div class="btn-group me-2 mb-2 mb-md-0">
                                    <a href="{{ route('recicladoras.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i> Registrar Recicladora
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
                            Lista de recicladoras
                        </caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Recicladoras</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Contacto</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recicladoras as $reciclar)
                                <tr class="odd">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $reciclar->nombre }}</td>
                                    <td>{{ $reciclar->telefono }}</td>
                                    <td>{{ $reciclar->email }}</td>

                                    <td class="text-wrap">{{ wordwrap($reciclar->direccion, 50, "\n", true) }}</td>
                                    <td>
                                        <strong>Nombre de Contacto:</strong> {{ $reciclar->nombre_contacto }}<br>
                                        <strong>Teléfono de Contacto:</strong> {{ $reciclar->telefono_contacto }}<br>
                                        <strong>Email de Contacto:</strong> <a href="mailto:{{ $reciclar->email_contacto }}">{{ $reciclar->email_contacto }}</a>
                                    </td>
                                    
                                    <td><span
                                            class=" badge bg-label-{{ $reciclar->estado == 1 ? 'primary' : 'danger' }} me-1">
                                            {{ $reciclar->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>

                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @can('update', App\Models\Acopios::class)
                                                    <a class="dropdown-item"
                                                        href="{{ route('recicladoras.edit', ['recicladoras' => $reciclar->id]) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('delete', App\Models\Acopios::class)
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="confirmAction({{ $reciclar->id }})">
                                                        <i
                                                            class="fas fa-{{ $reciclar->estado == 1 ? 'trash-alt' : 'toggle-on' }}"></i>
                                                        {{ $reciclar->estado == 1 ? 'Eliminar' : 'Activar' }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                        <form id="deleteForm{{ $reciclar->id }}"
                                            action="{{ route('recicladoras.destroy', ['recicladoras' => $reciclar->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button id="submitBtn{{ $reciclar->id }}" type="submit"></button>
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
                            <li class="page-item {{ $recicladoras->onFirstPage() ? 'disabled' : '' }}">
                                <button type="button" class="page-link" wire:click="previousPage"
                                    {{ $recicladoras->onFirstPage() ? 'disabled' : '' }}>
                                    Previo
                                </button>
                            </li>

                            <!-- Botones para cada página -->
                            @foreach ($recicladoras->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                    </li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <li
                                            class="page-item {{ $page == $recicladoras->currentPage() ? 'active' : '' }}">
                                            <button type="button" class="page-link"
                                                wire:click="gotoPage({{ $page }})">
                                                {{ $page }}
                                            </button>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach

                            <!-- Botón para la página siguiente -->
                            <li class="page-item {{ $recicladoras->hasMorePages() ? '' : 'disabled' }}">
                                <button type="button" class="page-link" wire:click="nextPage"
                                    {{ $recicladoras->hasMorePages() ? '' : 'disabled' }}>
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
            text: '¿Quieres cambiar el estado ?',
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
