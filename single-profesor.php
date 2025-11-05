<?php get_header(); ?>

<main id="primary" class="site-main">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <header class="entry-header mb-8 text-center">
                    <?php the_title('<h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-text-dark mb-4">', '</h1>'); ?>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <span>Publicado el <?php echo get_the_date(); ?></span>
                    </div>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <div class="mb-10 rounded-xl shadow-lg overflow-hidden">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                    </div>
                <?php endif; ?>

                <div class="prose dark:prose-invert lg:prose-xl max-w-none mx-auto text-text-light dark:text-text-dark">
                    <?php the_content(); ?>
                </div>

                <?php
                // Obtener el ID del usuario profesor asociado a este post
                $teacher_user_id = get_post_meta(get_the_ID(), '_teacher_user_id', true);

                if ($teacher_user_id):
                    // Obtener los metadatos del usuario
                    $teacher_info = get_userdata($teacher_user_id);
                    $subject = get_user_meta($teacher_user_id, 'subject', true);
                    $title = get_user_meta($teacher_user_id, 'title', true);
                    $experience = get_user_meta($teacher_user_id, 'experience', true);
                    ?>
                    <section class="teacher-info-card mt-12 border-t border-border-light dark:border-border-dark pt-10">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-border-light dark:border-border-dark p-6 md:p-8 flex flex-col md:flex-row items-center gap-6 md:gap-8">
                            
                            <!-- Avatar del Profesor -->
                            <div class="flex-shrink-0">
                                <?php echo get_avatar($teacher_user_id, 128, '', 'Avatar del profesor', ['class' => 'rounded-full w-24 h-24 md:w-32 md:h-32 object-cover shadow-md border-4 border-white dark:border-gray-700']); ?>
                            </div>

                            <!-- Información del Profesor -->
                            <div class="text-center md:text-left">
                                <h2 class="text-2xl font-bold text-text-light dark:text-text-dark mb-1">
                                    <?php echo esc_html($teacher_info->display_name); ?>
                                </h2>
                                <p class="text-brand-primary font-semibold text-lg mb-4">
                                    <?php echo esc_html($title); ?>
                                </p>

                                <div class="space-y-3 text-text-light dark:text-text-dark">
                                    <?php if ($subject): ?>
                                        <div class="flex items-center justify-center md:justify-start gap-2">
                                            <span class="material-icons text-brand-secondary text-xl">school</span>
                                            <p><strong><?php esc_html_e('Asignatura:', 'edusiteco'); ?></strong> <?php echo esc_html($subject); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($experience): ?>
                                        <div class="flex items-center justify-center md:justify-start gap-2">
                                            <span class="material-icons text-brand-secondary text-xl">workspace_premium</span>
                                            <p><strong><?php esc_html_e('Experiencia:', 'edusiteco'); ?></strong> <?php echo esc_html($experience); ?> años</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <footer class="entry-footer mt-12">
                    <a 
                        href="<?php echo get_post_type_archive_link('profesor'); ?>"
                        class="group text-brand-primary hover:text-brand-secondary font-medium flex items-center gap-2 transition-colors"
                    >
                        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                        </svg>
                        <span class="group-hover:underline">Volver a Profesores</span>
                    </a>
                </footer>

            <?php endwhile;
        endif; ?>
    </article>
</main>

<?php get_footer(); ?>