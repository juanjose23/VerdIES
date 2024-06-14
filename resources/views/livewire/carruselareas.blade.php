<div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($areas as $area)
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center text-center" data-aos="zoom-in" data-aos-delay="100">
                    @if ($area->imagenes)
                        <img src="{{ $area->imagenes->url }}" class="img-fluid" alt="{{ $area->nombre }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ $area->nombre }}" class="img-fluid" alt="{{ $area->nombre }}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    
</div>
