<div>
    <div>
        <div class="row">

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Usuarios /</span> Roles</h4>

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
                            <caption class="ms-4">
                               Lista de Roles
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">#</span>
                                    </th>
                
                                    <th scope="col" class="px-4 py-3">Rol</th>
                
                                    <th scope="col" class="px-4 py-3">Descripción</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
            
            
                                    <td>{{ $rol->nombre }}</td>
            
                                    <td class="text-wrap">{{ wordwrap($rol->descripcion, 50, "\n", true) }}</td>
                                    <td><span class="badge rounded-pill {{ $rol->estado == 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $rol->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>
            
                                        <div class="d-flex mb-1 align-items-center">
                                            @can('update', App\Models\permisos::class)
                                                <a href="{{ route('roles.edit', ['roles' => $rol->id]) }}" class="btn btn-info d-block"
                                                    role="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete', App\Models\permisos::class)
                                                <div class="m-1">
                                                    <!-- Botón para activar/desactivar -->
                                                    <button type="button"
                                                        class="btn btn-{{ $rol->estado == 1 ? 'danger' : 'success' }} d-block"
                                                        role="button" onclick="confirmAction({{ $rol->id }})">
                                                        <i class="fas fa-{{ $rol->estado == 1 ? 'trash-alt' : 'toggle-on' }}"></i>
            
                                                    </button>
                                                </div>
                                            @endcan
                                        </div>
            
                                        <form id="deleteForm{{ $rol->id }}"
                                            action="{{ route('roles.destroy', ['roles' => $rol->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
            
                                            <!-- Este botón no es visible, pero se utilizará para activar el SweetAlert -->
                                            <button id="submitBtn{{ $rol->id }}" type="submit"
                                                style="display: none;"></button>
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
                                <li class="page-item {{ $roles->onFirstPage() ? 'disabled' : '' }}">
                                    <button type="button" class="page-link" wire:click="previousPage" {{ $roles->onFirstPage() ? 'disabled' : '' }}>
                                        Previo
                                    </button>
                                </li>
                    
                                <!-- Botones para cada página -->
                                @foreach ($roles->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                    @endif
                    
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <li class="page-item {{ $page == $roles->currentPage() ? 'active' : '' }}">
                                                <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">
                                                    {{ $page }}
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach
                    
                                <!-- Botón para la página siguiente -->
                                <li class="page-item {{ $roles->hasMorePages() ? '' : 'disabled' }}">
                                    <button type="button" class="page-link" wire:click="nextPage" {{ $roles->hasMorePages() ? '' : 'disabled' }}>
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
<script>
    function confirmAction(roleId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Quieres cambiar el estado de este roles?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, cambiar estado'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('deleteForm' + roleId);

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
