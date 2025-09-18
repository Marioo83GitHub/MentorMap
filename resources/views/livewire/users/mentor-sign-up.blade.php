

<div class="min-h-screen flex items-center justify-center p-4 relative z-10">
    <div class="max-w-7xl w-full bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl dark:shadow-2xl border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class=" text-black dark:text-gray-200 text-center py-6">
            <h1 class="text-2xl font-bold">Registro de Mentor</h1>
            <p class="text-gray-500 dark:text-gray-200 mt-2">Completa tu perfil para comenzar</p>
        </div>

        <form wire:submit.prevent="saveMentorData" class="p-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Profile Photo Section -->
                <div class="lg:w-1/3 flex flex-col items-center">
                    <div class="relative mb-6">
                        <!-- Profile Image -->
                        <div class="w-56 h-56 bg-gray-200 dark:bg-gray-500 rounded-full overflow-hidden shadow-lg dark:shadow-xl">
                            @if($photo)
                                <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-32 h-32 text-white dark:text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Photo Upload Button -->
                        <label for="photo-upload" class="absolute bottom-2 right-2 bg-mmgreen dark:bg-[#25a02e] text-white p-2 rounded-full hover:bg-[#33ab35] dark:hover:bg-[#2c9f31] transition-colors cursor-pointer">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </label>
                        <input id="photo-upload" wire:model="photo" type="file" class="hidden" accept="image/*">
                    </div>

                    <!-- Photo Actions -->
                    <div class="flex gap-2 mb-6">
                        <button type="button" onclick="document.getElementById('photo-upload').click()" 
                                class="px-4 py-2 bg-mmgreen dark:bg-[#25a02e] text-white rounded-lg hover:bg-[#33ab35] dark:hover:bg-[#2c9f31] transition-colors text-sm cursor-pointer">
                            Seleccionar Foto
                        </button>
                        @if($photo)
                            <button type="button" wire:click="$set('photo', null)" 
                                    class="px-4 py-2 bg-red-600 dark:bg-red-700 text-white rounded-lg hover:bg-red-700 dark:hover:bg-red-800 transition-colors text-sm cursor-pointer">
                                Quitar Foto
                            </button>
                        @endif
                    </div>

                    <!-- Name Display -->
                    <div class="text-center">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                            Mentor
                        </h2>
                        
                        <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email ? Auth::user()->email : 'Tu Email' }}</p>
                    </div>
                </div>

                <!-- Form Fields Section -->
                <div class="lg:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Personal Information -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600 pb-2">Información Personal</h3>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                            <input wire:model.live="name" type="text" placeholder="Ingresa tu nombre"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                            @error('name')<span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Apellido</label>
                            <input wire:model.live="surname" type="text" placeholder="Ingresa tu apellido"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                            @error('surname')<span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Sexo</label>
                            <div class="flex gap-6">
                                <label class="flex items-center cursor-pointer p-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <input wire:model="sex" type="radio" value="M" class="w-5 h-5 accent-mmgreen mr-3">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Masculino</span>
                                </label>
                                <label class="flex items-center cursor-pointer p-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <input wire:model="sex" type="radio" value="F" class="w-5 h-5 accent-mmgreen mr-3">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Femenino</span>
                                </label>
                            </div>
                            @error('sex')<span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Número de Identidad</label>
                            <input wire:model="id_number" type="text" placeholder="Ingresa tu número de identidad"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                            @error('id_number')<span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Contact & Location -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600 pb-2">Contacto y Ubicación</h3>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono</label>
                            <input wire:model="phone" type="text" placeholder="Ingresa tu número de teléfono"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                            @error('phone')<span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de Nacimiento</label>
                            <input wire:model="birth_date" type="date" placeholder="Selecciona tu fecha de nacimiento"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                            @error('birth_date')<span class="text-red-500 dark:text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">País</label>
                            <select wire:model.live.debounce.300ms="country_id" 
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Departamento</label>
                            <select wire:model="department_id" 
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3EB830] dark:focus:ring-[#25a02e]">
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-8">
                <button type="submit" 
                        class="px-8 py-3 bg-mmgreen dark:bg-[#25a02e] text-white rounded-lg hover:bg-[#33ab35] dark:hover:bg-[#2c9f31] transition-colors font-medium shadow-lg dark:shadow-xl cursor-pointer">
                    Continuar
                </button>
            </div>
            <div class="flex justify-end mt-4">
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Siguiente: Seleccionar Ubicación
                </p>
            </div>
        </form>
    </div>
</div>
