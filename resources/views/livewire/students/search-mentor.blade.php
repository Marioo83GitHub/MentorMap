<div class="flex h-screen p-4 gap-4 relative z-10">
    {{-- Map div --}}
    <div wire:ignore id="map" class="p-4 w-1/2 h-full rounded-2xl border shadow-xl bg-white border-zinc-400">
    </div>

    {{-- Right div, contains filters and mentors --}}
    <div class="flex flex-col p-4 w-1/2 h-full rounded-2xl border shadow-xl bg-white border-zinc-400">

        <div class="flex justify-between">
            <h2 class="text-xl font-bold">Buscar Mentor</h2>
            {{-- Get Location Button --}}
            <button wire:click="$dispatch('getLocation')"
                class="my-2 w-max flex items-center justify-center gap-3 bg-mmblue hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
                Obtener Mi Ubicación Actual
            </button>
        </div>

        <div wire:ignore>
            <div class="border p-2" hidden>
                <p class="text-red-700 font-semibold">* La lat y la lng son solo para dev, quitar del front</p>
                <label><b>Lat: </b><span id="latitudeLabel"></span></label><br>
                <label><b>Lng: </b><span id="longitudeLabel"></span></label><br>
            </div>
        </div>

        <div class="flex gap-4 w-full">
            <div class="flex flex-col w-full" wire:ignore>
                <label class="font-semibold">Radio de distancia: </label>
                <input wire:model="distanceRange" type="range" id="radiusInput" min="200" max="30000"
                    value="1000" step="100" class="w-full">
                <span id="radiusLabel">1000 m</span>
            </div>
            {{-- Discipline filter --}}
            <div class="flex flex-col mt-2">
                <label class="font-semibold">Disciplina</label>
                <select wire:model="disciplineId" class="px-3 py-2 bg-slate-300">
                    <option value="0">Todas</option>
                    @foreach ($allDisciplines as $discipline)
                        <option value="{{ $discipline->id }}"> {{ $discipline->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button wire:click="$js.search" class="px-4 py-2 bg-mmgreen text-white mt-4 rounded-lg">
            Buscar Mentores en esta área
        </button>

        <div class="flex flex-col gap-2 grow bg-red-100 overflow-auto">
            @foreach ($mentorsFound as $mentor)
                <div wire:key="{{ 'mentor-found-' . $mentor->id }}"
                    class="bg-slate-200 rounded-xl px-4 py-3 border border-zinc-400 w-full flex justify-between">

                    <div class="flex flex-col">
                        <p><b>[foto] Nombre:</b> {{ $mentor->user->name . ' ' . $mentor->user->surname }}</p>
                        <p><b>Calificación promedio:</b> {{ $mentor->average_rating }} stars </p>
                        <p><b>Disciplinas:</b>
                            @php
                                $disciplines = $mentor
                                    ->subjects()
                                    ->with('discipline')
                                    ->get()
                                    ->pluck('discipline')
                                    ->unique('id')
                                    ->pluck('name');
                            @endphp
                            @foreach ($disciplines as $discipline)
                                <span class="bg-blue-300 px-2 py-1 rounded-full">{{ $discipline }}</span>
                            @endforeach
                        </p>
                        <p><b>Tarifa:</b> L {{ $mentor->price_per_hour }}  </p>
                    </div>

                    <div class="flex flex-col gap-2">
                        <button wire:click="showMentorProfile({{ $mentor->id }})"
                            class="bg-mmblue text-white text-sm px-2 rounded">
                            Perfil Detallado
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Modal FUERA del foreach -->
            @if ($selectedMentorId)
                @php
                    $selectedMentor = $mentorsFound->firstWhere('id', $selectedMentorId);
                @endphp

                <div class="fixed inset-0 bg-black/50 z-[9999]">
                    <div class="fixed inset-0 flex items-center justify-center z-[9999]">
                        <div class="bg-white rounded-lg p-6 max-w-4xl mx-4 shadow-xl max-h-[80vh] overflow-auto">
                            <div class="flex gap-6">

                                <div class="border-r border-zinc-400 pr-6 min-w-[300px]">
                                    <p><b>Nombre:</b>
                                        {{ $selectedMentor->user->name . ' ' . $selectedMentor->user->surname }}
                                    </p>
                                    <p><b>Acerca del Mentor:</b> {{ $selectedMentor->about_me }}
                                    </p>

                                    <p><b>Calificación Promedio:</b> {{ $selectedMentor->average_rating }} estrellas
                                    </p>
                                    <p><b>Sesiones Finalizadas:</b> {{ $selectedMentor->finalized_sessions }}</p>
                                </div>

                                <div class="flex flex-col gap-4 flex-1">
                                    <h2 class="font-semibold text-lg">Disciplinas y Materias que imparte</h2>

                                    @if (count($selectedMentorSubjects) > 0)

                                        <div class="h-full overflow-auto">

                                            @foreach ($selectedMentorSubjects as $disciplineGroup)
                                                <article class="flex flex-col p-4 rounded-lg bg-slate-100 border">
                                                    <h3 class="font-semibold text-md mb-2 text-blue-700">
                                                        {{ $disciplineGroup['discipline_name'] }}
                                                    </h3>
                                                    <hr class="border-zinc-300 mb-3">

                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach ($disciplineGroup['subjects'] as $subject)
                                                            <span
                                                                class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm border border-blue-200">
                                                                {{ $subject['name'] }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-gray-500 text-center py-4">
                                            Este mentor no tiene materias asignadas
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex justify-between mt-6 pt-4 border-t">
                                <button wire:click="sendMessage({{ $selectedMentor->id }})"
                                    class="bg-mmgreen text-white text-sm px-4 py-2 rounded hover:bg-green-600 transition-colors">
                                    Enviar Mensaje
                                </button>
                                <button wire:click="closeMentorProfile"
                                    class="bg-red-800 text-white text-sm px-4 py-2 rounded hover:bg-red-900 transition-colors">
                                    Cerrar
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
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
    let currentLat = 13.3015;
    let currentLng = -87.1827;

    // Initialize map
    const map = L.map('map').setView([currentLat, currentLng], 13);

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

    const circleIcon = L.divIcon({
        className: "custom-marker",
        html: `
        <div style="
            width:20px; height:20px;
            border:3px solid #2563eb;
            border-radius:50%;
            background-color: rgba(59,130,246,0.3);
        "></div>
    `,
        iconSize: [20, 20],
        iconAnchor: [10, 10] // centro del círculo
    });

    let marker = L.marker([currentLat, currentLng], {
        icon: circleIcon,
        draggable: true
    }).addTo(map);


    // Circle global
    let circle = L.circle([currentLat, currentLng], {
        radius: 1000, // en metros (1000 m inicial)
        color: "blue",
        fillColor: "#3b82f6",
        fillOpacity: 0.3
    }).addTo(map);

    // Actualizar labels
    function updateCoordinates(lat, lng) {
        currentLat = lat;
        currentLng = lng;
        latLabel.textContent = `${lat.toFixed(6)}`;
        lngLabel.textContent = `${lng.toFixed(6)}`;
    }
    updateCoordinates(currentLat, currentLng);

    // Al mover el marker, actualizar círculo
    marker.on("move", (e) => {
        const {
            lat,
            lng
        } = e.latlng;
        circle.setLatLng([lat, lng]);
        updateCoordinates(lat, lng);
    });

    // Input radio
    const radiusInput = document.getElementById('radiusInput');
    const radiusLabel = document.getElementById('radiusLabel');

    // Update radio
    radiusInput.addEventListener('input', () => {
        const meters = parseInt(radiusInput.value);

        if (meters >= 1000) {
            radiusLabel.textContent = (meters / 1000).toFixed(1) + " km";
        } else {
            radiusLabel.textContent = meters + " m";
        }

        circle.setRadius(meters); // Leaflet usa metros
    });

    // Click on map
    map.on('click', (e) => {
        let {
            lat,
            lng
        } = e.latlng;
        lng = ((lng + 180) % 360 + 360) % 360 - 180;

        marker.setLatLng([lat, lng]);
        circle.setLatLng([lat, lng]); // mover círculo
        updateCoordinates(lat, lng);
    });
</script>
@script
    <script>
        $js('search', () => {
            $wire.searchMentors(currentLat, currentLng);
        });

        $wire.on('open-new-tab', (data) => {
            window.open(data.url, '_blank');
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
                    marker.setLatLng([lat, lng]);

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
