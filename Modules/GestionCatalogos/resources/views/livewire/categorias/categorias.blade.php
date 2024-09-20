<div>
    <div class="app-ecommerce-category">
        <!-- Category List Table -->
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gestión Catalogos /</span> Categorías</h4>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Campo de búsqueda -->
                    <div class="input-group mb-3" style="max-width: 300px;">
                        <input type="text" wire:model.live.debounce.300ms="buscar"
                            class="form-control form-control rounded-start" placeholder="Buscar...">
                    </div>
                    <div class="d-flex justify-content-end flex-wrap mt-3 mt-md-0">
                        <!-- Botón para crear una categoría -->
                        @can('create', Modules\GestionCatalogos\Models\Categoria::class)
                            <livewire:gestioncatalogos::categorias.crear-categorias />
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
                        Lista de Categorias
                    </caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoria</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Categorias as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>


                                <td>{{ $item->nombre }}</td>

                                <td class="text-wrap">{{ wordwrap($item->descripcion, 50, "\n", true) }}</td>
                                <td><span
                                        class=" badge bg-label-{{ $item->estado == 1 ? 'primary' : 'danger' }} me-1">
                                        {{ $item->estado == 1 ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <!-- Botón para editar la categoría -->
                                            <a class="dropdown-item" wire:click="edit({{ $item->id }})"
                                                type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasRightedit" aria-controls="offcanvasRightedit">
                                                <i class="bx bx-edit-alt me-1"></i> Editar
                                            </a>
                                            <a class="dropdown-item"  wire:click="toggleStatus({{$item->id}})">
                                                <i
                                                    class="bx bx-{{ $item->estado == 1 ? 'trash-alt' : 'revision' }}"></i>
                                                {{ $item->estado == 1 ? 'Eliminar' : 'Activar' }}
                                            </a>
                                        </div>

                                    </div>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Botón para la página anterior -->
                    <li class="page-item {{ $Categorias->onFirstPage() ? 'disabled' : '' }}">
                        <button type="button" class="page-link" wire:click="previousPage"
                            {{ $Categorias->onFirstPage() ? 'disabled' : '' }}>
                            Previo
                        </button>
                    </li>

                    <!-- Botones para cada página -->
                    @foreach ($Categorias->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <li class="page-item {{ $page == $Categorias->currentPage() ? 'active' : '' }}">
                                    <button type="button" class="page-link"
                                        wire:click="gotoPage({{ $page }})">
                                        {{ $page }}
                                    </button>
                                </li>
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Botón para la página siguiente -->
                    <li class="page-item {{ $Categorias->hasMorePages() ? '' : 'disabled' }}">
                        <button type="button" class="page-link" wire:click="nextPage"
                            {{ $Categorias->hasMorePages() ? '' : 'disabled' }}>
                            Siguiente
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightedit"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Editar Categoría {{ $nombre }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit.prevent="submitForm">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" wire:model="nombre" class="form-control">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
                    @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" wire:model="estado" class="form-select">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                    @error('estado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var offcanvasElement = document.getElementById('offcanvasRightedit');

        offcanvasElement.addEventListener('hidden.bs.offcanvas', function () {
            @this.call('resetForm');
        });

        window.addEventListener('close-offcanvas', event => {
            var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            offcanvas.hide();
        });
    });
</script>