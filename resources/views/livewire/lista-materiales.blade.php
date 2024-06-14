<div>
    <div class="row" >
        <div class="col-lg-12 d-flex justify-content-center mb-4">
            <!-- Campo de búsqueda -->
            <input type="text" wire:model.debounce.300ms="buscar" class="form-control" placeholder="Buscar materiales...">
        </div>
        <div class="col-lg-12 d-flex justify-content-center">
            <!-- Lista de filtros -->
            <ul id="portfolio-flters">
                <li wire:click="resetFilters" class="{{ $this->activeFilter === 'all' ? 'filter-active' : '' }}">All</li>

                @foreach ($categorias as $categoria)
                    <li wire:click="filterByCategory('{{ $categoria->nombre }}')"
                        class="{{ $activeFilter === $categoria->nombre ? 'filter-active' : '' }}">{{ $categoria->nombre }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <div class="row portfolio-container">
        <!-- Lista de materiales filtrados -->
        @foreach ($materiales as $material)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ strtolower($material->categorias->nombre) }}">
                <div class="portfolio-wrap">
                    @if ($material->imagenes)
                    <img src="{{ $material->imagenes->url }}" class="img-fluid" alt="{{ $material->nombre }}">
                    @else
                    <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1716879981/Verdies/vkifvb82kknzphziyuws.jpg" class="img-fluid" alt="{{ $material->nombre }}">
                    @endif
                    <div class="portfolio-info">
                        <h4>{{ $material->nombre }}</h4>
                        <p>{{ $material->categorias->nombre }}</p>
                        <div class="portfolio-links">
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>

<script>
    // Script para mostrar gradualmente la información del material al cargar la imagen
    document.addEventListener('DOMContentLoaded', function() {
        const img = document.querySelector('.portfolio-wrap img');
        const info = document.querySelector('.portfolio-wrap .portfolio-info');
        const overlay = document.querySelector('.portfolio-wrap .overlay');

        img.onload = function() {
            img.style.opacity = '1';
            info.style.opacity = '1';
            overlay.style.opacity = '0';
        }
    });
</script>