<?php
/**
 * Template Name: Visión, Misión y Valores
 * Description: Plantilla para mostrar la misión, visión y valores del colegio
 */
?>

<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <?php
    $hero_image_url = has_post_thumbnail()
        ? get_the_post_thumbnail_url(null, 'full')
        : get_template_directory_uri() . '/assets/images/hero-mision-vision.jpg';
    ?>
    <section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-white"
        style="background-image: linear-gradient(rgba(51, 102, 204, 0.8), rgba(51, 102, 204, 0.9)), url('<?php echo esc_url($hero_image_url); ?>');">
        <div class="relative z-10 text-center px-4 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold mb-4"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl opacity-90">
                <?php
                // Este subtítulo podría ser un campo personalizado (ACF) o un ajuste del tema.
                echo esc_html(get_post_meta(get_the_ID(), 'page_subtitle', true) ?: __('La esencia que guía nuestro camino educativo', 'edusiteco'));
                ?>
            </p>
        </div>
    </section>

    <!-- Misión Section -->
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/3 text-center lg:text-left">
                    <div
                        class="w-24 h-24 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto lg:mx-0 mb-6">
                        <span class="text-4xl text-blue-600 dark:text-blue-400">🎯</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        <?php echo esc_html__('Nuestra Misión', 'edusiteco'); ?>
                    </h2>
                </div>
                <div class="lg:w-2/3">
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 md:p-12 border-l-4 border-blue-600">
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php
                            $mision_text = get_theme_mod(
                                'mision_text',
                                'Formar integralmente a nuestros estudiantes mediante una educación de calidad basada en valores, desarrollando sus capacidades intelectuales, emocionales y sociales para que se conviertan en ciudadanos responsables, críticos y comprometidos con la transformación positiva de la sociedad.'
                            );
                            echo esc_html($mision_text);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visión Section -->
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-1/3 text-center lg:text-left">
                    <div
                        class="w-24 h-24 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center mx-auto lg:mx-0 mb-6">
                        <span class="text-4xl text-yellow-600 dark:text-yellow-400">⭐</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        <?php echo esc_html__('Nuestra Visión', 'edusiteco'); ?>
                    </h2>
                </div>
                <div class="lg:w-2/3">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 md:p-12 border-l-4 border-yellow-500">
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php
                            $vision_text = get_theme_mod(
                                'vision_text',
                                'Ser reconocidos como una institución educativa líder en la formación de personas íntegras, innovadoras y comprometidas con el desarrollo sostenible, destacándonos por nuestra excelencia académica, inclusión y contribución al progreso de la comunidad.'
                            );
                            echo esc_html($vision_text);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores Section -->
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    <?php echo esc_html__('Nuestros Valores', 'edusiteco'); ?>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    <?php echo esc_html__('Los principios que orientan nuestra labor educativa y forman el carácter de nuestra comunidad', 'edusiteco'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Ejemplo de cómo obtener los valores desde un Custom Post Type 'valor'
                $args = array(
                    'post_type' => 'valor', // Nombre de tu CPT
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );
                $valores_query = new WP_Query($args);

                if ($valores_query->have_posts()):
                    while ($valores_query->have_posts()):
                        $valores_query->the_post();
                        // Para el icono, podrías usar un campo personalizado (ACF) o la imagen destacada.
                        // Aquí usamos un campo personalizado llamado 'icono_svg' como ejemplo.
                        $icono_svg = get_post_meta(get_the_ID(), 'icono_svg', true);
                        ?>
                        <div
                            class="valor-card group bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 p-6 text-center transform hover:-translate-y-2">
                            <div
                                class="w-20 h-20 bg-blue-50 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <?php if ($icono_svg): ?>
                                    <div class="w-10 h-10 text-blue-600 dark:text-blue-400">
                                        <?php echo $icono_svg; // Asegúrate de sanitizar el SVG si el usuario puede introducirlo. ?>
                                    </div>
                                <?php else: ?>
                                    <span class="text-3xl">💡</span>
                                <?php endif; ?>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                <?php echo esc_html(get_the_excerpt()); // O usa the_content() si necesitas más formato ?>
                            </p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback a datos ficticios si no hay posts en el CPT 'valor'
                    $valores_ficticios = edusiteco_get_valores_ficticios();
                    foreach ($valores_ficticios as $valor):
                        ?>
                        <div
                            class="valor-card group bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 p-6 text-center transform hover:-translate-y-2">
                            <div
                                class="w-20 h-20 bg-blue-50 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-3xl"><?php echo $valor['icono']; ?></span>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                <?php echo esc_html($valor['titulo']); ?>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                <?php echo esc_html($valor['descripcion']); ?>
                            </p>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Cita Institucional -->
    <section
        class="py-16 md:py-20 bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-800 dark:to-blue-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-5xl text-yellow-300 mb-4 block">"</span>
            <blockquote class="text-2xl md:text-3xl italic mb-8 leading-relaxed">
                <?php
                $cita_text = get_theme_mod(
                    'cita_text',
                    'Educar con valores es formar el corazón del conocimiento, sembrando en cada estudiante la semilla de un futuro mejor.'
                );
                echo esc_html($cita_text);
                ?>
            </blockquote>
            <?php
            $cita_autor = get_theme_mod('cita_autor', 'Colegio San Martín');
            $cita_cargo = get_theme_mod('cita_cargo', 'Lema Institucional');
            ?>
            <div class="border-t border-blue-400 pt-6">
                <p class="text-lg font-semibold"><?php echo esc_html($cita_autor); ?></p>
                <p class="text-blue-200 text-sm"><?php echo esc_html($cita_cargo); ?></p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-8">
                <?php echo esc_html__('Conoce más sobre nosotros', 'edusiteco'); ?>
            </h2>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <?php
                // Ejemplo usando IDs de página, que es más robusto que el slug.
                // Idealmente, estos IDs vendrían de get_theme_mod() para ser configurables.
                $pagina_historia_id = get_theme_mod('pagina_historia_id', 0); // 0 es un ID inválido por defecto
                $pagina_sedes_id = get_theme_mod('pagina_sedes_id', 0);
                ?>
                <a href="<?php echo esc_url(get_permalink($pagina_historia_id)); ?>"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                    <?php echo esc_html__('Conoce nuestra Historia', 'edusiteco'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink($pagina_sedes_id)); ?>"
                    class="bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-blue-600 dark:text-white border-2 border-blue-600 dark:border-gray-600 font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                    <?php echo esc_html__('Explora nuestras Sedes', 'edusiteco'); ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>