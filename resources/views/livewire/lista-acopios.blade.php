<div>
    <div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="accordion" id="accordionExample">
                @foreach ($acopios as $acopio)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-transparent" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $acopio->id }}"
                                aria-expanded="true" aria-controls="collapse{{ $acopio->id }}">
                                <i class="fas fa-plus"></i>
                                {{ $acopio->nombre }}
                            </button>
                        </h2>
                        <div id="collapse{{ $acopio->id }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $acopio->id }}">
                            <div class="accordion-body">
                                <strong>{{ $acopio->nombre }}</strong><br>
                                {{ $acopio->descripcion }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <div id="mapa" class="border" style="height: 500px;"></div>
        </div>
    </div>
</div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var accordionItems = document.querySelectorAll('.accordion-item');

            accordionItems.forEach(function(item) {
                var button = item.querySelector('.accordion-button');

                button.addEventListener('click', function() {
                    var accordionCollapse = item.querySelector('.accordion-collapse');

                    // Toggle class to show/hide accordion item
                    accordionCollapse.classList.toggle('show');

                    // Toggle icon based on accordion state
                    var icon = button.querySelector('i');
                    if (accordionCollapse.classList.contains('show')) {
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    } else {
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');
                    }
                });
            });

            var mapa = L.map('mapa').setView([12.129253677918697, -86.27030407009038],
                16); // Ajusta el nivel de zoom inicial a 12

            // Agrega una capa de mapa base
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mapa);

            @foreach ($acopios as $acopio)
            console.log("$acopio")
              
                    var marker = L.marker([{{ $acopio->latitude }}, {{ $acopio->longitude }}]).addTo(mapa);
                    console.log({{ $acopio->latitude }});
                    console.log({{ $acopio->longitude }});
                    console.log("{{ $acopio->nombre}}");
                    marker.bindPopup("{{ $acopio->nombre }}");
              
            @endforeach
            mapa.fitBounds(bounds, { padding: [50, 50] });

        });
        // Script para inicializar el mapa
    </script>
</div>
