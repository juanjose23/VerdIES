<div>
    <section id="team" class="team">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar..."
                        wire:model.live.debounce.300ms="search">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($acopios as $acopio)
                            <div class="col-md-4 d-flex align-items-stretch mb-4">
                                <div class="card member" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="pic">
                                        <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1718175027/Verdies/Page/zv8mgkico6uliz7welps.svg"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="card-body">
                                        <div class="member-info">
                                            <h4>{{ $acopio->nombre }}</h4>
                                            <span></span>
                                            <p>{{ $acopio->descripcion }}</p>

                                            <a style="background-color: #2D6244;" href="{{ route('recepcion-materia', ['centroAcopio' => $acopio->id]) }}" class="btn btn-small text-white">
                                                Reportar Aquí
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
