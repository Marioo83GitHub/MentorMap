<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>

        @vite('resources/css/app.css')

        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

        {{-- Leaflet CDN --}}
        {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> --}}
    </head>
    <body class="bg-white dark:bg-[#020617] relative">
        <!-- Script para aplicar el modo oscuro inmediatamente -->
        <script>
            // Aplicar el modo oscuro inmediatamente para evitar el flash
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <!-- Fondo con Superposición de Gradiente Dual -->
        <!-- Fondo claro -->
        <div class="fixed inset-0 z-0 dark:hidden"
            style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.8) 1px, transparent 1px), linear-gradient(to bottom, rgba(255, 255, 255, 0.8) 1px, transparent 1px), radial-gradient(circle 500px at 20% 100%, rgba(179, 166, 166, 0.3), transparent), radial-gradient(circle 500px at 100% 80%, rgba(165, 154, 154, 0.3), transparent); background-size: 48px 48px, 48px 48px, 100% 100%, 100% 100%;">
        </div>

        <!-- Fondo oscuro con orbe magenta -->
        <div class="fixed inset-0 z-0 hidden dark:block"
            style="background: #020617; background-image: linear-gradient(to right, rgba(71,85,105,0.15) 1px, transparent 1px), linear-gradient(to bottom, rgba(71,85,105,0.15) 1px, transparent 1px), radial-gradient(circle at 50% 60%, rgba(72, 236, 99, 0.15) 0%, rgba(168,85,247,0.05) 40%, transparent 70%); background-size: 40px 40px, 40px 40px, 100% 100%;">
        </div>
        {{ $slot }}

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script>
            // Función para inicializar el modo oscuro
            function initializeTheme() {
                // Aplicar el tema actual basado en localStorage o preferencia del sistema
                function applyTheme() {
                    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        document.documentElement.classList.add('dark');
                        return 'dark';
                    } else {
                        document.documentElement.classList.remove('dark');
                        return 'light';
                    }
                }

                // Aplicar tema inmediatamente
                const currentTheme = applyTheme();

                // Configurar iconos del toggle si existen
                function updateToggleIcons(theme) {
                    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                    if (themeToggleDarkIcon && themeToggleLightIcon) {
                        if (theme === 'dark') {
                            themeToggleLightIcon.classList.remove('hidden');
                            themeToggleDarkIcon.classList.add('hidden');
                        } else {
                            themeToggleDarkIcon.classList.remove('hidden');
                            themeToggleLightIcon.classList.add('hidden');
                        }
                    }
                }

                // Actualizar iconos inicialmente
                updateToggleIcons(currentTheme);

                // Configurar event listener para el botón toggle
                const themeToggleBtn = document.getElementById('theme-toggle');
                if (themeToggleBtn) {
                    // Remover event listeners existentes para evitar duplicados
                    themeToggleBtn.removeEventListener('click', handleThemeToggle);
                    themeToggleBtn.addEventListener('click', handleThemeToggle);
                }

                function handleThemeToggle() {
                    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                    // Toggle iconos
                    if (themeToggleDarkIcon && themeToggleLightIcon) {
                        themeToggleDarkIcon.classList.toggle('hidden');
                        themeToggleLightIcon.classList.toggle('hidden');
                    }

                    // Toggle tema
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            }

            // Ejecutar inmediatamente
            initializeTheme();

            // Ejecutar cuando el DOM esté completamente cargado
            document.addEventListener('DOMContentLoaded', function() {
                // Delay pequeño para asegurar que todos los elementos estén cargados
                setTimeout(initializeTheme, 100);
            });

            // Ejecutar en Livewire loaded (para compatibilidad con Livewire)
            document.addEventListener('livewire:navigated', function() {
                setTimeout(initializeTheme, 100);
            });
        </script>

    </body>
</html>
