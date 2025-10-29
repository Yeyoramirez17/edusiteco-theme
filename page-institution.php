<?php
/**
 * Template Name: La Institución
 *
 * @package edusiteco
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section Mejorada con Animación -->
    <section class="relative h-[60vh] md:h-[80vh] bg-cover bg-center flex items-center justify-center overflow-hidden"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://placehold.co/1200x800/1e40af/ffffff?text=Institución+Educativa+San+Martín');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold font-display mb-6 animate-slide-in-top">Nuestra Institución</h1>
            <p class="text-xl md:text-2xl mb-8 animate-slide-in-bottom">Educando con valores para el futuro de Colombia
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delayed">
                <a href="#historia"
                    class="bg-brand-primary text-white font-semibold py-3 px-8 rounded-full hover:bg-brand-secondary transition-all duration-300 transform hover:scale-105">
                    Nuestra Historia
                </a>
                <a href="#instalaciones"
                    class="bg-transparent border-2 border-white text-white font-semibold py-3 px-8 rounded-full hover:bg-white hover:text-brand-primary transition-all duration-300 transform hover:scale-105">
                    Conoce Nuestras Instalaciones
                </a>
            </div>
        </div>

        <!-- Elementos decorativos animados -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <span class="material-icons text-white text-3xl">expand_more</span>
        </div>
    </section>

    <!-- Nuestra Historia Mejorada -->
    <section id="historia" class="py-16 md:py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in-left">
                    <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-6">
                        Nuestra Historia
                    </h2>
                    <div class="space-y-4 text-text-light dark:text-text-dark leading-relaxed">
                        <p>
                            La <strong>Institución Educativa San Martín</strong> fue fundada en 1996 para responder a la
                            necesidad de formar ciudadanos íntegros y competentes en el contexto educativo nacional. A
                            medida que la sociedad evoluciona, nuestra institución se adapta integrando conocimiento y
                            transformación para la comunidad educativa.
                        </p>
                        <p>
                            Durante estos <strong>31 años de trayectoria</strong>, hemos formado a más de 2000
                            estudiantes que contribuyen al desarrollo de nuestro país. Nuestros proyectos se basan en
                            experiencias científicas y técnicas desarrolladas con excelencia académica.
                        </p>
                        <p>
                            En 2024, nuestro enfoque humano se consolida como pilar fundamental, promoviendo una cultura
                            institucional que fortalece los valores familiares entre estudiantes, docentes y comunidad
                            educativa.
                        </p>
                    </div>
                    <a href="#"
                        class="mt-6 inline-block bg-brand-primary text-white font-semibold py-3 px-8 rounded-full hover:bg-brand-secondary transition-all duration-300 transform hover:scale-105">
                        Historia Completa
                    </a>
                </div>
                <div class="relative animate-fade-in-right">
                    <img 
                        alt="Estudiantes en un aula"
                        class="rounded-lg shadow-xl w-full transform hover:scale-105 transition-transform duration-500"
                        src="https://placehold.co/600x400/3b82f6/ffffff?text=Estudiantes+en+Aula" 
                    />

                    <div class="absolute -bottom-8 -left-8 grid grid-cols-3 gap-4 w-full max-w-sm">
                        <div
                            class="bg-brand-primary text-white p-4 rounded-lg shadow-lg text-center transform hover:scale-110 transition-transform duration-300">
                            <p class="text-lg font-bold">1996</p>
                            <p class="text-sm">Fundación</p>
                        </div>
                        <div
                            class="bg-brand-secondary text-white p-4 rounded-lg shadow-lg text-center transform hover:scale-110 transition-transform duration-300">
                            <p class="text-lg font-bold">2000+</p>
                            <p class="text-sm">Egresados</p>
                        </div>
                        <div
                            class="bg-brand-accent text-white p-4 rounded-lg shadow-lg text-center transform hover:scale-110 transition-transform duration-300">
                            <p class="text-lg font-bold">3</p>
                            <p class="text-sm">Sedes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestras Instalaciones Mejorada -->
    <section id="instalaciones" class="py-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
                    Nuestras Instalaciones
                </h2>
                <p class="text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto">
                    Espacios diseñados para potenciar el aprendizaje, la creatividad y el desarrollo integral de
                    nuestros estudiantes
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Sede Principal -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <img alt="Fachada principal de la institución" class="w-full h-48 object-cover"
                        src="https://placehold.co/400x300/1e40af/ffffff?text=Sede+Principal" />
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Principal</h3>
                        <p class="text-text-light dark:text-text-dark text-sm">
                            Fachada principal de nuestra institución educativa
                        </p>
                    </div>
                </div>

                <!-- Laboratorio de Ciencias -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    <img alt="Estudiantes en laboratorio de ciencias" class="w-full h-48 object-cover"
                        src="https://placehold.co/400x300/059669/ffffff?text=Laboratorio+Ciencias" />
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Laboratorio de
                            Ciencias</h3>
                        <p class="text-text-light dark:text-text-dark text-sm">
                            Espacio equipado para la investigación y experimentación
                        </p>
                    </div>
                </div>

                <!-- Biblioteca -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <img alt="Biblioteca con estanterías llenas de libros" class="w-full h-48 object-cover"
                        src="https://placehold.co/400x300/dc2626/ffffff?text=Biblioteca" />
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Biblioteca</h3>
                        <p class="text-text-light dark:text-text-dark text-sm">
                            Centro de recursos educativos y conocimiento
                        </p>
                    </div>
                </div>

                <!-- Canchas Deportivas -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.4s">
                    <img alt="Canchas deportivas al aire libre" class="w-full h-48 object-cover"
                        src="https://placehold.co/400x300/ea580c/ffffff?text=Canchas+Deportivas" />
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Canchas Deportivas
                        </h3>
                        <p class="text-text-light dark:text-text-dark text-sm">
                            Para el desarrollo físico y deportivo
                        </p>
                    </div>
                </div>

                <!-- Aulas Modernas -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.5s">
                    <img alt="Aula moderna con estudiantes y profesor" class="w-full h-48 object-cover"
                        src="https://placehold.co/400x300/7c3aed/ffffff?text=Aulas+Modernas" />
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Aulas Modernas</h3>
                        <p class="text-text-light dark:text-text-dark text-sm">
                            Equipadas con herramientas tecnológicas educativas
                        </p>
                    </div>
                </div>

                <!-- Sala de Informática -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.6s">
                    <img alt="Sala de informática con estudiantes en computadoras" class="w-full h-48 object-cover"
                        src="https://placehold.co/400x300/0d9488/ffffff?text=Sala+Informática" />
                    <div class="p-6 text-left">
                        <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sala de Informática
                        </h3>
                        <p class="text-text-light dark:text-text-dark text-sm">
                            Desarrollo de competencias tecnológicas
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Símbolos Institucionales -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
                    Símbolos Institucionales
                </h2>
                <p class="text-lg text-text-light dark:text-text-dark">
                    Elementos que representan nuestra identidad y valores
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Escudo -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-300 animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-brand-primary to-brand-secondary rounded-full flex items-center justify-center mx-auto mb-4 transform hover:rotate-12 transition-transform duration-300">
                        <span class="material-icons text-white text-3xl">shield</span>
                    </div>
                    <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Escudo</h3>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        Representa nuestra identidad institucional y el compromiso con la excelencia educativa
                    </p>
                </div>

                <!-- Bandera -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-300 animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-brand-warning to-brand-danger rounded-full flex items-center justify-center mx-auto mb-4 transform hover:rotate-12 transition-transform duration-300">
                        <span class="material-icons text-white text-3xl">flag</span>
                    </div>
                    <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Bandera</h3>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        Simboliza nuestra unidad y los valores que nos guían como comunidad educativa
                    </p>
                </div>

                <!-- Himno -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-300 animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-brand-accent to-brand-accent rounded-full flex items-center justify-center mx-auto mb-4 transform hover:rotate-12 transition-transform duration-300">
                        <span class="material-icons text-white text-3xl">music_note</span>
                    </div>
                    <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Himno</h3>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        Expresa nuestro espíritu institucional y el amor por el conocimiento
                    </p>
                </div>

                <!-- Lema -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-300 animate-fade-in-up"
                    style="animation-delay: 0.4s">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-brand-secondary to-brand-primary rounded-full flex items-center justify-center mx-auto mb-4 transform hover:rotate-12 transition-transform duration-300">
                        <span class="material-icons text-white text-3xl">format_quote</span>
                    </div>
                    <h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Lema</h3>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        "Educar para transformar" - Nuestro compromiso con el desarrollo social
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Filosofía Institucional Mejorada -->
    <section class="py-16 md:py-24 bg-gradient-to-br from-brand-primary to-brand-secondary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold font-display mb-4 animate-fade-in-up">
                Nuestra Filosofía Institucional
            </h2>
            <p class="max-w-3xl mx-auto mb-12 text-xl text-white/90 animate-fade-in-up" style="animation-delay: 0.1s">
                Los principios que guían nuestra formación de ciudadanos íntegros
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Misión -->
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl border border-white/20 transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    <div class="bg-white/20 rounded-full p-4 mb-4 inline-block transform hover:rotate-12 transition-transform duration-300">
                        <img 
                            class="w-8 brightness-0 invert"
                            src="<?php echo get_theme_file_uri('assets/svg/target.svg'); ?>" 
                            alt="<?php echo esc_attr_e('Misión', 'edusiteco') ?>" 
                        />
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Misión</h3>
                    <p class="text-white/90 leading-relaxed">
                        Formar ciudadanos competentes, críticos y creativos mediante una educación integral que combine
                        excelencia académica con valores humanos, contribuyendo al desarrollo social y cultural.
                    </p>
                </div>

                <!-- Visión -->
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl border border-white/20 transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div class="bg-white/20 rounded-full p-4 mb-4 inline-block transform hover:rotate-12 transition-transform duration-300">
                        <img 
                            class="w-8 brightness-0 invert"
                            src="<?php echo get_theme_file_uri('assets/svg/visibility.svg'); ?>" 
                            alt="<?php echo esc_attr_e('Visión', 'edusiteco') ?>" 
                        />
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Visión</h3>
                    <p class="text-white/90 leading-relaxed">
                        Ser reconocidos como la institución educativa líder en innovación pedagógica y formación
                        integral, siendo referente de excelencia académica a nivel nacional para el 2030.
                    </p>
                </div>

                <!-- Valores -->
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl border border-white/20 transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.4s">
                    <div class="bg-white/20 rounded-full p-4 mb-4 inline-block transform hover:rotate-12 transition-transform duration-300">
                        <img 
                            class="w-8 brightness-0 invert"
                            src="<?php echo get_theme_file_uri('assets/svg/favorite.svg'); ?>" 
                            alt="<?php echo esc_attr_e('Valores', 'edusiteco') ?>" 
                        />
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Valores</h3>
                    <ul class="text-white/90 space-y-3 text-left">
                        <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                            <span class="material-icons text-white text-sm mr-2">check_circle</span>
                            Respeto y tolerancia
                        </li>
                        <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                            <span class="material-icons text-white text-sm mr-2">check_circle</span>
                            Responsabilidad
                        </li>
                        <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                            <span class="material-icons text-white text-sm mr-2">check_circle</span>
                            Honestidad
                        </li>
                        <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                            <span class="material-icons text-white text-sm mr-2">check_circle</span>
                            Excelencia
                        </li>
                    </ul>
                </div>
            </div>

            <a href="#"
                class="mt-12 inline-block bg-white text-brand-primary px-8 py-3 rounded-full font-semibold hover:bg-white/90 transition-all duration-300 transform hover:scale-105 animate-fade-in-up"
                style="animation-delay: 0.5s">
                Conoce Nuestra Filosofía Completa
            </a>
        </div>
    </section>

    <!-- Equipo Directivo Mejorado -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
                    Equipo Directivo
                </h2>
                <p class="text-lg text-text-light dark:text-text-dark">
                    Líderes comprometidos con la excelencia educativa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Rector -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <img alt="Retrato de Dr. Juan David Rodríguez"
                        class="w-24 h-24 rounded-full object-cover mx-auto mb-4 shadow-lg transform hover:scale-110 transition-transform duration-300"
                        src="https://placehold.co/200x200/1e40af/ffffff?text=Dr.+Juan+D.+Rodríguez" />
                    <h3 class="text-xl font-bold text-text-light dark:text-text-dark mb-2">Dr. Juan David Rodríguez</h3>
                    <p class="text-brand-primary font-semibold mb-4">Rector</p>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        Magíster en Educación con más de 25 años de experiencia en dirección educativa y gestión
                        institucional.
                    </p>
                </div>

                <!-- Coordinador Académico -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    <img alt="Retrato de Lic. Carlos Mendoza"
                        class="w-24 h-24 rounded-full object-cover mx-auto mb-4 shadow-lg transform hover:scale-110 transition-transform duration-300"
                        src="https://placehold.co/200x200/ea580c/ffffff?text=Lic.+Carlos+Mendoza" />
                    <h3 class="text-xl font-bold text-text-light dark:text-text-dark mb-2">Lic. Carlos Mendoza</h3>
                    <p class="text-brand-warning font-semibold mb-4">Coordinador Académico</p>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        Especialista en currículo y evaluación educativa, comprometido con la innovación pedagógica.
                    </p>
                </div>

                <!-- Coordinadora de Convivencia -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center border border-border-light dark:border-border-dark transform hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <img alt="Retrato de Ps. Ana Lucía Torres"
                        class="w-24 h-24 rounded-full object-cover mx-auto mb-4 shadow-lg transform hover:scale-110 transition-transform duration-300"
                        src="https://placehold.co/200x200/059669/ffffff?text=Ps.+Ana+Lucía+Torres" />
                    <h3 class="text-xl font-bold text-text-light dark:text-text-dark mb-2">Ps. Ana Lucía Torres</h3>
                    <p class="text-brand-accent font-semibold mb-4">Coordinadora de Convivencia</p>
                    <p class="text-text-light dark:text-text-dark text-sm">
                        Psicóloga educativa especializada en desarrollo adolescente y clima escolar positivo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section Mejorada -->
    <section class="py-16 bg-brand-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
            <h2 class="text-3xl lg:text-4xl font-bold text-white font-display mb-6">
                Únete a Nuestra Comunidad Educativa
            </h2>
            <p class="text-xl text-white mb-8 max-w-2xl mx-auto">
                Descubre todo lo que tenemos para ofrecer y forma parte de la familia institucional
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact"
                    class="bg-white text-brand-primary px-8 py-3 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    Solicitar Información
                </a>
                <a href="#news"
                    class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-white hover:text-brand-primary transition-all duration-300 transform hover:scale-105">
                    Ver Últimas Noticias
                </a>
            </div>
        </div>
    </section>

</main>
<!-- #main -->

<?php
get_footer();