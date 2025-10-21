<?php
/**
 * Template Name: Participa
 */
get_header();
?>

<main class="site-main bg-white dark:bg-gray-900 transition-colors duration-300">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 dark:from-blue-950 dark:to-blue-800 text-white py-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 font-plus-jakarta animate-fade-in-up">
                Participa
            </h1>
            <p class="text-xl md:text-2xl max-w-4xl mx-auto leading-relaxed font-plus-jakarta font-light animate-fade-in-up animation-delay-200">
                Promovemos la participación activa de la comunidad educativa en la gestión institucional
            </p>
        </div>
    </section>

    <!-- Introducción -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                    En el Colegio <span class="font-bold uppercase"><?php echo get_bloginfo('name') ?></span>, fomentamos la participación de estudiantes, docentes, padres de familia 
                    y comunidad en la planeación, ejecución y evaluación de nuestras acciones educativas.
                </p>
            </div>
        </div>
    </section>

    <!-- Mecanismos de Participación -->
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-700 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    Mecanismos de Participación
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    Conoce los diferentes espacios de participación disponibles en nuestra institución
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Consejo Directivo -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-colors duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 font-plus-jakarta">Consejo Directivo</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                            Órgano máximo de participación de la comunidad educativa en la orientación académica y administrativa del establecimiento.
                        </p>
                    </div>
                </div>

                <!-- Consejo Académico -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-colors duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v6l9-5-9-5-9 5 9 5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 font-plus-jakarta">Consejo Académico</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                            Espacio de participación de los docentes en la orientación pedagógica y curricular de la institución educativa.
                        </p>
                    </div>
                </div>

                <!-- Consejo Estudiantil -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-colors duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 font-plus-jakarta">Consejo Estudiantil</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                            Mecanismo de participación de los estudiantes en la vida institucional, elegido democráticamente por los alumnos.
                        </p>
                    </div>
                </div>

                <!-- Consejo de Padres -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-colors duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 font-plus-jakarta">Consejo de Padres</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                            Instancia de participación de los padres de familia en el proceso educativo y en el mejoramiento del entorno escolar.
                        </p>
                    </div>
                </div>

                <!-- Comité de Convivencia Escolar -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-colors duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 font-plus-jakarta">Comité de Convivencia</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                            Espacio para la promoción de la convivencia pacífica y la resolución de conflictos en la comunidad educativa.
                        </p>
                    </div>
                </div>

                <!-- Buzón de Sugerencias -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-600">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-colors duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 font-plus-jakarta">Buzón de Sugerencias</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                            Canal permanente para recibir propuestas, quejas, reclamos y sugerencias de todos los miembros de la comunidad educativa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultas y Encuestas -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-8 border border-blue-200 dark:border-blue-800">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-800 dark:text-blue-300 mb-4 font-plus-jakarta">
                        Consultas y Encuestas
                    </h2>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 font-plus-jakarta">
                        Participa en nuestras encuestas y comparte tus ideas para mejorar la gestión educativa.
                    </p>
                    <a href="https://forms.google.com" target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 font-plus-jakarta">
                        Participar en Encuestas
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Rendición de Cuentas Participativa -->
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-700 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    Rendición de Cuentas Participativa
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    Consulta aquí las memorias de nuestras audiencias públicas y participa con tus aportes
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Documento 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-600 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/20 rounded-lg flex items-center justify-center text-red-600 dark:text-red-400 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white font-plus-jakarta">Memoria 2024</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 font-plus-jakarta">PDF - 2.4 MB</p>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium font-plus-jakarta transition-colors duration-200">
                        Descargar documento
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </a>
                </div>

                <!-- Documento 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-600 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center text-green-600 dark:text-green-400 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white font-plus-jakarta">Actas Consejo</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 font-plus-jakarta">PDF - 1.8 MB</p>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium font-plus-jakarta transition-colors duration-200">
                        Descargar documento
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </a>
                </div>

                <!-- Documento 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-600 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center text-purple-600 dark:text-purple-400 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white font-plus-jakarta">Audiencia Pública</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 font-plus-jakarta">PDF - 3.1 MB</p>
                        </div>
                    </div>
                    <a href="#" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium font-plus-jakarta transition-colors duration-200">
                        Descargar documento
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Buzón de Participación -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    Buzón de Participación
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 font-plus-jakarta">
                    Comparte tus ideas, sugerencias y propuestas para mejorar nuestra institución
                </p>
            </div>

            <form id="participacion-form" class="bg-gray-50 dark:bg-gray-700 rounded-2xl p-8 border border-gray-200 dark:border-gray-600">
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <!-- Nombre Completo -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                            Nombre completo *
                        </label>
                        <input 
                            type="text" id="nombre" name="nombre" required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta"
                            placeholder="Ingresa tu nombre completo"
                            aria-required="true"
                        >
                    </div>

                    <!-- Rol -->
                    <div>
                        <label for="rol" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                            Rol en la institución *
                        </label>
                        <select id="rol" name="rol" required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta"
                                aria-required="true">
                            <option value="">Selecciona tu rol</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="padre">Padre de familia</option>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Personal administrativo</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                        Correo electrónico (opcional)
                    </label>
                    <input 
                        type="email" id="email" name="email"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta"
                        placeholder="tu@correo.com"
                        aria-describedby="email-optional"
                    >
                    <p id="email-optional" class="text-sm text-gray-500 dark:text-gray-400 mt-1 font-plus-jakarta">
                        Opcional - Solo si deseas que te contactemos
                    </p>
                </div>

                <!-- Mensaje -->
                <div class="mb-6">
                    <label for="mensaje" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                        Mensaje o propuesta *
                    </label>
                    <textarea id="mensaje" name="mensaje" required rows="6"
                              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta resize-vertical"
                              placeholder="Describe tu propuesta, sugerencia o inquietud..."
                              aria-required="true"></textarea>
                </div>

                <!-- Botón Enviar -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-4 px-12 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 font-plus-jakarta">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('participacion-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validación básica
            const nombre = document.getElementById('nombre').value.trim();
            const rol = document.getElementById('rol').value;
            const mensaje = document.getElementById('mensaje').value.trim();
            
            if (!nombre || !rol || !mensaje) {
                alert('Por favor completa todos los campos obligatorios (*)');
                return;
            }
            
            // Simular envío (en una implementación real, aquí iría AJAX o action del form)
            alert('¡Gracias por tu participación! Tu mensaje ha sido enviado correctamente.');
            form.reset();
        });
    }

    // Mejorar accesibilidad del formulario
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.outline = '2px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });
        
        input.addEventListener('blur', function() {
            this.style.outline = 'none';
        });
    });
});
</script>

<?php get_footer(); ?>