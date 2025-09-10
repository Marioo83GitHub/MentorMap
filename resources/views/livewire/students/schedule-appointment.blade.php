<div>
    @if ($showModal)
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-lg dark:bg-gray-800">
            <div class="flex justify-between items-center border-b pb-3 dark:border-gray-600">
                <h3 class="text-xl font-semibold dark:text-white">Agendar Sesión</h3>
                <button wire:click="closeModal" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white">&times;</button>
            </div>
            
            <form wire:submit.prevent="saveAppointment" class="mt-4 space-y-4">

                {{-- SECCIÓN PARA CREAR UNA NUEVA MENTORÍA (APARECE CONDICIONALMENTE) --}}
                @if($isNewMentorship)
                <div class="p-4 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <h4 class="font-semibold mb-2 text-lg dark:text-white">Iniciar Nueva Mentoría</h4>
                    
                    {{-- Campo para Título de la Mentoría --}}
                    <div>
                        <label for="mentorship_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título de la Mentoría</label>
                        <input type="text" id="mentorship_title" wire:model.defer="mentorship_title" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                               placeholder="Ej: Ayuda General con Programación Web">
                        @error('mentorship_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Campo para Descripción de la Mentoría --}}
                    <div class="mt-4">
                        <label for="mentorship_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">¿Qué quieres aprender en general? (opcional)</label>
                        <textarea id="mentorship_description" wire:model.defer="mentorship_description" rows="2"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                  placeholder="Ej: Mejorar mis habilidades en el backend"></textarea>
                        @error('mentorship_description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif
                
                {{-- SECCIÓN PARA AGENDAR LA CITA (APARECE SIEMPRE) --}}
                <div>
                    <label for="topic_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tema para esta Sesión</label>
                    <select id="topic_id" wire:model.defer="topic_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white">
                        <option value="">-- Elige una especialidad del mentor --</option>
                        @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                        @endforeach
                    </select>
                    @error('topic_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de la Sesión</label>
                    <input type="datetime-local" id="scheduled_at" wire:model.defer="scheduled_at" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white">
                    @error('scheduled_at') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notas para la sesión (opcional)</label>
                    <textarea id="notes" wire:model.defer="notes" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                              placeholder="Ej: Repasar el problema del último proyecto"></textarea>
                    @error('notes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end pt-4 border-t dark:border-gray-600">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md mr-2 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                        Cancelar
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

