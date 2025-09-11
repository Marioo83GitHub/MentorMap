<div>
    @if ($showModal)
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex justify-center items-center p-4">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-lg dark:bg-gray-800">
            <div class="flex justify-between items-center border-b pb-3 dark:border-gray-600">
                <h3 class="text-xl font-semibold dark:text-white">Agendar Sesión</h3>
                <button wire:click="closeModal" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white text-2xl">&times;</button>
            </div>
            
            <form wire:submit.prevent="saveAppointment" class="mt-4 space-y-4">

                {{-- PASO 1: (CONDICIONAL) INICIAR NUEVA MENTORÍA --}}
                @if($isNewMentorship)
                <div class="p-4 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 space-y-4">
                    <h4 class="font-semibold text-lg dark:text-white">Paso 1: Iniciar Nueva Mentoría</h4>
                    <div>
                        <label for="mentorship_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dale un Título a esta Mentoría</label>
                        <input type="text" id="mentorship_title" wire:model.defer="mentorship_title" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:border-gray-600"
                               placeholder="Ej: Ayuda General con Programación Web">
                        @error('mentorship_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif
                
                {{-- PASO 2: ELEGIR TEMA EN CASCADA --}}
                <div class="p-4 border rounded-md dark:border-gray-600 space-y-4">
                    <h4 class="font-semibold text-lg dark:text-white">Paso 2: Elige el Tema para la Sesión</h4>

                    <!-- 1. Dropdown de Disciplinas -->
                    <div>
                        <label for="discipline" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Disciplina</label>
                        <select id="discipline" wire:model.live="selectedDiscipline" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:text-white dark:border-gray-600">
                            <option value="">-- Primero elige un área --</option>
                            @foreach($disciplines as $discipline)
                                <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 2. Dropdown de Asignaturas -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Asignatura</label>
                        <select id="subject" wire:model.live="selectedSubject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:text-white dark:border-gray-600" @if(!$selectedDiscipline) disabled @endif>
                            <option value="">-- Ahora elige una asignatura --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 3. Dropdown de Temas -->
                    <div>
                        <label for="topic" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tema Específico</label>
                        <select id="topic" wire:model.defer="topic_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:text-white dark:border-gray-600" @if(!$selectedSubject) disabled @endif>
                            <option value="">-- Finalmente, elige el tema --</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                            @endforeach
                        </select>
                        @error('topic_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- PASO 3: FECHA Y HORA --}}
                <div class="p-4 border rounded-md dark:border-gray-600 space-y-4">
                     <h4 class="font-semibold text-lg dark:text-white">Paso 3: Fecha y Hora</h4>
                    <div>
                        <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de la Sesión</label>
                        <input type="datetime-local" id="scheduled_at" wire:model.defer="scheduled_at" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:text-white dark:border-gray-600">
                        @error('scheduled_at') 
                            <span class="text-red-500 text-xs">
                                @if($message == 'The scheduled at field must be a date after now.')
                                    La fecha y hora debe ser posterior al momento actual.
                                @else
                                    {{ $message }}
                                @endif
                            </span> 
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t dark:border-gray-600">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md mr-2 dark:bg-gray-600 dark:text-gray-200">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 mr-2">
                        Pagar
                    </button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Confirmar Cita
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>