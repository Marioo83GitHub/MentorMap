<div class="flex bg-mmgray h-[100vh] gap-4 p-4">
    <div id="map" class="w-3/5 rounded-2xl grow"></div>
    <div class="flex flex-col w-2/5 p-4 rounded-2xl shadow-2xl bg-white grow overflow-auto relative z-10">


        <label id="latitudeLabel">Latitude: </label>
        <label id="longitudeLabel">Longitud: </label>

        <button wire:click="$dispatch('getLocation')"
            class="mt-8 size-max rounded-lg px-2 py-1 bg-mmblue text-white cursor-pointer hover:cursor-pointer">
            Obtener ubicación del dispositivo
        </button>
        <label class="font-semibold mt-2">(Obtener la ubicación tarda un poco)</label>

        <button wire:click="$dispatch('saveLocation')"
            class="mt-8 size-max rounded-lg px-2 py-1 bg-mmblue text-white cursor-pointer hover:cursor-pointer">
            Guardar
        </button>
        <label class="font-semibold my-2">(Siguiente página, About me, asignaturas y tarifas)</label>
        <label class="text-red-600 mt-2"> (Dev Notes):</label>
        <p>
            - Se le tiene que aclarar al mentor que esta ubicación será distorsionada para obtener una aproximada en
            lugar de almacenar la exacta, pero se le tiene que motivar igualmente a que ponga su exacta. <br><br>
            - Capaz estilizar un poco el marker, no es realmente necesario pero actualmente se ve un poco plano.
            Hay opciones comentadas en en "var myIcon" para ponerle una sombrita.
        </p>
    </div>
</div>

@assets
    {{-- Leaflet CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endassets

<script>
    // Initialize map
    const map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap contributors &copy; CARTO'
    }).addTo(map);

    // DOM elements
    const latLabel = document.getElementById('latitudeLabel');
    const lngLabel = document.getElementById('longitudeLabel');

    // Custom marker icon
    const customIcon = L.icon({
        iconUrl: '/Logos/marker.png',
        iconSize: [40, 50],
        iconAnchor: [20, 50],
        popupAnchor: [-3, -76]
    });

    // Global marker variable
    let marker = L.marker([51.5, -0.09], {
        icon: customIcon
    }).addTo(map);
    let currentLat = 51.5;
    let currentLng = -0.09;

    // Update coordinates display
    function updateCoordinates(lat, lng) {
        currentLat = lat;
        currentLng = lng;

        latLabel.textContent = `Latitude: ${lat}`;
        lngLabel.textContent = `Longitud: ${lng}`;
    }

    // Initialize display
    updateCoordinates(51.5, -0.09);

    map.on('click', (e) => {
        let {
            lat,
            lng
        } = e.latlng;

        // Normalizar longitud al rango -180 a 180
        lng = ((lng + 180) % 360 + 360) % 360 - 180;

        marker.setLatLng([lat, lng]).unbindPopup();
        updateCoordinates(lat, lng);
        console.log("Lat:", lat, "Lng:", lng);
    });
</script>

@script
    <script>
        // Livewire event handlers
        $wire.on('saveLocation', () => {
            $wire.dispatch('saveMentorLocation', {
                latitude: currentLat,
                longitude: currentLng
            });
        });

        $wire.on('getLocation', () => {
            if (!navigator.geolocation) {
                console.log("Geolocalización no soportada en este navegador.");
                return;
            }

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    map.setView([lat, lng], 14);
                    marker.setLatLng([lat, lng])
                        .bindPopup("Tu ubicación aproximada")
                        .openPopup();

                    updateCoordinates(lat, lng);
                    console.log("Lat:", lat, "Lng:", lng);
                },
                (error) => {
                    console.log("Error al obtener ubicación:", error);
                }
            );
        });
    </script>
@endscript
