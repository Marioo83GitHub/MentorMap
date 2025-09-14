<!-- Student Dashboard - Professional Layout -->
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
                            class="absolute -inset-2 bg-gradient-to-r from-mmgreen/20 to-[#33ab35]/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-all duration-300">
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
                        Estudiante
                    </h1>
                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">¡Bienvenido de vuelta! Gestiona tu
                        aprendizaje
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
                <!-- agrega otras opciones aqui si desea -->
            </div>
        </div>
    </div>

    <div class="flex flex-row w-full overflow-hidden">

        <x-sidebar-student />

        <!-- Main Content Area -->
        <div class="flex flex-col flex-auto flex-shrink-0 h-full lg:ml-72 ml-0 p-3 sm:p-4 lg:p-6">

            <!-- Calendar Header -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-md border border-gray-200 dark:border-gray-800 mb-6">

                <!-- Calendar Content -->
                <div class="p-0">
                    <!-- FullCalendar CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
                    <style>
                        /* Diseño moderno con fondo blanco para modo claro */
                        #calendar {
                            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
                            border-radius: 1rem;
                            overflow: hidden;
                            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);

                        }

                        /* Toolbar con diseño elegante para modo claro */
                        .fc .fc-toolbar {
                            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
                            backdrop-filter: blur(10px);
                            padding: 1.5rem;
                            border-bottom: 1px solid rgba(229, 231, 235, 0.6);
                        }

                        .fc .fc-toolbar-title {
                            font-size: 1.75rem;
                            font-weight: 700;
                            color: #1f2937;
                            text-shadow: none;
                        }

                        /* Botones con estilo moderno para modo claro */
                        .fc .fc-button {
                            background: linear-gradient(135deg, #1a44d5, #2341af);
                            color: white;
                            font-weight: 600;
                            border-radius: 0.75rem;
                            border: none;
                            padding: 0.75rem 1rem;
                            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.15);
                            transition: all 0.3s ease;
                        }

                        .fc .fc-button:hover,
                        .fc .fc-button-active {
                            background: linear-gradient(135deg, #233b93, #223ea3);
                            transform: translateY(-1px);
                            box-shadow: 0 6px 12px -2px rgba(59, 130, 246, 0.25);
                        }

                        .fc .fc-button:disabled {
                            background: rgba(156, 163, 175, 0.5);
                            transform: none;
                            box-shadow: none;
                        }

                        /* Header de días de la semana para modo claro */
                        .fc .fc-col-header {
                            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 50%, #f9fafb 100%);
                            backdrop-filter: blur(5px);
                        }

                        .fc .fc-col-header-cell {
                            background: transparent;
                            color: #1a44d5;
                            font-weight: 700;
                            font-size: 0.875rem;
                            padding: 1rem 0.5rem;
                            text-transform: uppercase;
                            letter-spacing: 0.05em;
                            border-color: rgba(229, 231, 235, 0.6);
                        }

                        /* Días del calendario con diseño claro y moderno */
                        .fc .fc-daygrid-day {
                            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.7));
                            backdrop-filter: blur(5px);
                            border-color: rgba(229, 231, 235, 0.6);
                            transition: all 0.3s ease;
                            min-height: 90px;
                        }

                        .fc .fc-daygrid-day:hover {
                            background: linear-gradient(135deg, rgba(243, 244, 246, 0.9), rgba(229, 231, 235, 0.8));
                            transform: scale(1.02);
                            z-index: 10;
                            border-color: rgba(59, 130, 246, 0.5);
                            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.15);
                        }

                        /* Números de los días para modo claro */
                        .fc .fc-daygrid-day-number {
                            font-size: 1rem;
                            font-weight: 700;
                            color: #374151;
                            padding: 0.5rem;
                        }

                        /* Día actual con efecto especial para modo claro */
                        .fc .fc-day-today {
                            background: linear-gradient(135deg, rgba(46, 60, 184, 0.3), rgba(5, 15, 150, 0.2));
                            border: 4px solid #1a44d5;
                            box-shadow: 0 0 20px rgba(58, 46, 184, 0.3);
                        }

                        .fc .fc-day-today .fc-daygrid-day-number {
                            color: #1a44d5;
                            background: rgba(59, 78, 246, 0.1);
                            border-radius: 0.5rem;
                            padding: 0.25rem 0.5rem;
                        }

                        /* Eventos con diseño moderno para modo claro */
                        .fc .fc-event {
                            border-radius: 0.75rem;
                            border: none;
                            padding: 0.25rem 0.75rem;
                            font-size: 0.8rem;
                            font-weight: 600;
                            margin: 0.125rem;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(5px);
                            transition: all 0.3s ease;
                        }

                        .fc .fc-event:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                        }

                        /* Scrollbars personalizados para modo claro */
                        .fc-scroller::-webkit-scrollbar {
                            width: 3px;
                        }

                        .fc-scroller::-webkit-scrollbar-track {
                            background: rgba(243, 244, 246, 0.5);
                        }

                        .fc-scroller::-webkit-scrollbar-thumb {
                            background: rgba(59, 62, 246, 0.5);
                            border-radius: 4px;
                        }

                        /* Popover con diseño elegante para modo claro */
                        .fc .fc-popover {
                            background: rgba(255, 255, 255, 0.95);
                            backdrop-filter: blur(20px);
                            border: 1px solid rgba(235, 229, 229, 0.6);
                            border-radius: 1rem;
                            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
                        }

                        .fc .fc-popover-header {
                            background: rgba(59, 130, 246, 0.1);
                            color: #1a44d5;
                            font-weight: 700;
                            border-bottom: 1px solid rgba(229, 231, 235, 0.6);
                        }

                        .fc .fc-popover-body {
                            color: #1a44d5;
                        }

                        /* Fines de semana con tono diferente para modo claro */
                        .fc .fc-day-sat,
                        .fc .fc-day-sun {
                            background: linear-gradient(135deg, rgba(251, 249, 249, 0.9), rgba(243, 244, 246, 0.7));
                        }

                        /* Vista de semana y día con fondo consistente para modo claro */
                        .fc .fc-timegrid-slot {
                            border-color: rgba(229, 231, 235, 0.6);
                            background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(248, 250, 252, 0.5));
                        }

                        .fc .fc-timegrid-axis {
                            color: #6b7280;
                            font-weight: 500;
                            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
                        }

                        .fc .fc-timegrid-col {
                            background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(248, 250, 252, 0.5));
                        }

                        /* Body del calendario para modo claro */
                        .fc .fc-daygrid-body,
                        .fc .fc-timegrid-body {
                            background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), rgba(248, 250, 252, 0.4));
                        }

                        .fc-theme-standard .fc-scrollgrid {
                            border: none;
                        }

                        .fc-theme-standard td,
                        .fc-theme-standard th {
                            border: none;
                        }

                        /* Modo oscuro mejorado para toda la página */
                        .dark #calendar {
                            background: linear-gradient(135deg, #0f172a 0%, #020617 50%, #0f172a 100%);
                            border: 1px solid rgba(75, 85, 99, 0.4);
                        }

                        .dark .fc .fc-toolbar {
                            background: linear-gradient(135deg, #0f172a 0%, #020617 50%, #0f172a 100%);
                            border-bottom: 1px solid rgba(75, 85, 99, 0.4);
                        }

                        .dark .fc .fc-toolbar-title {
                            color: #d8d8d8;
                        }

                        .dark .fc .fc-col-header {
                            background: linear-gradient(135deg, #0f172a 0%, #020617 50%, #0f172a 100%);
                        }

                        .dark .fc .fc-col-header-cell {
                            color: #1a44d5;
                            border-color: rgba(75, 85, 99, 0.4);
                        }

                        .dark .fc .fc-daygrid-day {
                            background: linear-gradient(135deg, rgba(34, 59, 116, 0.186), rgba(18, 31, 87, 0.071));
                            border-color: rgba(75, 85, 99, 0.4);
                        }

                        .dark .fc .fc-daygrid-day:hover {
                            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.6));
                            border-color: rgba(46, 46, 184, 0.5);
                        }

                        .dark .fc .fc-daygrid-day-number {
                            color: #e5e7eb;
                        }

                        .dark .fc .fc-day-today {
                            background: linear-gradient(135deg, rgba(46, 60, 184, 0.3), rgba(5, 15, 150, 0.2));
                            border: 4px solid #1a44d5;
                            box-shadow: 0 0 20px rgba(58, 46, 184, 0.3);
                        }

                        .dark .fc .fc-day-today .fc-daygrid-day-number {
                            color: #1a44d5;
                            background: rgba(46, 48, 184, 0.3);
                        }

                        .dark .fc .fc-day-sat,
                        .dark .fc .fc-day-sun {
                            background: linear-gradient(135deg, rgba(2, 6, 23, 0.8), rgba(15, 23, 42, 0.6));
                        }

                        .dark .fc .fc-timegrid-slot {
                            background: linear-gradient(135deg, rgba(15, 23, 42, 0.4), rgba(2, 6, 23, 0.2));
                            border-color: rgba(75, 85, 99, 0.3);
                        }

                        .dark .fc .fc-timegrid-axis {
                            background: linear-gradient(135deg, #0f172a 0%, #020617 50%, #0f172a 100%);
                            color: #9ca3af;
                        }

                        .dark .fc .fc-timegrid-col {
                            background: linear-gradient(135deg, rgba(15, 23, 42, 0.4), rgba(2, 6, 23, 0.2));
                        }

                        .dark .fc .fc-daygrid-body,
                        .dark .fc .fc-timegrid-body {
                            background: linear-gradient(135deg, rgba(15, 23, 42, 0.3), rgba(2, 6, 23, 0.2));
                        }

                        .fc .fc-daygrid-day-frame {
                            margin-left: 4px;
                            margin-right: 4px;
                        }

                        .dark .fc .fc-button {
                            background: linear-gradient(135deg, #1a44d5, #203faf);
                            border: none;
                        }

                        .dark .fc .fc-button:hover,
                        .dark .fc .fc-button-active {
                            background: linear-gradient(135deg, #233b93, #223ea3);
                        }

                        .dark .fc .fc-button:disabled {
                            background: rgba(75, 85, 99, 0.5);
                        }

                        .dark .fc .fc-popover {
                            background: rgba(15, 23, 42, 0.95);
                            backdrop-filter: blur(20px);
                            border: 1px solid rgba(75, 85, 99, 0.4);
                        }

                        .dark .fc .fc-popover-header {
                            background: rgba(46, 67, 184, 0.1);
                            color: #1a44d5;
                            border-bottom: 1px solid rgba(75, 85, 99, 0.4);
                        }

                        .dark .fc .fc-popover-body {
                            color: #e5e7eb;
                        }

                        .dark .fc-scroller::-webkit-scrollbar-track {
                            background: rgba(15, 23, 42, 0.5);
                        }

                        .dark .fc-scroller::-webkit-scrollbar-thumb {
                            background: rgba(46, 48, 184, 0.5);
                        }

                        /* Mejorar visibilidad de eventos en modo oscuro */
                        .dark .fc .fc-event {
                            border: 2px solid rgba(255, 255, 255, 0.2);
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.1);
                            font-weight: 700;
                            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
                            backdrop-filter: blur(8px);
                        }

                        .dark .fc .fc-event:hover {
                            transform: translateY(-3px) scale(1.05);
                            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4), 0 0 0 2px rgba(255, 255, 255, 0.2);
                            border-color: rgba(255, 255, 255, 0.4);
                        }

                        .dark .fc .fc-event-title {
                            color: #ffffff;
                            font-weight: 700;
                            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
                        }
                    </style>

                    <div
                        class="bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-700/50">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Sessions -->

            <div class="p-6">
                @livewire('shared.appointments-list')
            </div>

        </div>
    </div>
</div>

<!-- FullCalendar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    let calendar;

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        // Eventos de sesiones de ejemplo
        const sessions = [
            {
                title: 'Matemáticas - Dr. García',
                start: '2025-09-22T09:00:00',
                end: '2025-09-22T10:00:00',
                color: '#1a44d5',
                extendedProps: {
                    mentor: 'Dr. García',
                    subject: 'Matemáticas',
                    status: 'scheduled',
                    type: 'session'
                }
            },
            {
                title: 'Física - Prof. López',
                start: '2025-09-22T09:00:00',
                end: '2025-09-22T10:00:00',
                color: '#8b5cf6',
                extendedProps: {
                    mentor: 'Prof. López',
                    subject: 'Física',
                    status: 'scheduled',
                    type: 'session'
                }
            },
            {
                title: 'Programación - Ing. Martínez',
                start: '2025-09-22T09:00:00',
                end: '2025-09-22T10:00:00',
                color: '#1a44d5',
                extendedProps: {
                    mentor: 'Ing. Martínez',
                    subject: 'Programación',
                    status: 'scheduled',
                    type: 'session'
                }
            },
            {
                title: 'Química - Dra. Rodríguez',
                start: '2025-09-22T09:00:00',
                end: '2025-09-22T10:00:00',
                color: '#f59e0b',
                extendedProps: {
                    mentor: 'Dra. Rodríguez',
                    subject: 'Química',
                    status: 'completed',
                    type: 'session'
                }
            },
            {
                title: 'Historia - Prof. Hernández',
                start: '2025-09-25T11:30:00',
                end: '2025-09-25T12:30:00',
                color: '#ef4444',
                extendedProps: {
                    mentor: 'Prof. Hernández',
                    subject: 'Historia',
                    status: 'scheduled',
                    type: 'session'
                }
            }
        ];

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            fixedWeekCount: false,
            showNonCurrentDates: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día'
            },
            events: sessions,
            dayMaxEvents: 3,
            eventClick: function (info) {
                showEventDetails(info.event);
            },
            dayPopoverContent: function (arg) {
                let html = `<div class='p-4 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-xl shadow-2xl w-80 border border-gray-700/50 backdrop-filter backdrop-blur-xl'>`;
                html += `<h3 class='text-lg font-bold text-emerald-400 mb-3 flex items-center gap-2'>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    Sesiones del día
                </h3>`;
                html += `<div class='space-y-2'>`;
                arg.events.forEach(event => {
                    const props = event.extendedProps;
                    const statusText = getStatusText(props.status);
                    html += `<div class='flex items-center gap-3 p-3 rounded-lg bg-gray-800/50 hover:bg-gray-700/50 transition-all duration-300 cursor-pointer border border-gray-700/30 hover:border-gray-600/50' onclick='showEventDetailsFromPopover("${event.id}")'>`;
                    html += `<span class='inline-block w-3 h-3 rounded-full shadow-lg' style='background:${event.backgroundColor || event.color}; box-shadow: 0 0 10px ${event.backgroundColor || event.color}40;'></span>`;
                    html += `<div class='flex-1'>`;
                    html += `<div class='font-semibold text-gray-100'>${event.title}</div>`;
                    html += `<div class='text-xs text-mmgreen'>${event.start.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit' })} - ${statusText}</div>`;
                    html += `</div>`;
                    html += `<svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>`;
                    html += `</div>`;
                });
                html += `</div>`;
                html += `</div>`;
                return { html };
            },
            themeSystem: 'standard',
        });

        calendar.render();

        // Actualiza el modo oscuro si cambia
        function updateDarkMode() {
            if (document.documentElement.classList.contains('dark')) {
                calendarEl.classList.add('dark');
            } else {
                calendarEl.classList.remove('dark');
            }
        }
        updateDarkMode();

        // Escuchar cambios de tema
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === 'class') {
                    updateDarkMode();
                }
            });
        });
        observer.observe(document.documentElement, { attributes: true });
    });

    function getStatusText(status) {
        const statusMap = {
            'scheduled': 'Programada',
            'completed': 'Completada',
            'cancelled': 'Cancelada',
            'in_progress': 'En Progreso'
        };
        return statusMap[status] || status;
    }

    function showEventDetails(event) {
        const props = event.extendedProps;
        const statusText = getStatusText(props.status);
        const startTime = event.start.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit' });
        const endTime = event.end ? event.end.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit' }) : '';
        const date = event.start.toLocaleDateString('es-ES', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        const statusColor = {
            'scheduled': 'bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-200',
            'completed': 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-200',
            'cancelled': 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-200',
            'in_progress': 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200'
        };

        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/20 backdrop-blur-md flex items-center justify-center z-50 p-4';
        modal.style.background = 'linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(55, 65, 81, 0.3))';
        modal.innerHTML = `
            <div class="bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 rounded-2xl max-w-md w-full shadow-2xl border border-gray-200 dark:border-gray-700/50 overflow-hidden backdrop-blur-xl">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-emerald-600/20 dark:to-blue-600/20 backdrop-filter backdrop-blur-xl border-b border-gray-200 dark:border-gray-700/50" style="background: linear-gradient(135deg, ${event.backgroundColor || event.color}20, ${event.backgroundColor || event.color}10);">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">${props.subject}</h3>
                            <p class="text-blue-600 dark:text-emerald-300 text-sm capitalize">${date}</p>
                        </div>
                        <button onclick="this.closest('.fixed').remove()" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white transition-colors p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-white/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-6 space-y-4 bg-gray-50/50 dark:bg-gray-800/50 backdrop-filter backdrop-blur-sm">
                    <div class="flex items-center justify-between p-3 bg-white/70 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600/30">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Mentor:</span>
                        <span class="font-semibold text-gray-900 dark:text-white">${props.mentor}</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/70 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600/30">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Horario:</span>
                        <span class="font-semibold text-blue-600 dark:text-emerald-300">${startTime} - ${endTime}</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/70 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600/30">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Estado:</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-full ${statusColor[props.status] || statusColor.scheduled}">
                            ${statusText}
                        </span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/70 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600/30">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Duración:</span>
                        <span class="font-semibold text-gray-900 dark:text-white">60 minutos</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/70 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600/30">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">Modalidad:</span>
                        <span class="font-semibold text-gray-900 dark:text-white">Online</span>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-200 dark:border-gray-600/50 flex gap-3">
                        ${props.status === 'scheduled' ? `
                            <button class="flex-1 bg-mmgreen hover:from-emerald-700 hover:opacity-80 text-white py-3 px-4 rounded-lg transition-all duration-300 font-semibold shadow-lg hover:shadow-emerald-500/25">
                                Unirse a la sesión
                            </button>
                            <button class="flex-1 bg-gray-200 dark:bg-gray-700/50 hover:bg-gray-300 dark:hover:bg-gray-600/50 text-gray-700 dark:text-gray-300 py-3 px-4 rounded-lg transition-all duration-300 font-semibold border border-gray-300 dark:border-gray-600/50 hover:border-gray-400 dark:hover:border-gray-500/50">
                                Reagendar
                            </button>
                        ` : ''}
                        ${props.status === 'completed' ? `
                            <button class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3 px-4 rounded-lg transition-all duration-300 font-semibold shadow-lg hover:shadow-blue-500/25">
                                Ver notas
                            </button>
                            <button class="flex-1 bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-700 hover:to-yellow-800 text-white py-3 px-4 rounded-lg transition-all duration-300 font-semibold shadow-lg hover:shadow-yellow-500/25">
                                Calificar mentor
                            </button>
                        ` : ''}
                    </div>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Cerrar modal
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.remove();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                modal.remove();
            }
        }, { once: true });
    }

    function showEventDetailsFromPopover(eventId) {
        const event = calendar.getEventById(eventId);
        if (event) {
            showEventDetails(event);
        }
    }

    // Función para actualizar el mini calendario cuando cambie la vista principal
    calendar.on('datesSet', function (info) {
        const date = info.view.currentStart;
        generateMiniCalendar(date.getMonth(), date.getFullYear());
    });

    // Generar mini calendario inicial
    generateMiniCalendar(new Date().getMonth(), new Date().getFullYear());

    function generateMiniCalendar(month, year) {
        const today = new Date();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const miniGrid = document.getElementById('mini-calendar-grid');
        const monthNames = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        if (!miniGrid) return;

        document.getElementById('mini-calendar-month').textContent = `${monthNames[month]} ${year}`;
        miniGrid.innerHTML = '';

        // Empty cells for days before month starts
        for (let i = 0; i < firstDay; i++) {
            const emptyDay = document.createElement('div');
            emptyDay.className = 'text-center py-1';
            miniGrid.appendChild(emptyDay);
        }

        // Days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            const isToday = day === today.getDate() && month === today.getMonth() && year === today.getFullYear();

            let classes = 'text-center py-1 cursor-pointer rounded text-xs';
            if (isToday) {
                classes += ' bg-mmgreen text-white font-bold';
            } else {
                classes += ' text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600';
            }

            dayElement.className = classes;
            dayElement.textContent = day;

            // Click en mini calendario para navegar
            dayElement.addEventListener('click', () => {
                const clickedDate = new Date(year, month, day);
                calendar.gotoDate(clickedDate);
            });

            miniGrid.appendChild(dayElement);
        }
    }
</script>