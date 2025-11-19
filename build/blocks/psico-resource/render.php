<?php
/**
 * Render callback for the Psico Resources Block
 * 
 * Displays a responsive grid of psychological resources with
 * configurable styling, shadow depths, and image dimensions.
 * 
 * @package edusiteco
 */

// Get block attributes with fallback defaults
$items = $attributes['items'] ?? [];
$sectionTitle = $attributes['sectionTitle'] ?? 'Recursos Psicoeducativos';
$sectionDescription = $attributes['sectionDescription'] ?? '';
$columns = $attributes['columns'] ?? 3;
$imageHeight = $attributes['imageHeight'] ?? 192;  // Default 192px
$shadowDepth = $attributes['shadowDepth'] ?? 1;    // Default light shadow



// Stop rendering if no items to display
if (empty($items))
    return;

/**
 * Shadow CSS map - Converts shadow depth levels to CSS box-shadow values
 * 0 = No shadow (flat)
 * 1 = Light shadow (2px blur)
 * 2 = Medium shadow (8px blur)
 * 3 = Heavy shadow (16px blur)
 */
$shadowMap = [
    0 => 'none',
    1 => '0 2px 4px rgba(0, 0, 0, 0.08)',
    2 => '0 8px 16px rgba(0, 0, 0, 0.12)',
    3 => '0 16px 32px rgba(0, 0, 0, 0.18)'
];

$currentShadow = $shadowMap[$shadowDepth] ?? $shadowMap[1];

/**
 * Responsive columns mapping
 * Mobile (default): Always 1 column
 * Tablet (md): 2 columns
 * Desktop (lg): User selected value
 */
$columnClasses = [
    1 => 'md:grid-cols-1 lg:grid-cols-1',
    2 => 'md:grid-cols-2 lg:grid-cols-2',
    3 => 'md:grid-cols-2 lg:grid-cols-3',
    4 => 'md:grid-cols-2 lg:grid-cols-4'
];

$gridClass = $columnClasses[$columns] ?? $columnClasses[3];

/**
 * Icon mapping for resource types
 * Used in download/view buttons
 */
$typeIcons = [
    'PDF' => 'download',
    'Video' => 'play',
    'Infographic' => 'image',
    'Guide' => 'document',
    'Web Resource' => 'link'
];

/**
 * SVG Icon helper function
 * Returns SVG icons based on resource type or action
 * 
 * @param string $type - Icon type to display
 * @return string - SVG markup
 */
if (!function_exists('get_psico_svg_icon')) {
    function get_psico_svg_icon($type = 'download'): string
    {
        $icons = [
            'download' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>',
            'play' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M8 5v14l11-7z"/></svg>',
            'image' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>',
            'document' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-8-6zm-1 16H7v-2h6v2zm3-4H7v-2h10v2zm0-4H7V7h10v3z"/></svg>',
            'link' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>'
        ];

        return isset($icons[$type]) ? $icons[$type] : $icons['download'];
    }
}

?>
<!-- ============================================
     Psychological Resources Section
     ============================================ -->
<section
    class="psico-resources-section w-full py-12 md:py-16 bg-background-light dark:bg-background-dark transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header with Title and Decorative Line -->
        <div class="mb-10 md:mb-14 text-center animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold font-display text-text-light dark:text-text-dark mb-3">
                <?php echo wp_kses_post($sectionTitle); ?>
            </h2>
            <!-- Section Description -->
            <?php if (!empty($sectionDescription)): ?>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base mb-4 max-w-2xl mx-auto">
                    <?php echo wp_kses_post($sectionDescription); ?>
                </p>
            <?php endif; ?>
            <!-- Decorative underline -->
            <div
                class="w-12 h-1 bg-gradient-to-r from-transparent via-brand-primary to-transparent rounded-full mx-auto">
            </div>
        </div>

        <!-- Main Resources Grid Container -->
        <div class="grid grid-cols-1 <?php echo esc_attr($gridClass); ?> gap-6 mb-8">
            <?php foreach ($items as $index => $item): ?>
                <!-- Individual Resource Card -->
                <div class="psico-resource-card flex flex-col bg-white dark:bg-gray-800 rounded-xl p-2 md:p-4 transition-all duration-300 border border-border-light dark:border-border-dark hover:scale-105"
                    style="
                        box-shadow: <?php echo esc_attr($currentShadow); ?>;
                        animation-delay: <?php echo ($index * 0.1); ?>s;
                    ">

                    <!-- ====== IMAGE SECTION ====== -->
                    <?php if (!empty($item['imagen'])): ?>
                        <div class="overflow-hidden rounded-lg mb-4">
                            <img src="<?php echo esc_url($item['imagen']); ?>" alt="<?php echo esc_attr($item['titulo']); ?>"
                                loading="lazy"
                                style="height: <?php echo intval($imageHeight); ?>px; width: 100%; object-fit: cover;"
                                class="transition-transform duration-300 hover:scale-110" />
                        </div>
                    <?php endif; ?>

                    <!-- ====== CONTENT WRAPPER (Flex for vertical layout) ====== -->
                    <div class="flex flex-col h-full">

                        <!-- Resource Type Badge -->
                        <?php if (!empty($item['tipo'])): ?>
                            <div class="mb-3 inline-flex">
                                <span
                                    class="inline-block bg-brand-primary/15 text-brand-primary dark:bg-brand-primary/20 dark:text-brand-primary-300 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide">
                                    <?php echo esc_html($item['tipo']); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <!-- Resource Title -->
                        <h3 class="text-lg md:text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
                            <?php echo esc_html($item['titulo']); ?>
                        </h3>

                        <!-- Resource Description -->
                        <?php if (!empty($item['descripcion'])): ?>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-3 min-h-[60px]">
                                <?php echo esc_html($item['descripcion']); ?>
                            </p>
                        <?php endif; ?>

                        <!-- ====== ACTION BUTTON SECTION ====== -->
                        <?php if (!empty($item['url'])): ?>
                            <?php
                            // Determine button text and icon based on file type
                            $isExternal = strpos($item['url'], 'wp-content/uploads') === false;
                            $buttonText = $isExternal ? _x('Ver recurso', 'button label', 'edusiteco') : _x('Descargar', 'button label', 'edusiteco');
                            $buttonIcon = $typeIcons[$item['tipo']] ?? ($isExternal ? 'link' : 'download');
                            ?>
                            <a href="<?php echo esc_url($item['url']); ?>" target="_blank" rel="noopener noreferrer"
                                class="mt-4 inline-flex items-center justify-center bg-brand-primary hover:bg-brand-secondary text-white px-4 py-2 rounded-lg font-semibold text-sm transition-all duration-300 transform hover:scale-105">
                                <!-- SVG Icon for button -->
                                <span class="mr-2 flex items-center justify-center" style="width: 20px; height: 20px;">
                                    <?php echo get_psico_svg_icon($buttonIcon); ?>
                                </span>
                                <?php echo esc_html($buttonText); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    /* ============================================
       Inline Styles for Dynamic Values
       ============================================ */

    /* Resource card animation on load */
    @keyframes resource-slide-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .psico-resource-card {
        animation: resource-slide-in 0.5s ease-out forwards;
        opacity: 0;
    }

    /* Responsive grid collapse on mobile */
    @media (max-width: 768px) {
        .psico-resources-section {
            padding: 2rem 0;
        }
    }

    /* Dark mode shadow adjustments */
    .dark .psico-resource-card {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3) !important;
    }

    .dark .psico-resource-card:nth-child(3) {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4) !important;
    }
</style>