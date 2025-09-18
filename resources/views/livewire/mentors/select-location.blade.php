<!-- Main Container - Responsive Layout -->
<div class="flex flex-col lg:flex-row min-h-screen gap-4 p-4 relative z-10 transition-colors duration-300">

    <!-- Map Container -->
    <!-- Mobile Header -->
    <div
        class="lg:hidden sm:block bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-mmgreen dark:text-mmgreen" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 616 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Selecciona tu Ubicación</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Toca el mapa para posicionarte</p>
            </div>
        </div>
    </div>
    <div class="relative order-1 lg:order-1 lg:w-3/5">
        <div id="map"
            class="w-full h-80 lg:h-full min-h-[320px] rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
        </div>
    </div>

    <!-- Controls Panel -->
    <div
        class="order-2 lg:order-2 lg:w-2/5 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 transition-colors duration-300">

        <!-- Header -->
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">¿Dónde te encuentras?</h2>
            <p class="text-gray-600 dark:text-gray-300 text-sm">Esta información nos ayudará a conectarte con
                estudiantes cercanos</p>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-6">

            <!-- Coordinates Display -->
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 space-y-2 transition-colors duration-300" hidden>
                <h3 class="font-semibold text-gray-700 dark:text-gray-200 text-sm uppercase tracking-wide">Coordenadas
                    Seleccionadas</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg p-3 border border-gray-200 dark:border-gray-600 transition-colors duration-300">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Latitud</div>
                        <div id="latitudeLabel" class="font-mono text-sm font-medium text-gray-800 dark:text-gray-100">
                            --</div>
                    </div>
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg p-3 border border-gray-200 dark:border-gray-600 transition-colors duration-300">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Longitud</div>
                        <div id="longitudeLabel" class="font-mono text-sm font-medium text-gray-800 dark:text-gray-100">
                            --</div>
                    </div>
                </div>
            </div>

            <!-- Privacy Notice -->
            <div
                class="bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-700 rounded-xl p-4 transition-colors duration-300">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-blue-800 dark:text-blue-300 text-sm">Privacidad de Ubicación</h4>
                        <p class="text-blue-700 dark:text-blue-200 text-xs mt-1">Tu ubicación exacta será aproximada por
                            seguridad. Solo se mostrará un área general a los estudiantes.</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <!-- Get Location Button -->
                <button wire:click="$dispatch('getLocation')"
                    class="w-full flex items-center justify-center gap-3 bg-mmblue hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Obtener Mi Ubicación Actual
                </button>
                <p class="text-xs text-gray-500 dark:text-gray-400 text-center">La detección de ubicación puede tardar
                    unos segundos</p>

                <!-- Save Button -->
                <button wire:click="$dispatch('saveLocation')"
                    class="w-full flex items-center justify-center gap-3 bg-mmgreen hover:bg-[#33ab35] dark:bg-mmgreen dark:hover:bg-[#33ab35] text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Guardar
                </button>
                <p class="text-xs text-gray-500 dark:text-gray-400 text-center">Siguiente: Seleccionar Materias</p>
            </div>


        </div>
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
    let init_lat = 13.304;
    let init_lng = -87.185;
    // const map = L.map('map').setView([init_lat05, init_lng], 13);
    const map = L.map('map').setView([init_lat, init_lng], 13);

    // Set initial tile layer based on current theme
    const isDarkMode = document.documentElement.classList.contains('dark');
    if (isDarkMode) {
        L.tileLayer('https://basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap contributors &copy; CARTO'
        }).addTo(map);
    } else {
        L.tileLayer('https://basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap contributors &copy; CARTO'
        }).addTo(map);
    }

    // DOM elements
    const latLabel = document.getElementById('latitudeLabel');
    const lngLabel = document.getElementById('longitudeLabel');

    // Custom marker icon with better styling
    const customIcon = L.icon({
        iconUrl: '/Logos/marker.png',
        iconSize: [32, 40],
        iconAnchor: [16, 40],
        popupAnchor: [0, -40],
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
        shadowSize: [41, 41],
        shadowAnchor: [13, 41]
    });

    // Global marker variable
    let marker = L.marker([init_lat, init_lng], {
        icon: customIcon
    }).addTo(map);
    let currentLat = init_lat;
    let currentLng = init_lng;

    // Update coordinates display
    function updateCoordinates(lat, lng) {
        currentLat = lat;
        currentLng = lng;

        latLabel.textContent = `${lat.toFixed(6)}`;
        lngLabel.textContent = `${lng.toFixed(6)}`;
    }

    // Initialize display
    updateCoordinates(init_lat, init_lng);

    // Helper function to create theme-aware popups
    function createPopup(icon, title, subtitle, titleColor = 'text-blue-600 dark:text-blue-400') {
        return `
            <div class="text-center p-2">
                <div class="font-semibold ${titleColor} mb-1">${icon} ${title}</div>
                <div class="text-sm text-gray-600 dark:text-gray-300">${subtitle}</div>
            </div>
        `;
    }

    map.on('click', (e) => {
        let {
            lat,
            lng
        } = e.latlng;

        // Normalizar longitud al rango -180 a 180
        lng = ((lng + 180) % 360 + 360) % 360 - 180;

        marker.setLatLng([lat, lng]);

        updateCoordinates(lat, lng);
        console.log("Nueva ubicación seleccionada - Lat:", lat, "Lng:", lng);
    });
</script>

@script
    <script>
        // Livewire event handlers

        $wire.on('saveLocation', () => {
            // Add visual feedback
            const saveBtn = document.querySelector('button[wire\\:click="\\$dispatch(\'saveLocation\')"]');
            const originalText = saveBtn.innerHTML;

            saveBtn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Guardando...
            `;
            saveBtn.disabled = true;

            $wire.dispatch('saveMentorLocation', {
                latitude: currentLat,
                longitude: currentLng
            });

            // Reset button after a delay (you might want to handle this from the backend)
            setTimeout(() => {
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
            }, 3000);
        });

        $wire.on('getLocation', () => {
            const locationBtn = document.querySelector('button[wire\\:click="\\$dispatch(\'getLocation\')"]');
            const originalText = locationBtn.innerHTML;

            if (!navigator.geolocation) {
                alert("Geolocalización no soportada en este navegador.");
                return;
            }

            // Show loading state
            locationBtn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Obteniendo ubicación...
            `;
            locationBtn.disabled = true;

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    map.setView([lat, lng], 15);
                    marker.setLatLng([lat, lng])
                        .bindPopup(createPopup('📍', 'Tu Ubicación', 'Ubicación detectada exitosamente',
                            'text-mmgreen dark:text-green-400'))
                        .openPopup();

                    updateCoordinates(lat, lng);

                    // Reset button
                    locationBtn.innerHTML = originalText;
                    locationBtn.disabled = false;

                    console.log("Ubicación obtenida - Lat:", lat, "Lng:", lng);
                },
                (error) => {
                    console.error("Error al obtener ubicación:", error);

                    let errorMessage = "Error al obtener la ubicación.";
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage =
                                "Permiso de ubicación denegado. Por favor, permite el acceso a tu ubicación.";
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = "Información de ubicación no disponible.";
                            break;
                        case error.TIMEOUT:
                            errorMessage = "Tiempo de espera agotado al obtener ubicación.";
                            break;
                    }

                    alert(errorMessage);

                    // Reset button
                    locationBtn.innerHTML = originalText;
                    locationBtn.disabled = false;
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 60000
                }
            );
        });
    </script>
@endscript
