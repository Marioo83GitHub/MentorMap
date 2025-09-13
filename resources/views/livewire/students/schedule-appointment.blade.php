<div>
    @if ($showModal)
    {{-- Fondo del Modal --}}
    <div 
        x-data="{ show: @entangle('showModal') }"
        x-show="show"
        x-on:keydown.escape.window="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-900 bg-opacity-75 z-50 flex justify-center items-center p-4"
        style="display: none;"
    >
        {{-- Panel del Modal --}}
        <div 
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            @click.away="show = false"
            class="bg-white rounded-xl shadow-xl w-full max-w-2xl dark:bg-gray-800 transform transition-all"
        >
            <form wire:submit.prevent="saveAppointment">
                {{-- Encabezado del Modal --}}
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Agendar Nueva Sesión
                        </h3>
                        <button type="button" wire:click="closeModal" class="text-gray-400 hover:text-gray-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>

                {{-- Cuerpo del Modal --}}
                <div class="p-6 space-y-6">
                    {{-- PASO 1: (CONDICIONAL) INICIAR NUEVA MENTORÍA --}}
                    @if($isNewMentorship)
                    <div class="space-y-2">
                        <h4 class="font-medium text-gray-800 dark:text-gray-200">Paso 1: Iniciar Nueva Mentoría</h4>
                        <div>
                            <label for="mentorship_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título de la Mentoría</label>
                            <input type="text" id="mentorship_title" wire:model.defer="mentorship_title" 
                                   class="mt-1 block w-full transition duration-75 rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-inset focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500"
                                   placeholder="Ej: Ayuda General con Programación Web">
                            @error('mentorship_title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                    
                    {{-- PASO 2: ELEGIR TEMA EN CASCADA --}}
                    <div class="space-y-4">
                         <h4 class="font-medium text-gray-800 dark:text-gray-200">Paso 2: Elige el Tema para la Sesión</h4>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Dropdown de Disciplinas -->
                            <div>
                                <label for="discipline" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Disciplina</label>
                                <select id="discipline" wire:model.live="selectedDiscipline" class="mt-1 block w-full transition duration-75 rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-inset focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500">
                                    <option value="">Selecciona un área...</option>
                                    @foreach($disciplines as $discipline)
                                        <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown de Asignaturas -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Asignatura</label>
                                <select id="subject" wire:model.live="selectedSubject" class="mt-1 block w-full transition duration-75 rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-inset focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500" @if(!$selectedDiscipline) disabled @endif>
                                    <option value="">Selecciona una asignatura...</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Dropdown de Temas -->
                        <div>
                            <label for="topic" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tema Específico</label>
                            <select id="topic" wire:model.defer="topic_id" class="mt-1 block w-full transition duration-75 rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-inset focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500" @if(!$selectedSubject) disabled @endif>
                                <option value="">Selecciona el tema a tratar...</option>
                                @foreach($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                                @endforeach
                            </select>
                            @error('topic_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- PASO 3: FECHA, HORA Y DURACIÓN --}}
                    <div class="space-y-2">
                        <h4 class="font-medium text-gray-800 dark:text-gray-200">Paso 3: Fecha y Duración</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora</label>
                                <input type="datetime-local" id="scheduled_at" wire:model.defer="scheduled_at" 
                                       class="mt-1 block w-full transition duration-75 rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-inset focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500">
                                @error('scheduled_at') <span class="text-red-500 text-xs mt-1">La fecha debe ser futura.</span> @enderror
                            </div>
                            
                            <div>
                                <label for="duration" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duración</label>
                                <select id="duration" wire:model.defer="duration" class="mt-1 block w-full transition duration-75 rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-inset focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500">
                                    <option value="1">1 hora</option>
                                    <option value="2">2 horas</option>
                                    <option value="3">3 horas</option>
                                </select>
                                @error('duration') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pie del Modal --}}
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-200 dark:border-gray-700 flex justify-end items-center space-x-3">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:loading.attr="disabled" wire:target="saveAppointment">
                        <span wire:loading.remove wire:target="saveAppointment">Confirmar Cita</span>
                        <span wire:loading wire:target="saveAppointment">Agendando...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>

