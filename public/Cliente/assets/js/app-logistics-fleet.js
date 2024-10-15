{
    mapboxgl.accessToken = "pk.eyJ1IjoiY3liZXJtZWRpbmEiLCJhIjoiY20yOXdzdzVlMGI5dDJrbjY3cWN3cXFtbSJ9.vAWzjPgTCxF00nO8SX80xw";
    let s = {
        type: "FeatureCollection",
        features: [{
            type: "Feature",
            properties: {
                iconSize: [20, 42],
                message: "1",
                name: "Lugar 1",
                info: "<p>Descripción del punto 1</p>",
                image: "ruta/de/imagen1.jpg"
            },
            geometry: {
                type: "Point",
                coordinates: [-86.2698, 12.1293]
            }
        }, {
            type: "Feature",
            properties: {
                iconSize: [20, 42],
                message: "2",
                name: "Lugar 2",
                info: "<p>Descripción del punto 2</p>",
                image: "ruta/de/imagen2.jpg"
            },
            geometry: {
                type: "Point",
                coordinates: [-74.03, 40.75699842]
            }
        }]
    };
    
    let a = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v12",
        center: [-73.999024, 40.75249842],
        zoom: 12.25
    });
    
    for (let o of s.features) {
        var e = document.createElement("div"),
            i = o.properties.iconSize[0],
            l = o.properties.iconSize[1];
    
        // Crear el ícono del marker
        e.className = "marker";
        e.insertAdjacentHTML("afterbegin", '<img src="ruta/de/imagen/icono.png" alt="Icon" width="20" class="rounded-3" id="carFleet-' + o.properties.message + '">');
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
                zoom: 16
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
    })};