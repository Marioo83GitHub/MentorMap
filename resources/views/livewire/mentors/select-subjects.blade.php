<!-- Main Container - Professional Layout -->
<div class="min-h-screen p-4 transition-colors duration-300 relative z-10">
    <!-- Mobile Header -->
    <div class="lg:hidden mb-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-mmblue dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Seleccionar Materias</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Elige las materias que enseñarás</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="hidden lg:block mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                ¿Qué materias enseñas?
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mb-6">
                Selecciona las disciplinas y materias en las que tienes experiencia. Podrás agregar temas específicos para cada una.
            </p>

            <!-- Progress Indicator -->
            {{-- <div class="max-w-md mx-auto">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progreso</span>
                    <span class="text-sm font-medium text-mmblue dark:text-blue-400">
                        {{ count($selectedSubjects) }} {{ count($selectedSubjects) == 1 ? 'materia' : 'materias' }}
                    </span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-mmblue dark:bg-blue-400 h-2 rounded-full transition-all duration-500"
                         style="width: {{ count($selectedSubjects) > 0 ? min(100, count($selectedSubjects) * 25) : 0 }}%"></div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    {{ count($selectedSubjects) == 0 ? 'Comienza seleccionando tu primera materia' : (count($selectedSubjects) >= 4 ? '¡Excelente! Es un buen comienzo' : 'Agrega más materias para mejorar tu perfil') }}
                </p>
            </div> --}}
        </div>

        <div class="grid lg:grid-cols-2 gap-6">

            <!-- Left Panel - Subject Selection -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 transition-colors duration-300">

                <!-- Panel Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">

                            <svg class="w-5 h-5 text-mmblue dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Agregar Materias</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Selecciona una disciplina y luego elige las materias que dominas
                    </p>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">

                    <!-- Discipline Selection -->
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Disciplina Académica
                        </label>
                        <div class="flex gap-3">
                            <select wire:model.live="disciplineId"
                                    class="flex-1 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-mmblue dark:focus:ring-blue-400 focus:border-transparent transition-colors duration-300">
                                <option value="">Selecciona una disciplina...</option>
                                @foreach ($disciplines as $discipline)
                                    <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                @endforeach
                            </select>
                            <button class="px-4 py-3 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 rounded-xl border border-gray-300 dark:border-gray-600 transition-all duration-200 flex items-center gap-2 group">
                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Sugerir</span>
                            </button>
                        </div>
                        <p class="text-xs text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-900/20 rounded-lg p-2 border border-amber-200 dark:border-amber-700">
                            ¿No encuentras tu disciplina? Usa el botón "Sugerir" para solicitarla
                        </p>
                    </div>

                    <!-- Subject Search -->
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Buscar Materias
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input wire:model.live="searchSubject"
                                   type="text"
                                   class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-mmblue dark:focus:ring-blue-400 focus:border-transparent transition-colors duration-300"
                                   placeholder="Buscar materias disponibles..." />
                        </div>
                    </div>

                    <!-- Available Subjects -->
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Materias Disponibles
                        </label>

                        @if(empty($subjects))
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 dark:text-gray-400">Selecciona una disciplina para ver las materias disponibles</p>
                            </div>
                        @else
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 max-h-64 overflow-y-auto">
                                <div class="space-y-2">
                                    @foreach ($subjects as $subject)
                                        <label class="flex items-center p-3 rounded-lg hover:bg-white dark:hover:bg-gray-600 cursor-pointer transition-colors duration-200 group">
                                            <input type="radio"
                                                   wire:model.live="subjectId"
                                                   wire:key="subject-radio-{{ $subject->id }}"
                                                   value="{{ $subject->id }}"
                                                   class="w-4 h-4 text-mmblue dark:text-blue-400 focus:ring-mmblue dark:focus:ring-blue-400 border-gray-300 dark:border-gray-600">
                                            <span class="ml-3 text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white transition-colors duration-200">
                                                {{ $subject->name }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Add Subject Button -->
                    @if(!empty($subjects))
                        <div class="space-y-3">
                            @if($subjectId)
                                <button wire:click="selectSubject"
                                        class="w-full flex items-center justify-center gap-3 bg-mmblue hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Agregar Materia Seleccionada
                                </button>
                            @else
                                <button disabled
                                        class="w-full flex items-center justify-center gap-3 bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 font-semibold py-3 px-4 rounded-xl cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Selecciona una materia primero
                                </button>
                            @endif

                            <!-- Helper Text -->
                            <div class="text-center">
                                @if($subjectId)
                                    <p class="text-sm text-green-600 dark:text-green-400 font-medium">
                                        ✓ Materia seleccionada, haz clic para agregar
                                    </p>
                                @else
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Selecciona una materia de la lista para continuar
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>


            <!-- Right Panel - Selected Subjects -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 transition-colors duration-300">

                <!-- Panel Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-mmgreen dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Mis Materias</h3>
                        </div>
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-sm font-medium rounded-full">
                            {{ count($selectedSubjects) }} seleccionadas
                        </span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        Aquí aparecerán las materias que has seleccionado. Podrás agregar temas específicos para cada una.
                    </p>
                </div>

                <!-- Content -->
                <div class="p-6">
                    @if(empty($selectedSubjects))
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                Aún no has seleccionado materias
                            </h4>
                            <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-sm mx-auto">
                                Selecciona una disciplina y materia en el panel de la izquierda para comenzar
                            </p>
                            <div class="flex items-center justify-center text-sm text-gray-400 dark:text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Empieza aquí
                            </div>
                        </div>
                    @else
                        <!-- Selected Subjects List -->
                        <div class="space-y-4">
                            @foreach ($selectedSubjects as $subject)
                                <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-5 border border-gray-200 dark:border-gray-600 transition-all duration-300 hover:shadow-md"
                                     wire:key="subjects-{{ $subject->id }}">

                                    <!-- Subject Header -->
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-medium rounded-lg">
                                                    {{ $subject->discipline->name }}
                                                </span>
                                            </div>
                                            <h4 class="text-lg font-bold text-gray-900 dark:text-white">
                                                {{ $subject->name }}
                                            </h4>
                                        </div>
                                        <button wire:click="deselectSubject({{ $subject->id }})"
                                                class="p-2 text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition-all duration-200 group">
                                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Add Topic Button -->
                                    <button id="show-btn-{{ $subject->id }}"
                                            wire:click="$js.toggleInput({{ $subject->id }})"
                                            class="flex items-center gap-2 px-4 py-2 bg-mmblue hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 mb-4">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Agregar Tema
                                    </button>

                                    <!-- Topic Input (Hidden by default) -->
                                    <div id="topic-input-{{ $subject->id }}" class="hidden mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                                            Agregar nuevo tema
                                        </label>
                                        <div class="flex gap-3">
                                            <input id="topic-field-{{ $subject->id }}"
                                                   type="text"
                                                   class="flex-1 px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-mmblue dark:focus:ring-blue-400 focus:border-transparent transition-colors duration-300"
                                                   placeholder="Ej: Álgebra básica, Geometría, etc...">
                                            <button wire:click="$js.saveTopic({{ $subject->id }})"
                                                    class="px-4 py-2 bg-mmgreen hover:opacity-80 dark:bg-mmgreen dark:hover:opacity-80 text-white font-medium rounded-lg transition-all duration-200 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                                Guardar
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Topics List -->
                                    @if (!empty($topics[$subject->id]))
                                        <div class="border-t border-gray-200 dark:border-gray-600 pt-4">
                                            <h5 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                                                Temas específicos:
                                            </h5>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($topics[$subject->id] ?? [] as $topic)
                                                    <span class="px-3 py-1 bg-mmgreen/20 dark:bg-green-900/30 text-mmgreen dark:text-green-300 text-sm font-medium rounded-full border border-mmgreen/30 dark:border-green-700">
                                                        {{ $topic }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="mt-8 text-center">
            @if(!empty($selectedSubjects))
                <button wire:click="saveMentorSubjects"
                        class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-mmgreen hover:opacity-80 dark:bg-mmgreen dark:hover:opacity-80 text-white font-bold text-lg rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Guardar
                </button>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-3">
                    Siguiente paso: Configurar tarifas y disponibilidad
                </p>
            @else
                <button disabled
                        class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 font-bold text-lg rounded-2xl cursor-not-allowed">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Guardar y Continuar
                </button>
                <p class="text-sm text-amber-600 dark:text-amber-400 mt-3">
                    Agrega al menos una materia para continuar
                </p>
            @endif
        </div>
    </div>
</div>

@script
    <script>
        // Enhanced JavaScript functionality with better UX
        $js('toggleInput', (id) => {
            const showBtn = document.getElementById(`show-btn-${id}`);
            const topicInput = document.getElementById(`topic-input-${id}`);
            const topicField = document.getElementById(`topic-field-${id}`);

            // Hide button and show input with animation
            showBtn.classList.add('hidden');
            topicInput.classList.remove('hidden');

            // Focus on input field and clear any existing content
            setTimeout(() => {
                topicField.focus();
                topicField.value = '';
            }, 100);
        });

        $js('saveTopic', async (id) => {
            const input = document.getElementById(`topic-field-${id}`);
            const topicInput = document.getElementById(`topic-input-${id}`);
            const showBtn = document.getElementById(`show-btn-${id}`);
            const name = input.value.trim();

            // Validate input
            if (!name) {
                input.classList.add('border-red-500', 'ring-2', 'ring-red-200');
                input.placeholder = 'Por favor ingresa un nombre para el tema';
                setTimeout(() => {
                    input.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
                    input.placeholder = 'Ej: Álgebra básica, Geometría, etc...';
                }, 2000);
                return;
            }

            // Show loading state
            const saveBtn = topicInput.querySelector('button');
            const originalBtnText = saveBtn.innerHTML;
            saveBtn.innerHTML = `
                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Guardando...
            `;
            saveBtn.disabled = true;

            try {
                // Call Livewire method
                await $wire.call('addTopicFromJs', id, name);

                // Success feedback
                input.classList.add('border-green-500', 'ring-2', 'ring-green-200');
                setTimeout(() => {
                    input.classList.remove('border-green-500', 'ring-2', 'ring-green-200');
                }, 1000);

                // Reset UI
                input.value = '';
                topicInput.classList.add('hidden');
                showBtn.classList.remove('hidden');

            } catch (error) {
                // Error feedback
                input.classList.add('border-red-500', 'ring-2', 'ring-red-200');
                console.error('Error adding topic:', error);
                setTimeout(() => {
                    input.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
                }, 2000);
            } finally {
                // Reset button
                saveBtn.innerHTML = originalBtnText;
                saveBtn.disabled = false;
            }
        });

        // Add Enter key support for topic input
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const target = e.target;
                if (target.id && target.id.startsWith('topic-field-')) {
                    e.preventDefault();
                    const subjectId = target.id.replace('topic-field-', '');
                    $js.saveTopic(parseInt(subjectId));
                }
            }
        });

        // Add Escape key support to cancel topic input
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const target = e.target;
                if (target.id && target.id.startsWith('topic-field-')) {
                    const subjectId = target.id.replace('topic-field-', '');
                    const topicInput = document.getElementById(`topic-input-${subjectId}`);
                    const showBtn = document.getElementById(`show-btn-${subjectId}`);

                    topicInput.classList.add('hidden');
                    showBtn.classList.remove('hidden');
                }
            }
        });
    </script>
@endscript
