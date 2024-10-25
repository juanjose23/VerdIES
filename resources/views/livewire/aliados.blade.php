<div>
    
    <div class="row gy-6 mb-6">
    @foreach ($users as $aliado)
        <div class="col-lg-6">
            <div class="card p-2 h-100 shadow-none border">
                <div class="card-body d-flex justify-content-between flex-wrap-reverse">
                    <div class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                        <div class="card-title">
                            <h5 class="text-primary mb-2">{{ wordwrap($aliado->name , 15, "\n", true) }}</h5>
                            <p class="text-body w-sm-80 app-academy-xl-100">
                                <!-- Agrega aquí más contenido si es necesario -->
                            </p>
                        </div>
                        <div class="mb-0">
                            <button class="btn btn-sm btn-primary" onclick="window.location.href='{{ route('cliente.show', $aliado->id) }}'">Ver promociones</button>
                        </div>
                    </div>
                    <div class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-4 mb-sm-0">
                        <img class="img-fluid scaleX-n1-rtl" src="https://res.cloudinary.com/drmoodyde/image/upload/v1728884274/logo2_voerlq.webp" alt="boy illustration" />
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
   
</div>