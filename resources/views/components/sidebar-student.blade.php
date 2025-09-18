<!-- Sidebar Overlay (Mobile only) -->
<div id="sidebar-overlay" onclick="toggleSidebar()"
    class="fixed inset-0 backdrop-filter backdrop-blur-xl bg-opacity-50 z-30 lg:hidden hidden"></div>

<!-- Left Sidebar - Control Panel (Fixed) -->
<div id="sidebar"
    class="w-72 flex flex-col flex-shrink-0 bg-white/95 dark:bg-[#020721] backdrop-blur-md shadow-lg border-r border-gray-200 dark:border-gray-800 transition-all duration-300 h-screen lg:h-full fixed left-0 top-0 lg:top-[73px] z-40 overflow-y-auto pt-[73px] lg:pt-0
            lg:translate-x-0 -translate-x-full lg:block">

    <!-- User Profile Section -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-4">
            <div
                class="w-16 h-16 bg-gradient-to-r from-mmblue to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                <span
                    class="text-white font-bold text-xl">{{ substr(auth()->user()->name ?? 'Estudiante', 0, 2) }}</span>
            </div>
            <div class="min-w-0 flex-1">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate"
                    title="{{ auth()->user()->name ?? 'Estudiante' }}">
                    {{ auth()->user()->name ?? 'Estudiante' }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 truncate"
                    title="{{ auth()->user()->email ?? 'Correo Estudiante' }}">
                    {{ auth()->user()->email ?? 'Correo Estudiante' }}
                </p>
                <!--
                        <p class="text-sm text-gray-600 dark:text-gray-400">Nivel: Intermedio</p>
                        <div class="flex items-center mt-1">
                            <div class="w-20 h-2 bg-gray-200 dark:bg-gray-700 rounded-full mr-2">
                                <div class="w-3/4 h-2 bg-gradient-to-r from-mmblue to-blue-600 rounded-full"></div>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">75%</span>
                        </div> -->
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    {{-- <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4 uppercase tracking-wide">
            Estadísticas</h4>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Sesiones
                        Completadas</span>
                </div>
                <span class="text-lg font-bold text-blue-600 dark:text-blue-400">12</span>
            </div>

            <div class="flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-100 dark:bg-green-800 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Horas de Estudio</span>
                </div>
                <span class="text-lg font-bold text-mmgreen dark:text-green-400">48h</span>
            </div>

            <div class="flex items-center justify-between p-3 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-purple-100 dark:bg-purple-800 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Mentores Activos</span>
                </div>
                <span class="text-lg font-bold text-purple-600 dark:text-purple-400">3</span>
            </div>
        </div>
    </div> --}}

    <!-- Navigation Menu -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4 uppercase tracking-wide">
            Navegación</h4>
        <nav class="space-y-2">
            <a href="{{ route('students.search-mentor') }}"
                class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-mmblue" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="font-medium">Buscar Mentores</span>
            </a>

            <a href="{{ route('students.chat') }}"
                class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-mmblue" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                <span class="font-medium">Mis Chats</span>
                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">2</span>
            </a>
            <a href="{{ route('logout') }}"
                class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-mmblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="font-medium">Cerrar Sesión</span>
            </a>

            <!-- <a href="#"
                       class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-mmblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="font-medium">Mis Materias</span>
                    </a>

                    <a href="#"
                       class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-mmblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="font-medium">Mi Progreso</span>
                    </a>

                    <a href="#"
                       class="flex items-center space-x-3 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-mmblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="font-medium">Pagos</span>
                    </a> -->
        </nav>
    </div>
</div>

<script>
    // Función para toggle del sidebar móvil
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        if (sidebar && overlay) {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');

            // Prevent body scroll when sidebar is open on mobile
            if (!sidebar.classList.contains('-translate-x-full')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    }

    // Cerrar sidebar al hacer click en el overlay
    document.addEventListener('DOMContentLoaded', function() {
        const overlay = document.getElementById('sidebar-overlay');
        if (overlay) {
            overlay.addEventListener('click', function() {
                toggleSidebar();
            });
        }

        // Cerrar sidebar automáticamente cuando la pantalla sea grande
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (window.innerWidth >= 1024) { // lg breakpoint
                if (sidebar) sidebar.classList.add('-translate-x-full');
                if (overlay) overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    });
</script>
