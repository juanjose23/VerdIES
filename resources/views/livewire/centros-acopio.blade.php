<div class="accordion py-2 px-1" id="fleet" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar">
    <!-- Fleet 1 -->
    @foreach ($acopios as $acopio)
    <div class="accordion-item border-0 active mb-0 shadow-none" id="fl-{{ $loop->index + 1 }}">
        <div class="accordion-header" id="fleetOne">
            <div role="button" class="accordion-button shadow-none align-items-center" data-bs-toggle="collapse" data-bs-target="#fleet1" aria-expanded="true" aria-controls="fleet1">
                <div class="d-flex align-items-center">
                    <div class="avatar-wrapper">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40"><i class="bx bx-car bx-lg"></i></span>
                        </div>
                    </div>
                    <span class="d-flex flex-column gap-1">
                        <span class="text-heading">{{ $acopio->nombre }}</span>
                        <span class="text-body">{{ $acopio->descripcion }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        mapboxgl.accessToken = "pk.eyJ1IjoiY3liZXJtZWRpbmEiLCJhIjoiY20yOXdzdzVlMGI5dDJrbjY3cWN3cXFtbSJ9.vAWzjPgTCxF00nO8SX80xw";
        let s = {
            type: "FeatureCollection",
            features: [
            // @foreach ($acopios as $acopio)
            // <!--  --> // Comentario para evitar errores de sintaxis
            {
                type: "Feature",
                properties: {
                    iconSize: [20, 42],
                    message: "{{ $loop->iteration }}", // Usamos $loop->iteration para el número secuencial
                    name: "{{ $acopio->nombre }}",
                    info: "<p>{{ $acopio->descripcion }}</p>",
                    image: ""
                },
                geometry: {
                    type: "Point",
                    coordinates: [{{ $acopio->longitude }}, {{ $acopio->latitude }}] // Acceso directo a las coordenadas
                }
            }, // @if (!$loop->last),@endif  // Evitar la coma después del último elemento
            // @endforeach
        ]
        };

        let a = new mapboxgl.Map({
            container: "map",
            style: "mapbox://styles/mapbox/streets-v12",
            center: [-86.2698534, 12.13181532],
            zoom: 17
        });

        for (let o of s.features) {
            var e = document.createElement("div"),
                i = o.properties.iconSize[0],
                l = o.properties.iconSize[1];

            // Crear el ícono del marker
            e.className = "marker";
            e.insertAdjacentHTML("afterbegin", '<img src="{{ asset('Cliente/assets/img/illustrations/centros_acopios.png') }}" alt="Icon" width="20" class="rounded-3" id="carFleet-' + o.properties.message + '">');
            e.style.width = i + "px";
            e.style.height = l + "px";
            e.style.cursor = "pointer";

            // Agregar marker al mapa
            let marker = new mapboxgl.Marker(e)
                .setLngLat(o.geometry.coordinates)
                .addTo(a);

            // Referencia al ícono del mapa
            let t = document.getElementById("carFleet-" + o.properties.message);

            // Asignar evento click para activar el flyTo y modal
            t.addEventListener("click", function() {
                // Realizar el flyTo al hacer clic en el marcador
                a.flyTo({
                    center: o.geometry.coordinates,
                    zoom: 18
                });

                // Agregar/remover la clase marker-focus para destacar el marcador
                var focusedMarker = document.querySelector(".marker-focus");
                if (focusedMarker) {
                    focusedMarker.classList.remove("marker-focus");
                }
                t.classList.add("marker-focus");

                // Actualizar el título y la información del modal
                document.getElementById("mapModalLabel").textContent = o.properties.name;
                document.getElementById("modal-description").innerHTML = o.properties.info;
                document.getElementById("modal-image").src = o.properties.image;

                // Crear el enlace dinámico para Google Maps con las coordenadas
                let googleMapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${o.geometry.coordinates[1]},${o.geometry.coordinates[0]}`;
                document.getElementById("maps-link").href = googleMapsUrl;

                // Abrir el modal de Bootstrap
                var myModal = new bootstrap.Modal(document.getElementById('mapModal'));
                myModal.show();
            });

            // Lógica original del flyTo desde el sidebar
            let r = document.getElementById("fl-" + o.properties.message);
            r.addEventListener("click", function() {
                var e = document.querySelector(".marker-focus");
                if (Helpers._hasClass("active", r)) {
                    a.flyTo({
                        center: s.features[o.properties.message - 1].geometry.coordinates,
                        zoom: 16
                    });
                    e && Helpers._removeClass("marker-focus", e);
                    Helpers._addClass("marker-focus", t);
                } else {
                    Helpers._removeClass("marker-focus", t);
                }
            });
        }

        // Mantener la referencia inicial
        var initialMarker = document.getElementById("carFleet-1");
        if (initialMarker) {
            initialMarker.classList.add("marker-focus");
        }

        // Ocultar el control de Mapbox
        document.querySelector(".mapboxgl-control-container").classList.add("d-none");

        // Scrollbar en el sidebar
        $(".logistics-fleet-sidebar-body").length && new PerfectScrollbar(".logistics-fleet-sidebar-body", {
            wheelPropagation: !1,
            suppressScrollX: !0
        });
    });
</script>