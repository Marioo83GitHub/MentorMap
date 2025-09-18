<!-- Mentor Dashboard - Professional Layout -->
<div class="min-h-screen relative z-10">

    <!-- Top Navigation Bar -->
    <div
        class="bg-white/95 dark:bg-[#020721] backdrop-blur-md border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50 transition-all duration-300 px-3 sm:px-4 lg:px-6 py-3 sm:py-4">
        <div class="flex items-center justify-between mx-auto">
            <div class="flex items-center space-x-2 sm:space-x-3 lg:space-x-4">
                <!-- Logo Section -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="relative group">
                        <div
                            class="absolute -inset-2 bg-gradient-to-r from-mmblue/20 to-blue-600/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                        <div class="relative rounded-xl p-1 sm:p-2 transition-all duration-300">
                            <img src="{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}" alt="MentorMap Logo"
                                class="h-6 sm:h-7 lg:h-8 w-auto dark:hidden">
                            <img src="{{asset('Logos/white/LogoTextHorizontal.png')}}" alt="MentorMap Logo"
                                class="h-6 sm:h-7 lg:h-8 w-auto hidden dark:block">
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-lg sm:text-xl lg:text-xl font-bold text-gray-900 dark:text-white">Panel de
                        Mentor
                    </h1>
                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">¡Bienvenido de vuelta! Gestiona tu enseñanza
                    </p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="flex items-center space-x-2 sm:space-x-3">
                <!-- Mobile Sidebar Toggle Button (Hidden on desktop) -->
                <button onclick="toggleSidebar()" type="button"
                    class="lg:hidden text-zinc-500 dark:text-white hover:bg-zinc-100 dark:hover:bg-[#0a102c] focus:outline-none rounded-lg text-sm p-2 cursor-pointer">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>

                <!-- Toggle Dark Mode -->
                <button id="theme-toggle" type="button"
                    class="text-zinc-500 dark:text-white hover:bg-zinc-100 dark:hover:bg-[#0a102c] focus:outline-none rounded-lg text-sm p-2 cursor-pointer">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Layout -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white dark:bg-[#020721] border-r border-gray-200 dark:border-gray-800 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 transition-transform duration-300 ease-in-out">
            
            <!-- Sidebar Content -->
            <div class="flex flex-col h-full pt-16 lg:pt-0">
                <!-- Navigation Menu -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    
                    <!-- Dashboard -->
                    <a href="{{ route('mentors.dashboard') }}"
                        class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg bg-mmblue/10 text-mmblue dark:bg-mmblue/20 dark:text-blue-300 transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v14l-5-3-5 3V5z"></path>
                        </svg>
                        Dashboard
                    </a>

                    <!-- Ubicación -->
                    <a href="{{ route('mentors.select-location') }}"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Mi Ubicación
                    </a>

                    <!-- Chats -->
                    <a href="{{ route('mentors.chat') }}"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Mis Chats
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>

                    <!-- 
                    <div class="border-t border-gray-200 dark:border-gray-700 my-4"></div>

                   
                    <a href="#"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mis Sesiones
                    </a>

                  
                    <a href="#"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Mis Estudiantes
                    </a>

                  
                    <a href="#"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Mis Materias
                    </a>

                   
                    <a href="#"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        Reseñas
                    </a>

                   
                    <div class="border-t border-gray-200 dark:border-gray-700 my-4"></div>

                 
                    <a href="#"
                        class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-[#0a102c] transition-all duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Configuración
                    </a>-->
                </nav>

                <!-- Footer -->
                <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="text-xs text-gray-500 dark:text-gray-400 text-center">
                        © 2025 MentorMap
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Overlay for Mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 backdrop-blur-md bg-opacity-50 z-20 lg:hidden hidden" onclick="toggleSidebar()"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden lg:ml-0">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-[#0a0e1f] p-4 sm:p-6 lg:p-8">
                
                <!-- Page Header -->
                <div class="mb-6 sm:mb-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">
                                ¡Hola, {{ auth()->user()->name ?? 'Mentor' }}!
                            </h2>
                            <p class="mt-1 text-sm sm:text-base text-gray-600 dark:text-gray-400">
                                Aquí está un resumen de tu actividad como mentor
                            </p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ now()->format('l, F j, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Lista de Sesiones -->
                @livewire('shared.appointments-list')
            </main>
        </div>
    </div>
</div>

<!-- JavaScript for Dashboard Functionality -->
<script>
    // Sidebar Toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    // User Menu Toggle
    function toggleUserMenu() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    }

    // Close user menu when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('user-menu');
        const button = event.target.closest('button');
        
        if (!button || !button.getAttribute('onclick')?.includes('toggleUserMenu')) {
            menu.classList.add('hidden');
        }
    });

    // Close sidebar on larger screens
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('hidden');
        }
    });
</script>