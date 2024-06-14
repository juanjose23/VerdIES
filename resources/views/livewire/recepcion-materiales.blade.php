<div>
    <section id="team" class="team">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar..."
                        wire:model.live.debounce.300ms="search">
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    @if (!is_null($cartItems) && !$cartItems->isEmpty())
                        <a href="{{ route('cart.index') }}" class="btn btn-success">
                            <i class="bi bi-currency-dollar"></i> Socitar puntos
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($materiales as $material)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic">
                                @if ($material->imagenes)
                                    <img src="{{ $material->imagenes->url }}" class="card-img-top img-fluid"
                                        alt="{{ $material->nombre }}" width="50">
                                @else
                                    <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1716879981/Verdies/vkifvb82kknzphziyuws.jpg"
                                        class="card-img-top img-fluid" alt="{{ $material->nombre }}">
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="member-info">
                                    <h4>{{ $material->nombre }}</h4>
                                    <span></span>
                                    <p>{{ $material->descripcion }}</p>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $material->id }}">
                                        <input type="hidden" name="name" value="{{ $material->nombre }}">
                                        @if ($material->imagenes)
                                        <input type="hidden" name="image_url" value="{{ $material->imagenes->url }}">
                                        @else
                                        <input type="hidden" name="image_url" value="https://res.cloudinary.com/dxtlbsa62/image/upload/v1716879981/Verdies/vkifvb82kknzphziyuws.jpg">
                                        @endif
                                        <input type="hidden" name="acopio" value="{{$id}}">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="quantity">Cantidad recolectada:</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                value="1" min="1">

                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success btn-sm" type="submit">
                                                <i class="bi bi-recycle"></i> Agregar al Carrito
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
</div>
