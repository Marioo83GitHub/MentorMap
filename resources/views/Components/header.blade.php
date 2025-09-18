<!-- Modern Header with Backdrop Blur -->
<header class="bg-white/95 dark:bg-[#020721] backdrop-blur-md border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo Section -->
            <div class="flex items-center space-x-3">
                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-mmgreen/20 to-[#33ab35]/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    <div class="relative rounded-xl p-2  transition-all duration-300">
                        <img src="{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}"
                             alt="Mentor Map Logo"
                             class="h-8 w-auto dark:hidden">
                        <img src="{{asset('Logos/white/LogoTextHorizontal.png')}}"
                             alt="Mentor Map Logo"
                             class="h-8 w-auto hidden dark:block">
                    </div>
                </div>
            </div>

            <!-- Modern Navigation -->
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="#" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen font-medium rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-all duration-200 group">
                    <span class="relative z-10">Inicio</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-mmgreen to-[#33ab35] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </a>
                <a href="#" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen font-medium rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-all duration-200 group">
                    <span class="relative z-10">Mentores</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-mmgreen to-[#33ab35] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </a>
                <a href="#categorias" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen font-medium rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-all duration-200 group">
                    <span class="relative z-10">Categorías</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-mmgreen to-[#33ab35] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </a>
                <a href="#" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen font-medium rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-all duration-200 group">
                    <span class="relative z-10">Cómo Funciona</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-mmgreen to-[#33ab35] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </a>
                <a href="#testimonio" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen font-medium rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-all duration-200 group">
                    <span class="relative z-10">Testimonios</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-mmgreen to-[#33ab35] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </a>
            </nav>

            <!-- Modern Action Buttons -->
            <div class="flex items-center space-x-3">
                <!-- Login Button -->
                <a href="{{ route('login') }}"
                   class="hidden sm:flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen font-medium rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-all duration-200">
                    Iniciar Sesión
                </a>

                <!-- Primary CTA Button -->
                <a href="{{ route('login') }}"
                   class="relative group overflow-hidden bg-gradient-to-r from-mmgreen to-[#33ab35] text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#33ab35] to-mmgreen opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <span class="relative flex items-center space-x-2">
                        <span>Encontrar Mentor</span>
                         <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </span>
                </a>
                <div>
                    <button id="theme-toggle" type="button"
                        class="text-zinc-500 dark:text-white hover:bg-zinc-100 dark:hover:bg-[#0a102c] focus:outline-none rounded-lg text-sm p-2 cursor-pointer">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                            </path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Mobile Menu Button -->
                <button class="lg:hidden p-2 rounded-lg hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-colors duration-200" id="mobile-menu-button">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="lg:hidden hidden bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-100/50 dark:border-gray-700/50" id="mobile-menu">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col space-y-3">
                <a href="#" class="px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen hover:bg-gray-50/80 dark:hover:bg-gray-800/80 rounded-lg font-medium transition-all duration-200">Inicio</a>
                <a href="#" class="px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen hover:bg-gray-50/80 dark:hover:bg-gray-800/80 rounded-lg font-medium transition-all duration-200">Mentores</a>
                <a href="#" class="px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen hover:bg-gray-50/80 dark:hover:bg-gray-800/80 rounded-lg font-medium transition-all duration-200">Categorías</a>
                <a href="#" class="px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen hover:bg-gray-50/80 dark:hover:bg-gray-800/80 rounded-lg font-medium transition-all duration-200">Cómo Funciona</a>
                <a href="#testimonio" class="px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen hover:bg-gray-50/80 dark:hover:bg-gray-800/80 rounded-lg font-medium transition-all duration-200">Testimonios</a>
                <div class="border-t border-gray-100 dark:border-gray-700 pt-3">
                    <a href="{{ route('login') }}" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-mmgreen dark:hover:text-mmgreen hover:bg-gray-50/80 dark:hover:bg-gray-800/80 rounded-lg font-medium transition-all duration-200">Iniciar Sesión</a>
                    <a href="{{ route('login') }}" class="block mt-2 bg-gradient-to-r from-mmgreen to-[#33ab35] text-white px-4 py-3 rounded-lg font-semibold text-center shadow-lg transition-all duration-300">Encontrar Mentor</a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
// Mobile menu toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>
