<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div class="h-48 overflow-hidden">
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover" />
        </div>
    <?php endif; ?>

    <div class="p-6">
        <h2 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-brand-primary transition-colors">
                <?php the_title(); ?>
            </a>
        </h2>

        <p class="text-text-light dark:text-text-dark text-sm line-clamp-3 mb-4">
            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        </p>

        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors group/btn">
            <?php _e('Ver proyecto', 'eduusiteco'); ?>
            <svg class="w-4 h-4 ml-1 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</article>
