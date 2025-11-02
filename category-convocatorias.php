<?php get_header(); ?>

<main class="site-main">
    <section class="container bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center mb-8">Convocatorias</h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $convocatorias = new WP_Query([
                'post_type' => 'comunicado',
                'posts_per_page' => 6,
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'convocatorias',
                    ],
                ],
            ]);

            if ($convocatorias->have_posts()):
                while ($convocatorias->have_posts()):
                    $convocatorias->the_post(); ?>
                    <article
							class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
							<?php if (has_post_thumbnail()): ?>
								<div class="h-48 overflow-hidden">
									<img 
										src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
										class="w-full h-full object-cover"
									/>
								</div>
							<?php else: ?>
								<div class="h-48 relative overflow-hidden">
									<!-- Fondo con SVG -->
									<div class="h-full bg-brand-primary text-white/10 transition-transform duration-500 group-hover:scale-105">
										<svg viewBox="0 0 1000 500" fill="currentColor" class="w-full h-full">
											<circle cx="200" cy="100" r="80" opacity="0.1" />
											<circle cx="800" cy="150" r="120" opacity="0.05" />
											<circle cx="400" cy="400" r="100" opacity="0.08" />
										</svg>
									</div>
									<!-- Texto superpuesto -->
									<div class="absolute inset-0 flex items-center justify-center p-4 text-white">
										<div class="text-center">
											<span class="block text-lg font-semibold">Comunicado</span>
											<span class="block text-sm opacity-80 uppercase font-bold"><?php echo get_bloginfo('name'); ?></span>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="p-6">
								<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
									<a href="<?php the_permalink(); ?>" class="hover:text-brand-primary transition-colors">
										<?php the_title(); ?>
									</a>
								</h3>

								<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
									<span class="material-icons text-xs mr-1">event</span>
									<time datetime="<?php echo get_the_date('c'); ?>">
										<?php echo get_the_date(); ?>
									</time>
								</div>

								<p class="text-text-light dark:text-text-dark text-sm line-clamp-3">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>

								<a href="<?php the_permalink(); ?>"
									class="inline-block mt-4 text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors">
									Leer más →
								</a>
							</div>
						</article>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <div class="flex justify-center">
                    <p class="bg-brand-primary-100 p-4 rounded-md text-text-light dark:text-text-dark">No hay convocatorias
                        disponibles en este momento.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- 🔹 Paginación -->
        <div class="mt-8 flex justify-center">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => __('« Anterior'),
                'next_text' => __('Siguiente »'),
            ]);
            ?>
        </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>