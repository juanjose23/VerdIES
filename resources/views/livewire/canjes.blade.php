<div>
    <div class="row">

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Canjes /</span> Canjes</h4>

            <div class="col-xl-12">

                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons bx bx-home me-1"></i><span class="d-none d-sm-block">
                                    Canjes por aceptar</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-profile"
                                aria-controls="navs-pills-justified-profile" aria-selected="false">
                                <i class="tf-icons bx bx-user me-1"></i><span class="d-none d-sm-block">
                                    Historial</span>
                            </button>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
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
                                                        <th scope="col" class="px-4 py-3">Acciones</th>
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
                                                                    {{ $rol->estado == 1 ? 'Activo' : 'Aceptar' }}
                                                                </span>
                                                            </td>
                                                            <td>

                                                                <div class="d-flex mb-1 align-items-center">
                                                                    @can('update', App\Models\Promociones::class)
                                                                        <a href="#" class="btn btn-info d-block"
                                                                            role="button"
                                                                            onclick="confirmEdit(event, {{ $rol->id }})">
                                                                            <i class="fas fa-toggle-on"></i>
                                                                        </a>

                                                                        <form id="editForm{{ $rol->id }}"
                                                                            action="{{ route('canje.update', ['canje' => $rol->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <!-- Aquí puedes incluir cualquier campo adicional que necesites enviar con el formulario -->
                                                                        </form>

                                                                        <script>
                                                                            function confirmEdit(event, id) {
                                                                                event.preventDefault(); // Evita que el navegador siga el enlace predeterminado
                                                                                console.log('confirmEdit llamado con ID:',
                                                                                    id); // Añadimos un mensaje de consola para verificar si la función se llama correctamente

                                                                                Swal.fire({
                                                                                    title: "¿Estás seguro?",
                                                                                    text: "¿Quieres editar este registro?",
                                                                                    icon: "warning",
                                                                                    showCancelButton: true,
                                                                                    confirmButtonText: "Sí, aceptar",
                                                                                    cancelButtonText: "Cancelar",
                                                                                    dangerMode: true,
                                                                                }).then((result) => {
                                                                                    if (result.isConfirmed) {
                                                                                        // Envía el formulario oculto
                                                                                        document.getElementById('editForm' + id).submit();
                                                                                    }
                                                                                });
                                                                            }
                                                                        </script>
                                                                    @endcan
                                                                    @can('delete', App\Models\Promociones::class)
                                                                        <div class="m-1">
                                                                            <!-- Botón para activar/desactivar -->
                                                                            <button type="button"
                                                                                class="btn btn-{{ $rol->estado == 0 ? 'danger' : 'success' }} d-block"
                                                                                role="button"
                                                                                onclick="confirmAction({{ $rol->id }})">
                                                                                <i
                                                                                    class="fas fa-{{ $rol->estado == 1 ? 'trash-alt' : 'toggle-on' }}"></i>

                                                                            </button>
                                                                        </div>
                                                                    @endcan
                                                                </div>

                                                                <form id="deleteForm{{ $rol->id }}"
                                                                    action="{{ route('canje.destroy', ['canje' => $rol->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <!-- Este botón no es visible, pero se utilizará para activar el SweetAlert -->
                                                                    <button id="submitBtn{{ $rol->id }}"
                                                                        type="submit" style="display: none;"></button>
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
                        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                            <livewire:listatranciones />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmAction(categoriaId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Quieres cambiar el estado de esta carrera?',
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
