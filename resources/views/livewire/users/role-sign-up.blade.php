<div class="min-h-screen flex items-center justify-center p-4 relative z-10">
    <div class="max-w-6xl w-full">
        
        <!-- Header Section -->
        <div class="text-center mb-12">
          <!--  <div class="inline-flex items-center justify-center w-40 h-40">
               <img src="{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}" 
                             alt="MentorMap Logo" 
                             class="dark:hidden">
                        <img src="{{asset('Logos/white/LogoTextHorizontal.png')}}" 
                             alt="MentorMap Logo" 
                             class="hidden dark:block">
            </div> -->
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-400 bg-clip-text text-transparent mb-4">
                ¡Bienvenido a MentorMap!
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Selecciona cómo quieres ser parte de nuestra comunidad de aprendizaje
            </p>
        </div>

        <!-- Role Selection Cards -->
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            
            <!-- Mentor Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-mmgreen rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-white/20 dark:border-gray-700/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    
                    <!-- Icon -->
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-mmgreen rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-3 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                            Ser Mentor
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            Comparte tu conocimiento y experiencia ayudando a estudiantes a alcanzar sus metas académicas y profesionales.
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Crea tu perfil profesional
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Define tus áreas de especialidad
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Genera ingresos ayudando
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Horarios flexibles
                        </div>
                    </div>

                    <!-- Button -->
                    <button wire:click="signUpAsMentor" class="w-full py-4 bg-mmgreen text-white font-semibold rounded-md hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 shadow-lg hover:shadow-xl transform group-hover:scale-105 cursor-pointer">
                        <span class="flex items-center justify-center">
                            Comenzar como Mentor
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>

            <!-- Student Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-mmblue rounded-3xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="relative bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-white/20 dark:border-gray-700/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    
                    <!-- Icon -->
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-mmblue rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            Ser Estudiante
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                            Encuentra mentores expertos que te guíen en tu camino académico y te ayuden a desarrollar nuevas habilidades.
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Acceso a mentores expertos
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Sesiones personalizadas
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Seguimiento de progreso
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Precios accesibles
                        </div>
                    </div>

                    <!-- Button -->
                    <button wire:click="signUpAsStudent" class="w-full py-4 bg-mmblue text-white font-semibold rounded-md hover:from-blue-600 hover:to-purple-600 transition-all duration-300 shadow-lg hover:shadow-xl transform group-hover:scale-105 cursor-pointer">
                        <span class="flex items-center justify-center">
                            Comenzar como Estudiante
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <!-- en caso que lo permitamos 
        <div class="text-center mt-12">
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                ¿No estás seguro? Siempre puedes cambiar tu rol más tarde en tu perfil
            </p>
        </div> -->
    </div>
</div>
