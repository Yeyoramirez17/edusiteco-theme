<?php
/**
 * Template Name: Psicoorientación
 * Description: Página de Psicoorientación - plantilla con formulario, recursos, actividades y mapa. Usa Tailwind CSS.
 */

get_header();
?>

<main id="main" class="container mx-auto px-4 py-12">

    <!-- HERO -->
    <section class="bg-white rounded-2xl shadow-sm p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
            <div class="md:col-span-2">
                <h1 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight mb-3">Psicoorientación</h1>
                <p class="text-gray-600 mb-4">
                    El servicio de Psicoorientación acompaña a estudiantes, familias y docentes en el desarrollo
                    emocional, social y académico.
                    Encuentra orientación, recursos y apoyo para el bienestar emocional y la convivencia escolar.
                </p>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="#servicios"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Ver
                        servicios</a>
                    <a href="#contacto-psico"
                        class="inline-block bg-transparent border border-blue-600 text-blue-600 px-4 py-2 rounded">Solicitar
                        atención</a>
                </div>
            </div>

            <div class="hidden md:block">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/psico-orientacion.jpg"
                    alt="Psicoorientación" class="w-full h-44 object-cover rounded-lg">
            </div>
        </div>
    </section>

    <!-- SECCIÓN: SERVICIOS -->
    <section id="servicios" class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">Servicios</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- tarjeta -->
            <article class="bg-white p-5 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-lg mb-2">Acompañamiento emocional</h3>
                <p class="text-gray-600 text-sm">Atención individual para estudiantes que requieren orientación
                    emocional, manejo de ansiedad, duelo o conflictos.</p>
            </article>

            <article class="bg-white p-5 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-lg mb-2">Orientación vocacional</h3>
                <p class="text-gray-600 text-sm">Guía para la elección de trayectoria académica y profesional, talleres
                    y pruebas orientadoras.</p>
            </article>

            <article class="bg-white p-5 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-lg mb-2">Convivencia y resolución de conflictos</h3>
                <p class="text-gray-600 text-sm">Intervención y mediación para fortalecer la convivencia escolar y
                    protocolos de actuación.</p>
            </article>
        </div>
    </section>

    <!-- SECCIÓN: EQUIPO -->
    <section id="equipo" class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">Equipo</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Persona -->
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/psico-person.jpg" alt="Psicóloga"
                    class="mx-auto w-28 h-28 rounded-full object-cover mb-3">
                <h4 class="font-semibold">María Pérez</h4>
                <p class="text-sm text-gray-600">Psicóloga escolar</p>
                <p class="text-sm text-gray-500 mt-2">Horas atención: Lun - Vie 8:00 - 12:00</p>
            </div>
            <!-- placeholder para más miembros -->
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder-avatar.png" alt=""
                    class="mx-auto w-28 h-28 rounded-full object-cover mb-3">
                <h4 class="font-semibold">Equipo</h4>
                <p class="text-sm text-gray-600">Coordinación psicopedagógica</p>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: ACTIVIDADES / TALLERES -->
    <section id="actividades" class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">Actividades y talleres</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <article class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold mb-2">Taller: Manejo de emociones</h3>
                <p class="text-sm text-gray-600">17 de Junio • Aula múltiple</p>
                <p class="text-gray-600 text-sm mt-2">Taller práctico dirigido a estudiantes de secundaria para
                    identificar y regular emociones.</p>
            </article>

            <article class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold mb-2">Escuela de padres</h3>
                <p class="text-sm text-gray-600">Próximo: 24 de Junio</p>
                <p class="text-gray-600 text-sm mt-2">Espacio formativo para familias sobre acompañamiento académico y
                    emocional.</p>
            </article>

            <article class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold mb-2">Feria de bienestar</h3>
                <p class="text-sm text-gray-600">Evento anual</p>
                <p class="text-gray-600 text-sm mt-2">Actividades, stands y asesorías orientadas al autocuidado.</p>
            </article>
        </div>
    </section>

    <!-- SECCIÓN: RECURSOS DESCARGABLES -->
    <section id="recursos" class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">Recursos descargables</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/docs/guia-padres.pdf'); ?>"
                class="block bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md">
                <h3 class="font-semibold">Guía para familias</h3>
                <p class="text-sm text-gray-600">Consejos para apoyar el proceso emocional y académico en casa.</p>
            </a>

            <a href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/docs/protocolo-convivencia.pdf'); ?>"
                class="block bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md">
                <h3 class="font-semibold">Protocolo de convivencia</h3>
                <p class="text-sm text-gray-600">Ruta de atención institucional para situaciones de conflicto o
                    violencia.</p>
            </a>

            <a href="#" class="block bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md">
                <h3 class="font-semibold">Test vocacional (PDF)</h3>
                <p class="text-sm text-gray-600">Instrumento simple para la exploración de intereses.</p>
            </a>
        </div>
    </section>

    <!-- SECCIÓN: FAQ -->
    <section id="faq" class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">Preguntas frecuentes</h2>

        <div class="space-y-4">
            <details class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <summary class="font-medium cursor-pointer">¿Cómo solicitar una cita?</summary>
                <div class="mt-2 text-gray-600">Completa el formulario de contacto de esta página indicando el motivo y
                    tus datos. El equipo se comunicará contigo.</div>
            </details>

            <details class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <summary class="font-medium cursor-pointer">¿La atención es confidencial?</summary>
                <div class="mt-2 text-gray-600">La atención respeta la confidencialidad institucional; se informará a la
                    familia cuando la situación lo requiera según protocolos.</div>
            </details>
        </div>
    </section>

</main>

<?php get_footer(); ?>