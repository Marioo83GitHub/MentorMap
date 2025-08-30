<div class="min-h-screen w-full bg-white dark:bg-[#020617] relative">
    <!-- CSS de AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Fondo con Superposición de Gradiente Dual -->
    <!-- Fondo claro -->
    <div class="fixed inset-0 z-0 dark:hidden"
        style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.8) 1px, transparent 1px), linear-gradient(to bottom, rgba(255, 255, 255, 0.8) 1px, transparent 1px), radial-gradient(circle 500px at 20% 100%, rgba(179, 166, 166, 0.3), transparent), radial-gradient(circle 500px at 100% 80%, rgba(165, 154, 154, 0.3), transparent); background-size: 48px 48px, 48px 48px, 100% 100%, 100% 100%;">
    </div>
    
    <!-- Fondo oscuro con orbe magenta -->
    <div class="fixed inset-0 z-0 hidden dark:block"
        style="background: #020617; background-image: linear-gradient(to right, rgba(71,85,105,0.15) 1px, transparent 1px), linear-gradient(to bottom, rgba(71,85,105,0.15) 1px, transparent 1px), radial-gradient(circle at 50% 60%, rgba(72, 236, 99, 0.15) 0%, rgba(168,85,247,0.05) 40%, transparent 70%); background-size: 40px 40px, 40px 40px, 100% 100%;">
    </div>
    

    <!-- Encabezado -->
    <x-header />

    <!-- Sección Hero -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Contenido Izquierdo -->
                <div class="space-y-8" data-aos="fade-right">
                    <!-- Insignia -->
                    <div class="inline-flex items-center px-4 py-2 bg-green-50 dark:bg-green-900/20 rounded-full border border-green-200 dark:border-green-800"
                        data-aos="fade-up" data-aos-delay="100">
                        <span class="text-green-600 dark:text-green-400 text-sm font-medium">Plataforma de Mentoría Profesional</span>
                    </div>

                    <div class="space-y-6">
                        <h1 class="text-4xl lg:text-5xl font-bold text-green-900 dark:text-white leading-tight" data-aos="fade-up"
                            data-aos-delay="200">
                            Conecta con mentores
                            expertos y acelera
                            tu crecimiento profesional.
                        </h1>
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                            Plataforma líder de mentoría que conecta estudiantes y profesionales con
                            mentores expertos a través de sesiones virtuales personalizadas y herramientas
                            colaborativas.
                        </p>
                    </div>

                    <!-- Características -->
                    <div class="flex items-center space-x-8">
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 bg-[#1A44D5] rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600 dark:text-gray-300">Sesiones 1 a 1</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 bg-[#1A44D5] rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600 dark:text-gray-300">Mentores Verificados</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 bg-[#1A44D5] rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600 dark:text-gray-300">Seguimiento de Progreso</span>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('login') }}"
                            class="bg-[#2EB830] text-white px-8 py-4 rounded-lg hover:bg-[#33ab35] transition-all font-semibold text-center inline-flex items-center justify-center">
                            Encontrar Mentor
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 px-8 py-4 rounded-lg hover:border-gray-400 dark:hover:border-gray-500 transition-all font-semibold text-center inline-flex items-center justify-center">
                            <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Ver Demo
                        </a>
                    </div>

                    <!-- Estadísticas -->
                    <div class="flex items-center space-x-8 pt-4">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=50&h=50&fit=crop&crop=face"
                                alt="User 1">
                            <img class="w-8 h-8 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop&crop=face"
                                alt="User 2">
                            <img class="w-8 h-8 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=50&h=50&fit=crop&crop=face"
                                alt="User 3">
                            <img class="w-8 h-8 rounded-full border-2 border-white"
                                src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=50&h=50&fit=crop&crop=face"
                                alt="User 4">
                            <div
                                class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white flex items-center justify-center">
                                <span class="text-xs text-gray-600 font-medium">+</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <span class="font-bold text-gray-900 dark:text-white">1,500+ profesionales</span> confían en nuestra
                                plataforma
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contenido Derecho - Ilustración Hero -->
                <div data-aos="fade-up" onmousemove="handleMouseMove(event)" onmouseleave="resetTransform(event)"
                    class="perspective relative flex items-center justify-center">
                    <img class="image-wrapper" src="{{asset('Logos/ilustration.png')}}" alt=""
                        style="width:700px; max-width:100%; height:auto;" />
                </div>
            </div>
        </div>
    </section>

    <!-- CSS Mejorado para Efectos 3D -->
    <style>
        .perspective {
            perspective: 400px;
        }

        .image-wrapper {
            transition: transform 0.1s ease-out;
            transform-style: preserve-3d;
        }

        .image-wrapper:hover {
            transform: translateZ(20px);
        }
    </style>

    <script>
        const handleMouseMove = (event) => {
            const container = event.currentTarget;
            const rect = container.getBoundingClientRect();
            const wrapper = container.querySelector('.image-wrapper');

            const x = event.clientX - rect.left - rect.width / 2;
            const y = event.clientY - rect.top - rect.height / 2;

            const rotationX = (-y / rect.height) * 15;
            const rotationY = (x / rect.width) * 15;

            wrapper.style.transform = `rotateX(${rotationX}deg) rotateY(${rotationY}deg) translateZ(20px)`;
        };

        const resetTransform = (event) => {
            const wrapper = event.currentTarget.querySelector('.image-wrapper');
            wrapper.style.transform = 'rotateX(0deg) rotateY(0deg) translateZ(0px)';
        };
    </script>

    <!-- Sección de Estadísticas -->
    <section class="relative z-10 py-16 bg-[#1A44D5] dark:bg-[#142872]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center text-white">
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-4xl font-bold mb-2">870</h3>
                    <p class="text-blue-200">Tutores expertos</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-4xl font-bold mb-2">20,000+</h3>
                    <p class="text-blue-200">Estudiantes satisfechos</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-4xl font-bold mb-2">298</h3>
                    <p class="text-blue-200">Materias cubiertas</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-4xl font-bold mb-2">72,920</h3>
                    <p class="text-blue-200">Horas de clases</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Beneficios -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="text-sm text-[#2EB830] dark:text-green-400 font-semibold mb-2 tracking-wide uppercase">POR QUÉ ELEGIRNOS</div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Beneficios de los servicios de tutoría en línea con nosotros
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Descubre las ventajas únicas que ofrecemos para transformar tu experiencia de aprendizaje y acelerar
                    tu crecimiento académico y profesional.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Enseñanza Uno a Uno -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 text-center">Enseñanza Personalizada</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed mb-4">La educación personalizada elimina las
                            distracciones y te mantiene enfocado en tu aprendizaje con el mejor recurso disponible.</p>
                        <div class="text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                100% Personalizado
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Disponibilidad 24/7 -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 text-center">Disponibilidad Total</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed mb-4">Nuestros mentores están disponibles
                            cuando los necesites, adaptándose completamente a tu horario y zona horaria.</p>
                        <div class="text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 border border-green-200 dark:border-green-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                24/7 Disponible
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Pizarra Interactiva -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-orange-400 to-orange-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 text-center">Herramientas Avanzadas</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed mb-4">Tecnología de pizarra interactiva que
                            permite una experiencia de aprendizaje inmersiva y colaborativa en tiempo real.</p>
                        <div class="text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tecnología Avanzada
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Precios Accesibles -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 text-center">Precios Accesibles</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed mb-4">Educación de alta calidad a precios
                            justos. Invierte en tu futuro sin comprometer tu presupuesto actual.</p>
                        <div class="text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-200">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732L14.146 12.8l-1.179 4.456a1 1 0 01-1.934 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732L9.854 7.2l1.179-4.456A1 1 0 0112 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Mejor Valor
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fila Adicional de Beneficios -->
            <div class="grid md:grid-cols-3 gap-8 mt-12">
                <!-- Mentores Certificados -->
                <div
                    class="group relative bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[#2EB830] to-[#25a028] rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Mentores Certificados</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Profesionales verificados con experiencia comprobada</p>
                        </div>
                    </div>
                </div>

                <!-- Seguimiento de Progreso -->
                <div
                    class="group relative bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Seguimiento de Progreso</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Monitorea tu avance con métricas detalladas</p>
                        </div>
                    </div>
                </div>

                <!-- Horarios Flexibles -->
                <div
                    class="group relative bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Horarios Flexibles</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Programa sesiones que se adapten a tu estilo de vida</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Tutor Profesional -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Ilustración Izquierda -->
                <div class="relative">
                    <div
                        class="bg-gradient-to-br from-blue-50 via-white to-green-50 dark:from-blue-900 dark:via-gray-100 dark:to-green-900 rounded-3xl p-12 relative overflow-hidden shadow-2xl border border-gray-100">
                        <!-- Formas geométricas de fondo -->
                        <div class="absolute inset-0">
                            <div
                                class="absolute top-0 right-0 w-36 h-36 bg-gradient-to-bl from-indigo-500/10 to-transparent rounded-full blur-xl">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-purple-500/10 to-transparent rounded-full blur-xl">
                            </div>
                            <div
                                class="absolute top-1/3 left-1/3 w-20 h-20 bg-gradient-to-r from-cyan-500/5 to-blue-500/5 rounded-full blur-lg">
                            </div>
                        </div>

                        <!-- Animación de Flujo de Conocimiento -->
                        <div class="absolute top-6 left-6 bg-white dark:bg-gray-800 rounded-xl p-3 shadow-xl border border-gray-50 dark:border-gray-700">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="w-3 h-3 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full animate-pulse">
                                </div>
                                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">Ideas</span>
                            </div>
                            <div class="mt-2 flex space-x-1">
                                <div class="w-1 h-4 bg-yellow-400 rounded-full"></div>
                                <div class="w-1 h-3 bg-orange-400 rounded-full"></div>
                                <div class="w-1 h-5 bg-red-400 rounded-full"></div>
                                <div class="w-1 h-2 bg-pink-400 rounded-full"></div>
                            </div>
                        </div>

                        <!-- Avatar Principal del Experto -->
                        <div class="relative z-10 flex items-center justify-center">
                            <div class="relative group">
                                <!-- Avatar del Experto con Diseño Profesional -->
                                <div
                                    class="w-40 h-40 bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 rounded-3xl flex items-center justify-center relative shadow-2xl border-4 border-white transform hover:scale-105 transition-all duration-300">
                                    <!-- Icono de Experto -->
                                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>

                                    <!-- Insignia de Experiencia -->
                                    <div
                                        class="absolute -top-3 -right-3 w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full border-3 border-white shadow-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>

                                    <!-- Auriculares Profesionales -->
                                    <div
                                        class="absolute -right-4 top-8 w-12 h-8 bg-gradient-to-r from-gray-800 to-gray-900 rounded-xl shadow-lg border border-gray-700 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                    </div>

                                    <!-- Micrófono -->
                                    <div
                                        class="absolute -right-2 top-20 w-3 h-8 bg-gradient-to-b from-gray-700 to-gray-800 rounded-full shadow-lg">
                                    </div>
                                </div>

                                <!-- Efectos de Conocimiento Emanando -->
                                <div
                                    class="absolute -top-2 -left-2 w-4 h-4 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full animate-bounce opacity-80">
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 w-3 h-3 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full animate-bounce delay-150 opacity-80">
                                </div>
                                <div
                                    class="absolute top-1/2 -left-4 w-2 h-2 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full animate-ping opacity-60">
                                </div>
                            </div>
                        </div>

                        <!-- Pizarra Interactiva -->
                        <div class="absolute top-6 right-6 bg-white dark:bg-gray-800 rounded-xl p-3 shadow-xl border border-gray-50 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">Pizarra</span>
                                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                            </div>
                            <div class="space-y-1">
                                <div class="w-8 h-1 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full"></div>
                                <div class="w-6 h-1 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full"></div>
                                <div class="w-7 h-1 bg-gradient-to-r from-orange-400 to-red-500 rounded-full"></div>
                            </div>
                        </div>

                        <!-- Etiquetas de Especialización en Materias -->
                        <div
                            class="absolute bottom-6 left-6 bg-white dark:bg-gray-800 rounded-xl p-3 shadow-xl border border-gray-50 dark:border-gray-700 max-w-36">
                            <div class="text-xs font-semibold text-gray-600 dark:text-gray-300 mb-2">Especialidades</div>
                            <div class="flex flex-wrap gap-1">
                                <span
                                    class="px-2 py-1 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-xs rounded-full">Math</span>
                                <span
                                    class="px-2 py-1 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs rounded-full">CS</span>
                                <span
                                    class="px-2 py-1 bg-gradient-to-r from-purple-500 to-pink-600 text-white text-xs rounded-full">Physics</span>
                            </div>
                        </div>

                        <!-- Indicador de Calidad de Comunicación -->
                        <div class="absolute bottom-6 right-6 bg-white dark:bg-gray-800 rounded-xl p-3 shadow-xl border border-gray-50 dark:border-gray-700">
                            <div class="flex items-center space-x-2 mb-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">Audio</span>
                            </div>
                            <div class="flex space-x-1">
                                <div class="w-1 h-4 bg-green-500 rounded-full"></div>
                                <div class="w-1 h-5 bg-green-500 rounded-full"></div>
                                <div class="w-1 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-1 h-4 bg-green-400 rounded-full"></div>
                                <div class="w-1 h-2 bg-green-300 rounded-full"></div>
                            </div>
                        </div>

                        <!-- Partículas Flotantes de Conocimiento -->
                        <div
                            class="absolute top-16 right-20 w-2 h-2 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full animate-float opacity-70">
                        </div>
                        <div
                            class="absolute bottom-20 left-16 w-3 h-3 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full animate-float delay-300 opacity-60">
                        </div>
                        <div
                            class="absolute top-32 left-20 w-1.5 h-1.5 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full animate-float delay-500 opacity-80">
                        </div>
                    </div>
                </div>

                <!-- Contenido Derecho -->
                <div>
                    <div class="text-sm text-[#2EB830] dark:text-green-400 font-medium mb-2"> ENCUENTRA UN PROFESOR PARA TUS SESIONES</div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                        Tutor en línea profesional personalizado a tu horario
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        Nuestra plataforma de tutoría en línea fue creada para adaptarse a las vidas ocupadas de los
                        estudiantes donde
                        los estudiantes tienen acceso a los mejores tutores de todo el mundo. Aprende de expertos
                        que tienen experiencia en el mundo real y ofrecen lecciones personalizadas a precios asequibles
                        sin
                        comprometer la calidad. El mejor sistema de programación de clases en línea es todo
                        planes y pagos flexibles por primera vez.
                    </p>
                    <a href="{{ route('login') }}"
                        class="bg-[#2EB830] text-white px-8 py-4 rounded-lg hover:bg-[#33ab35] transition-all font-semibold text-center inline-flex items-center justify-center">
                        Encontrar Mentor
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Tutores Calificados -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Contenido Izquierdo -->
                <div>
                    <div class="text-sm text-[#2EB830] dark:text-green-400 font-medium mb-2">EXPERIMENTA EL ÉXITO DEL APRENDIZAJE EN LÍNEA
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                        Tutores Talentosos y Calificados para Ayudarte
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        La ayuda de tutoría conecta a los estudiantes con tutores de clase mundial con solo hacer clic
                        en un botón, ya sea que los estudiantes estén en casa, en la escuela, incluso cuando están en
                        movimiento y participando en actividades extracurriculares. Los estudiantes tienen acceso a
                        nuestros profesores calificados para apoyar cada materia que enseñan y todos ellos son
                        verificados por sus calificaciones y experiencia para proporcionar una gran experiencia de
                        aprendizaje para los estudiantes en varias fases educativas.
                    </p>
                    <a href="{{ route('login') }}"
                        class="bg-[#2EB830] text-white px-8 py-4 rounded-lg hover:bg-[#33ab35] transition-all font-semibold text-center inline-flex items-center justify-center">
                        Encontrar Mentor
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>

                <!-- Ilustración Derecha -->
                <div class="relative">
                    <div
                        class="bg-gradient-to-br from-blue-50 via-white to-green-50 dark:from-blue-900 dark:via-gray-100 dark:to-green-900 rounded-3xl p-12 relative overflow-hidden shadow-2xl border border-gray-100">
                        <!-- Formas geométricas de fondo -->
                        <div class="absolute inset-0">
                            <div
                                class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-[#2EB830]/10 to-transparent rounded-full blur-xl">
                            </div>
                            <div
                                class="absolute bottom-0 right-0 w-40 h-40 bg-gradient-to-tl from-blue-500/10 to-transparent rounded-full blur-xl">
                            </div>
                            <div
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-gradient-to-r from-purple-500/5 to-pink-500/5 rounded-full blur-lg">
                            </div>
                        </div>

                        <!-- Tarjeta de Análisis de Progreso -->
                        <div
                            class="absolute top-6 left-6 bg-white dark:bg-gray-800 rounded-xl p-4 shadow-xl border border-gray-50 dark:border-gray-700 backdrop-blur-sm">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">Progreso</span>
                                <span class="text-xs text-[#2EB830] font-bold">+24%</span>
                            </div>
                            <div class="flex items-end space-x-1.5">
                                <div class="w-3 h-8 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg shadow-sm">
                                </div>
                                <div
                                    class="w-3 h-6 bg-gradient-to-t from-[#2EB830] to-green-400 rounded-t-lg shadow-sm">
                                </div>
                                <div
                                    class="w-3 h-10 bg-gradient-to-t from-purple-500 to-purple-400 rounded-t-lg shadow-sm">
                                </div>
                                <div
                                    class="w-3 h-7 bg-gradient-to-t from-orange-500 to-orange-400 rounded-t-lg shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Interacción Principal Mentor-Estudiante -->
                        <div class="relative z-10 flex items-center justify-center">
                            <!-- Entorno de Aprendizaje Virtual -->
                            <div class="relative">
                                <!-- Avatar del Mentor -->
                                <div class="relative">
                                    <div
                                        class="w-32 h-32 bg-gradient-to-br from-[#2EB830] to-green-600 rounded-2xl flex items-center justify-center shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition-transform duration-300">
                                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <!-- Estado En Línea -->
                                    <div
                                        class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 rounded-full border-3 border-white dark:border-gray-800 shadow-lg flex items-center justify-center">
                                        <div class="w-2 h-2 bg-white dark:bg-gray-800 rounded-full"></div>
                                    </div>
                                </div>

                                <!-- Línea de Conexión -->
                                <div class="absolute top-1/2 left-full transform -translate-y-1/2 w-16 h-0.5">
                                    <div
                                        class="w-full h-full bg-gradient-to-r from-[#2EB830] to-blue-500 rounded-full opacity-60">
                                    </div>
                                    <div
                                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3 h-3 bg-white dark:bg-gray-800 border-2 border-[#2EB830] rounded-full shadow-lg animate-pulse">
                                    </div>
                                </div>

                                <!-- Avatar del Estudiante -->
                                <div
                                    class="absolute top-0 left-48 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                                    <div
                                        class="w-28 h-28 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-2xl border-4 border-white">
                                        <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        </svg>
                                    </div>
                                    <!-- Insignia de Aprendizaje -->
                                    <div
                                        class="absolute -bottom-2 -right-2 w-6 h-6 bg-orange-500 rounded-full border-3 border-white shadow-lg flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Herramientas de Aprendizaje Interactivo -->
                        <div class="absolute top-6 right-6 bg-white rounded-xl p-3 shadow-xl border border-gray-50">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-xs font-medium text-gray-600">En vivo</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="w-4 h-4 bg-gradient-to-br from-red-500 to-red-600 rounded shadow-sm"></div>
                                <div class="w-4 h-4 bg-gradient-to-br from-blue-500 to-blue-600 rounded shadow-sm">
                                </div>
                                <div class="w-4 h-4 bg-gradient-to-br from-green-500 to-green-600 rounded shadow-sm">
                                </div>
                                <div class="w-4 h-4 bg-gradient-to-br from-purple-500 to-purple-600 rounded shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Notificación de Logro -->
                        <div
                            class="absolute bottom-6 left-6 bg-white rounded-xl p-3 shadow-xl border border-gray-50 max-w-32">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="w-6 h-6 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-gray-800">¡Logro!</div>
                                    <div class="text-xs text-gray-500">+150 pts</div>
                                </div>
                            </div>
                        </div>

                        <!-- Indicador de Calidad de Video -->
                        <div class="absolute bottom-6 right-6 bg-white rounded-xl p-3 shadow-xl border border-gray-50">
                            <div class="flex items-center space-x-2 mb-1">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                </svg>
                                <span class="text-xs font-medium text-gray-600">HD</span>
                            </div>
                            <div class="flex space-x-1">
                                <div class="w-1 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-1 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-1 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-1 h-2 bg-green-400 rounded-full"></div>
                                <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Materias -->
    <section id="categorias" class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="text-sm text-[#2EB830] dark:text-green-400 font-semibold mb-2 tracking-wide uppercase">NUESTRA EXPERIENCIA EN
                    MATERIAS</div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Encuentra tutor en línea en cualquier materia
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Conecta con expertos certificados en las áreas que más necesitas. Nuestros mentores especializados
                    te ayudarán a alcanzar tus objetivos académicos y profesionales.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Ciencia de Datos -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Ciencia de Datos</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">Análisis estadístico, machine
                            learning y visualización de datos</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">120+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Programación -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Programación</h3>
                        <p class="text-sm text-gray-600 text-center leading-relaxed">Desarrollo web, móvil y software
                            con las últimas tecnologías</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">200+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Idiomas -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="300">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Idiomas</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">Inglés, francés, alemán y más
                            idiomas con nativos</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">85+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Negocios -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="400">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-orange-400 to-orange-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01" />
                            </svg>

                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Negocios</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">Emprendimiento, marketing digital y
                            estrategias comerciales</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">150+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Diseño -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="500">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-pink-400 to-pink-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                            </svg>

                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Diseño</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">UX/UI, diseño gráfico y creatividad
                            digital</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-800">95+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Ingeniería -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="600">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-indigo-400 to-indigo-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Ingeniería</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">Matemáticas, física y ciencias
                            aplicadas</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">110+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Psicología -->
                <div class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="700">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-teal-400 to-teal-600 opacity-10 rounded-bl-full">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center">Psicología</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">Desarrollo personal y bienestar
                            mental</p>
                        <div class="mt-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800">75+
                                mentores</span>
                        </div>
                    </div>
                </div>

                <!-- Más Materias -->
                <div class="group relative bg-gradient-to-br from-[#2EB830] to-[#25a028] p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 text-white overflow-hidden"
                    data-aos="zoom-in" data-aos-delay="800">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-10 rounded-bl-full"></div>
                    <div class="relative z-10 text-center">
                        <div
                            class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold dark:text-white mb-2">Más Materias</h3>
                        <p class="text-sm opacity-90 dark:text-gray-300 leading-relaxed mb-4">Historia, medicina, derecho y muchas más
                            especialidades</p>
                        <a href="#" class="inline-flex items-center text-sm font-semibold hover:underline dark:text-white">
                            Ver todas
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonios de usuarios -->
    <section class="py-20 px-4 relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Encabezado de la sección -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="text-sm text-[#2EB830] dark:text-green-400 font-semibold mb-2 tracking-wide uppercase">Testimonios</div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Lo que dicen nuestros estudiantes
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    Descubre cómo MentorMap ha transformado la experiencia educativa de miles de estudiantes alrededor del mundo
                </p>
            </div>

            <!-- Grid de testimonios -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonio 1 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 transform transition-all duration-300 hover:-translate-y-2">
                        <!-- Estrellas -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        
                        <blockquote class="text-gray-700 dark:text-gray-300 mb-6 text-base leading-relaxed">
                            "MentorMap cambió completamente mi forma de estudiar. La IA personalizada me ayudó a identificar mis puntos débiles y me guió paso a paso hasta dominar Cálculo. ¡Increíble!"
                        </blockquote>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                M
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">María González</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Estudiante de Ingeniería</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 transform transition-all duration-300 hover:-translate-y-2">
                        <!-- Estrellas -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        
                        <blockquote class="text-gray-700 dark:text-gray-300 mb-6 text-base leading-relaxed">
                            "Las explicaciones interactivas y los ejercicios adaptativos me ayudaron a aprobar Física con la mejor nota de mi clase. El mentor virtual es como tener un profesor 24/7."
                        </blockquote>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                C
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Carlos Rodríguez</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Estudiante de Bachillerato</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 3 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 transform transition-all duration-300 hover:-translate-y-2">
                        <!-- Estrellas -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        
                        <blockquote class="text-gray-700 dark:text-gray-300 mb-6 text-base leading-relaxed">
                            "Lo que más me gusta es que se adapta a mi ritmo de aprendizaje. Química era mi pesadilla, pero ahora es una de mis materias favoritas gracias a MentorMap."
                        </blockquote>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                A
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Ana Martínez</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Estudiante Universitaria</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 4 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 transform transition-all duration-300 hover:-translate-y-2">
                        <!-- Estrellas -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        
                        <blockquote class="text-gray-700 dark:text-gray-300 mb-6 text-base leading-relaxed">
                            "La gamificación y las recompensas hacen que estudiar sea divertido. He mejorado en todas mis materias y mi motivación está por las nubes."
                        </blockquote>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-red-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                D
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Diego López</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Estudiante de Preparatoria</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 5 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="500">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 transform transition-all duration-300 hover:-translate-y-2">
                        <!-- Estrellas -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        
                        <blockquote class="text-gray-700 dark:text-gray-300 mb-6 text-base leading-relaxed">
                            "Como madre, ver el progreso de mi hija en tiempo real me da mucha tranquilidad. Los reportes detallados me ayudan a apoyarla mejor en casa."
                        </blockquote>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                L
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Laura Fernández</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Madre de familia</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 6 -->
                <div class="group relative" data-aos="fade-up" data-aos-delay="600">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 transform transition-all duration-300 hover:-translate-y-2">
                        <!-- Estrellas -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        
                        <blockquote class="text-gray-700 dark:text-gray-300 mb-6 text-base leading-relaxed">
                            "Los simulacros de exámenes y las evaluaciones continuas me prepararon perfectamente para mis exámenes finales. Obtuve las mejores calificaciones de mi carrera."
                        </blockquote>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-pink-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                J
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Javier Morales</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Estudiante de Medicina</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas de testimonios -->
            <div class="mt-20 grid md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="700">
                <div class="text-center">
                    <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-400 dark:to-pink-400 bg-clip-text text-transparent mb-2">
                        4.9/5
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">Calificación promedio</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 bg-clip-text text-transparent mb-2">
                        +10,000
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">Estudiantes activos</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold bg-gradient-to-r from-green-600 to-blue-600 dark:from-green-400 dark:to-blue-400 bg-clip-text text-transparent mb-2">
                        95%
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">Mejora en calificaciones</div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="px-4 py-6 relative z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 overflow-hidden rounded-lg shadow-sm md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© 2025 <a
                    href="https://flowbite.com/" class="dark:text-blue-400">MentorMap</a>. Todos los derechos reservados
            </span>
            <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                            d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 21 16">
                        <path
                            d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                    </svg>
                    <span class="sr-only">Discord community</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 17">
                        <path fill-rule="evenodd"
                            d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Dribbble account</span>
                </a>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Duración de la animación en milisegundos
            offset: 200,    // Desplazamiento antes de activar la animación
            once: false,     // Si la animación debe ejecutarse solo una vez
        });
    </script>
</div>