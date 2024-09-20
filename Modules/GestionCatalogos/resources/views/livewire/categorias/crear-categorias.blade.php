<div>
    <div class="btn-group me-2 mb-2 mb-md-0">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight">
            <i class="fas fa-plus me-1"></i> Registrar categoría
        </button>
    </div>

    <div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Crear Nueva Categoría</h5>
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
                    <input type="text" class="form-control" id="nombre" wire:model="nombre">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" wire:model="descripcion"></textarea>
                    @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" wire:model="estado">
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
        var offcanvasElement = document.getElementById('offcanvasRight');

        offcanvasElement.addEventListener('hidden.bs.offcanvas', function () {
            @this.call('resetForm');
        });

        window.addEventListener('close-offcanvas', event => {
            var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            offcanvas.hide();
        });
    });
</script>
