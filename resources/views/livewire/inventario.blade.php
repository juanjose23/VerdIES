<div>
    <div class="row">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Título de la página -->
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión reciclaje /</span> Inventarios</h4>

            <!-- Tarjeta de filtros -->
            <div class="card">
                <div class="card-header">
                    <!-- Título de la tarjeta -->
                    <h5 class="card-title">Filtros</h5>

                    <!-- Contenedor de filtros -->
                    <div class="row pt-4">
                        <!-- Filtro por Estado -->
                        <div class="col-md-4 mb-3 mb-md-0">
                            <select id="ProductStatus" class="form-select text-capitalize" wire:model.live="estado">
                                <option value="">Estado</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>

                        <!-- Filtro por Categoría -->
                        <div class="col-md-4 mb-3 mb-md-0">
                            <select id="ProductCategory" class="form-select text-capitalize"
                                wire:model.live="categoria">
                                <option value="">Categoría</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtro por Stock -->
                        <div class="col-md-4">
                            <select id="ProductStock" class="form-select text-capitalize" wire:model.live="acopio">
                                <option value="">Centro de Acopio de origen</option>
                                @foreach ($acopios as $acopio)
                                    <option value="{{ $acopio->id }}">{{ $acopio->nombre }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card table-responsive text-nowrap">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap ms-4">
                        <!-- Campo de búsqueda con margen a la izquierda -->
                        <div class="me-5 ms-n4 pe-5 mb-3 mb-md-0 ms-3">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control" wire:model.live.debounce.250ms="buscar"
                                        placeholder="Buscar Producto" aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                        </div>

                        <!-- Controles de acción y longitud de tabla -->
                        <div class="d-flex justify-content-start justify-content-md-end align-items-baseline gap-3">
                            <div
                                class="dt-action-buttons d-flex flex-column align-items-start align-items-sm-center justify-content-sm-center pt-0 gap-sm-4 gap-sm-0 flex-sm-row">
                                <!-- Selección de longitud de tabla -->
                                <div class="dataTables_length mx-n2" id="DataTables_Table_0_length">
                                    <label>
                                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="form-select" wire:model.live="perPage">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                            <option value="100">100</option>
                                            <option value="all">Todos</option>
                                        </select>
                                    </label>
                                </div>

                                <!-- Botones de exportar y agregar -->
                                <div class="dt-buttons btn-group flex-wrap d-flex mb-3 mb-sm-0">
                                    <button id="btnGroupDrop1" type="button"
                                        class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"> <span><i
                                                class="bx bx-export me-2 bx-xs"></i></span>Exportar</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-file me-1"></i>Exportar a CSV</a>
                                        <a class="dropdown-item" href="javascript:void(0);"> <i
                                                class="bx bx-spreadsheet me-1"></i>Exportar a Excel</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Tabla de entregas -->
                <table class="card-body table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoría</th>
                            <th>Material</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventarios as $entrega)
                            <tr class="odd">
                                <td>{{ $loop->index + 1 }}</td>

                                <td>{{ $entrega->categoria_nombre }}</td>
                                <td>{{ $entrega->material_nombre }}</td>
                                <td>{{ $entrega->cantidad_total }}</td>
                                <td>
                                    <span
                                        class="badge bg-label-{{ $entrega->estado == 1 ? 'success' : 'danger' }} me-1">
                                        {{ $entrega->estado == 1 ? 'Activo' : 'Inactivo' }}
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
                                                <a class="dropdown-item" href="">
                                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">

                            @if ($perPage != 'all')
                                <!-- Botón para la página anterior -->
                                <li class="page-item {{ $inventarios->onFirstPage() ? 'disabled' : '' }}">
                                    <button type="button" class="page-link" wire:click="previousPage"
                                        {{ $inventarios->onFirstPage() ? 'disabled' : '' }}>
                                        Previo
                                    </button>
                                </li>

                                <!-- Botones para cada página -->
                                @foreach ($inventarios->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled">
                                            <span class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif

                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <li
                                                class="page-item {{ $page == $inventarios->currentPage() ? 'active' : '' }}">
                                                <button type="button" class="page-link"
                                                    wire:click="gotoPage({{ $page }})">
                                                    {{ $page }}
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach

                                <!-- Botón para la página siguiente -->
                                <li class="page-item {{ $inventarios->hasMorePages() ? '' : 'disabled' }}">
                                    <button type="button" class="page-link" wire:click="nextPage"
                                        {{ $inventarios->hasMorePages() ? '' : 'disabled' }}>
                                        Siguiente
                                    </button>
                                </li>
                            @endif

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
