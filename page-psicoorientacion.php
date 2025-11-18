<?php
/**
 * Template Name: Psicoorientación
 * Description: Página de Psicoorientación - plantilla con formulario, recursos, actividades y mapa. Usa Tailwind CSS.
 */

get_header();
?>

<main id="primary" class="site-main"></main>
    <!-- Sección Hero -->
    <section class="relative h-[50vh] bg-cover bg-gradient-custom flex items-center justify-center text-white"
        style="">
        <div class="relative z-10 text-center px-4 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold font-display mb-4"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl opacity-90">
                <?php
                // Este texto podría ser un campo personalizado (Custom Field) para ser editable.
                echo esc_html__('Apoyando el bienestar emocional y académico de nuestros estudiantes', 'edusiteco');
                ?>
            </p>
        </div>
    </section>

    <!-- Contenido Principal -->
    <article class="py-16 md:py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose dark:prose-invert lg:prose-xl mx-auto text-text-light dark:text-text-dark">
                <?php
                // El contenido principal se obtiene del editor de WordPress.
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </article>

</main>

<?php get_footer(); ?>