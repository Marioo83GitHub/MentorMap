<div>
    <!-- Búsqueda de Mentores - Mapa Fullscreen con Panel Flotante -->
<div class="relative h-screen w-screen overflow-hidden">

    <!-- Mapa de Fondo (Fullscreen) -->
    <div wire:ignore id="map" class="absolute inset-0 w-full h-full z-0"></div>

    <!-- Botón de Retorno Flotante - Responsive -->
    <a href="{{ route('students.dashboard') }}"
        class="fixed top-2 md:top-6 left-2 md:left-16 z-50 inline-flex items-center space-x-2 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium py-2 md:py-2.5 px-3 md:px-4 rounded-xl shadow-lg hover:shadow-xl border border-gray-200 dark:border-gray-600 transition-all duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span class="text-xs md:text-sm">Dashboard</span>
    </a>

    <!-- Panel Lateral Flotante - Responsive -->
    <div class="fixed inset-x-2 top-12 bottom-2 md:right-6 md:top-6 md:bottom-6 md:left-auto md:w-md z-40 flex flex-col">
        <div
            class="bg-white/95 dark:bg-gray-800/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 flex flex-col h-full overflow-hidden">

            <!-- Header del Panel - Responsive -->
            <div
                class="p-4 md:p-6 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                <div class="flex items-center space-x-3 mb-3 md:mb-4">
                    <div
                        class="w-8 md:w-10 h-8 md:h-10 bg-gradient-to-r from-mmblue to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-4 md:w-5 h-4 md:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base md:text-lg font-bold text-gray-900 dark:text-white">Buscar Mentor</h2>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400">Encuentra el mentor perfecto</p>
                    </div>
                </div>

                <!-- Filtros - Responsive -->
                <div class="space-y-3 md:space-y-4">
                    <!-- Radio de Distancia -->
                    <div wire:ignore class="space-y-2">
                        <label class="block text-xs md:text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Radio de búsqueda
                        </label>
                        <input wire:model="distanceRange" type="range" id="radiusInput" min="200" max="30000"
                            value="1000" step="100"
                            class="w-full h-2 bg-gray-200 dark:bg-gray-600 rounded-lg appearance-none cursor-pointer slider">
                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>200m</span>
                            <span id="radiusLabel" class="font-medium text-mmblue">1.0 km</span>
                            <span>30km</span>
                        </div>
                    </div>

                    <!-- Filtro de Disciplina -->
                    <div class="space-y-2">
                        <label class="block text-xs md:text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Disciplina
                        </label>
                        <select wire:model="disciplineId"
                            class="w-full px-3 py-2 md:py-2.5 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-mmblue focus:border-transparent transition-all duration-200 text-xs md:text-sm">
                            <option value="0">Todas las disciplinas</option>
                            @foreach ($allDisciplines as $discipline)
                                <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Botón de Ubicación Flotante - Responsive -->
                    <button wire:click="$dispatch('getLocation')"
                        class="w-full bg-mmblue hover:bg-[#2041b9] text-white font-medium py-2 md:py-2.5 px-3 md:px-4 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-xs md:text-sm">Mi Ubicación</span>
                    </button>
                    <!-- Botón de Búsqueda -->
                    <button wire:click="$js.search"
                        class="w-full bg-mmgreen hover:bg-[#33ab35] text-white font-medium py-2 md:py-2.5 px-3 md:px-4 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                        <svg class="w-3 md:w-4 h-3 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="text-xs md:text-sm">Buscar Mentores</span>
                    </button>
                </div>
            </div>

            <!-- Lista de Resultados - Responsive -->
            <div class="flex-1 flex flex-col overflow-hidden bg-white dark:bg-gray-800">
                <!-- Header de Resultados -->
                <div class="p-3 md:p-4 pb-2 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-gray-900 dark:text-white text-sm md:text-base">
                            Mentores encontrados
                        </h3>
                        <span class="bg-mmblue/10 text-mmblue px-2 md:px-2.5 py-1 rounded-full text-xs font-medium">
                            {{ count($mentorsFound) }}
                        </span>
                    </div>
                </div>

                <!-- Lista Scrolleable -->
                <div class="flex-1 overflow-y-auto p-3 md:p-4 space-y-2 md:space-y-3 custom-scrollbar">
                    @forelse ($mentorsFound as $mentor)
                        <div wire:key="{{ 'mentor-found-' . $mentor->id }}"
                            class="bg-white/80 dark:bg-gray-700/80 backdrop-blur-sm hover:bg-white dark:hover:bg-gray-700 rounded-xl p-2 md:p-3 border border-gray-200 dark:border-gray-600 hover:shadow-lg transition-all duration-200 cursor-pointer">

                            <div class="flex items-center space-x-2 md:space-x-3">
                                <!-- Avatar -->
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="w-8 md:w-10 h-8 md:h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-xs md:text-sm">
                                        {{ substr($mentor->user->name, 0, 1) }}
                                    </div>
                                    <div
                                        class="absolute -bottom-0.5 -right-0.5 w-2 md:w-3 h-2 md:h-3 bg-green-500 rounded-full border-2 border-white dark:border-gray-700">
                                    </div>
                                </div>

                                <!-- Info del Mentor -->
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-gray-900 dark:text-white text-xs md:text-sm truncate">
                                        {{ $mentor->user->name }} {{ $mentor->user->surname }}
                                    </h4>

                                    <!-- Rating -->
                                    <div class="flex items-center space-x-1 mt-1">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-2.5 md:w-3 h-2.5 md:h-3 {{ $i <= floor($mentor->average_rating) ? 'fill-current' : 'text-gray-300' }}"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ number_format($mentor->average_rating, 1) }}
                                        </span>
                                    </div>

                                    <!-- Disciplinas -->
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        @php
                                            $disciplines = $mentor->subjects()->with('discipline')->get()->pluck('discipline')->unique('id')->take(2);
                                        @endphp
                                        @foreach ($disciplines as $discipline)
                                            <span
                                                class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-0.5 rounded-full text-xs font-medium">
                                                {{ $discipline->name }}
                                            </span>
                                        @endforeach
                                    </div>

                                    <!-- Precio y Botón -->
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="text-sm font-bold text-green-600 dark:text-green-400">
                                            L {{ number_format($mentor->price_per_hour, 0) }}/h
                                        </span>

                                        <button wire:click="showMentorProfile({{ $mentor->id }})"
                                            class="bg-mmblue hover:bg-blue-600 text-white text-xs font-medium px-2.5 py-1 rounded-lg transition-all duration-200">
                                            Ver perfil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <div
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-1">Sin resultados</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Intenta ajustar los filtros</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Perfil del Mentor -->
    @if ($selectedMentorId)
        @php
            $selectedMentor = $mentorsFound->firstWhere('id', $selectedMentorId);
        @endphp

        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-2 md:p-4">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-hidden border border-gray-200 dark:border-gray-700">

                <!-- Header del Modal - Responsive -->
                <div class="bg-gradient-to-r from-mmblue to-blue-600 text-white p-4 md:p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3 md:space-x-4">
                            <div
                                class="w-12 md:w-16 h-12 md:h-16 bg-white/20 rounded-full flex items-center justify-center text-lg md:text-2xl font-bold">
                                {{ substr($selectedMentor->user->name, 0, 1) }}
                            </div>
                            <div>
                                <h2 class="text-lg md:text-2xl font-bold">
                                    {{ $selectedMentor->user->name . ' ' . $selectedMentor->user->surname }}
                                </h2>
                                <div class="flex items-center space-x-2 mt-1">
                                    <div class="flex text-yellow-300">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-3 md:w-4 h-3 md:h-4 {{ $i <= floor($selectedMentor->average_rating) ? 'fill-current' : 'text-white/30' }}"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="text-white/90 text-xs md:text-sm">
                                        {{ number_format($selectedMentor->average_rating, 1) }} •
                                        {{ $selectedMentor->finalized_sessions }} sesiones
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button wire:click="closeMentorProfile"
                            class="w-8 md:w-10 h-8 md:h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all duration-200">
                            <svg class="w-4 md:w-5 h-4 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Contenido del Modal - Responsive -->
                <div class="p-4 md:p-6 max-h-[calc(90vh-200px)] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                        <!-- Información del Mentor -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                <h3 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-mmblue" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Acerca del Mentor
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $selectedMentor->about_me ?: 'Este mentor aún no ha agregado información sobre sí mismo.' }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                                <div class="bg-green-50 dark:bg-green-900/20 rounded-xl p-3 md:p-4 text-center">
                                    <div class="text-xl md:text-2xl font-bold text-green-600 dark:text-green-400">
                                        L {{ number_format($selectedMentor->price_per_hour, 0) }}
                                    </div>
                                    <div class="text-xs md:text-sm text-gray-600 dark:text-gray-400">por hora</div>
                                </div>

                                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-3 md:p-4 text-center">
                                    <div class="text-xl md:text-2xl font-bold text-blue-600 dark:text-blue-400">
                                        {{ $selectedMentor->finalized_sessions }}
                                    </div>
                                    <div class="text-xs md:text-sm text-gray-600 dark:text-gray-400">sesiones completadas</div>
                                </div>
                            </div>
                        </div>

                        <!-- Disciplinas y Materias -->
                        <div class="space-y-4">
                            <h3 class="font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 mr-2 text-mmblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                                Especialidades
                            </h3>

                            <div class="max-h-80 overflow-y-auto space-y-3 custom-scrollbar">
                                @if (count($selectedMentorSubjects) > 0)
                                    @foreach ($selectedMentorSubjects as $disciplineGroup)
                                        <div
                                            class="bg-white dark:bg-gray-700 rounded-xl p-4 border border-gray-200 dark:border-gray-600">
                                            <h4 class="font-semibold text-mmblue dark:text-blue-400 mb-3">
                                                {{ $disciplineGroup['discipline_name'] }}
                                            </h4>

                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($disciplineGroup['subjects'] as $subject)
                                                    <span
                                                        class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium border border-blue-200 dark:border-blue-700">
                                                        {{ $subject['name'] }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 text-center">
                                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                        <p class="text-gray-500 dark:text-gray-400">Este mentor no tiene materias asignadas</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer del Modal - Responsive -->
                <div class="bg-gray-50 dark:bg-gray-700 px-4 md:px-6 py-3 md:py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                        <div class="text-xs md:text-sm text-gray-500 dark:text-gray-400 text-center sm:text-left">
                            Mentor desde: <span class="font-medium">{{ $selectedMentor->created_at->format('M Y') }}</span>
                        </div>

                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                            <button wire:click="sendMessage({{ $selectedMentor->id }})"
                                class="bg-mmgreen hover:bg-green-600 text-white font-medium px-4 md:px-6 py-2 md:py-2.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:scale-105 flex items-center justify-center space-x-2 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <span>Enviar Mensaje</span>
                            </button>

                            <button wire:click="closeMentorProfile"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 md:px-6 py-2 md:py-2.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 text-sm">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Estilos CSS personalizados -->
<style>
    /* Slider personalizado */
    .slider {
        appearance: none;
        height: 6px;
        border-radius: 5px;
        background: #e5e7eb;
        outline: none;
        transition: background 0.3s;
    }

    .dark .slider {
        background: #4b5563;
    }

    .slider::-webkit-slider-thumb {
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .slider::-webkit-slider-thumb:hover {
        background: #2563eb;
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #3b82f6;
        cursor: pointer;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .slider::-moz-range-thumb:hover {
        background: #2563eb;
        transform: scale(1.1);
    }

    /* Scrollbar personalizado */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-track {
        background: #374151;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
        transition: background 0.3s;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #6b7280;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    /* Animaciones suaves */
    .transition-all {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Responsive para el panel lateral */
    @media (max-width: 768px) {
        .fixed.left-6.top-24.bottom-6.w-96 {
            left: 1rem;
            right: 1rem;
            width: auto;
            top: 5rem;
            bottom: 1rem;
        }
    }

    @media (max-width: 640px) {
        .fixed.left-6.top-24.bottom-6.w-96 {
            left: 0.5rem;
            right: 0.5rem;
            top: 4rem;
            bottom: 0.5rem;
        }

        .fixed.top-6.left-6,
        .fixed.top-6.right-6 {
            top: 1rem;
        }

        .fixed.top-6.left-6 {
            left: 1rem;
        }

        .fixed.top-6.right-6 {
            right: 1rem;
        }
    }
</style>

@assets
{{-- Leaflet CDN --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    
<style>
    /* Responsividad mejorada para el panel flotante */
    @media (max-width: 768px) {
        /* Panel ocupa todo el ancho en móvil con más espacio para el mapa */
        .fixed.inset-x-2 {
            left: 0.5rem !important;
            right: 0.5rem !important;
            top: 6rem !important;
            bottom: 0.5rem !important;
        }
        
        /* Ajustar botones flotantes en móvil */
        .fixed.top-2.left-2 {
            top: 0.5rem !important;
            left: 0.5rem !important;
        }
        
        .fixed.top-2.right-2 {
            top: 0.5rem !important;
            right: 0.5rem !important;
        }
    }
    
    /* Para pantallas muy pequeñas */
    @media (max-width: 640px) {
        .fixed.inset-x-2 {
            left: 0.25rem !important;
            right: 0.25rem !important;
            top: 5rem !important;
            bottom: 0.25rem !important;
        }
        
        .fixed.top-2.left-2 {
            top: 0.25rem !important;
            left: 0.25rem !important;
        }
        
        .fixed.top-2.right-2 {
            top: 0.25rem !important;
            right: 0.25rem !important;
        }
    }
    
    /* Scrollbar personalizado */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(229, 231, 235, 0.3);
        border-radius: 2px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(156, 163, 175, 0.5);
        border-radius: 2px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(156, 163, 175, 0.7);
    }
    
    /* Asegurar que los botones flotantes estén por encima del mapa */
    .fixed.z-50 {
        z-index: 9999 !important;
    }
    
    /* Mejorar el contraste del panel en móvil */
    @media (max-width: 768px) {
        .bg-white\/95 {
            background-color: rgba(255, 255, 255, 0.98) !important;
        }
        
        .dark .bg-gray-800\/95 {
            background-color: rgba(31, 41, 55, 0.98) !important;
        }
    }
</style>
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
                <svg class="w-5 h-5 animate-spin mr-1" fill="none" viewBox="0 0 24 24">
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
</div>