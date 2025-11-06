<?php
/**
 * Custom Nav Walkers for the theme
 *
 * @package edusiteco
 */

/**
 * Custom Nav Walker for the desktop menu.
 *
 * Renders a semantic <ul><li> structure with Tailwind CSS classes
 * for dropdown functionality.
 */
class Custom_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        // These are the classes for the submenu <ul>
        $output .= "\n$indent<ul class=\"submenu\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Starts the element output.
     *
     * @see Walker::start_el()
     *
     * @param string   $output            Used to append additional content (passed by reference).
     * @param WP_Post  $item              Menu item data object.
     * @param int      $depth             Depth of menu item. Used for padding.
     * @param stdClass $args              An object of wp_nav_menu() arguments.
     * @param int      $id                Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Preserve WordPress native classes and add custom ones
        $li_classes = array('header-group');
        $li_classes = array_merge($li_classes, empty($item->classes) ? array() : (array) $item->classes);

        $has_children = in_array('menu-item-has-children', $item->classes);

        if ($has_children) {
            $li_classes[] = 'relative';
            $li_classes[] = 'group';
        }

        // Add current item classes
        if (in_array('current-menu-item', $item->classes)) {
            $li_classes[] = 'current';
        }

        // Filter and sanitize classes
        $li_classes = apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args, $depth);
        $class_names = join(' ', $li_classes);
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Add ID if exists
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $has_header_image = get_header_image() ? true : false;

        // Lógica mejorada de colores para todos los escenarios
        if ($has_header_image) {
            // Con imagen de cabecera - texto blanco con sombra para mejor contraste
            $text_color_class = 'text-white drop-shadow-lg';
            $hover_color_class = 'hover:text-brand-primary-200';
        } else {
            // Sin imagen de cabecera - colores normales según modo claro/oscuro
            $text_color_class = 'text-text-light dark:text-text-dark';
            $hover_color_class = 'hover:text-brand-primary dark:hover:text-brand-primary-300';
        }

        $a_classes = array(
            $text_color_class,
            $hover_color_class,
            'text-lg',
            'font-bold',
            'transition-colors',
            'duration-200',
            'rounded-sm',
            'focus:outline-none',
            'focus:ring-2',
            'focus:ring-brand-primary/50',
            'focus:ring-offset-2',
            'focus:ring-offset-background-light',
            'dark:focus:ring-offset-background-dark'
        );

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = implode(' ', $a_classes);

        if ($has_children) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . '<span class="underline-link">' . esc_html($title) . '</span>' . $args->link_after;
        if ($has_children) {
            $icon_color_class = $has_header_image ? 'text-white' : 'text-text-light dark:text-text-dark';
            $item_output .= '<span class="material-icons text-2xl ml-1 ' . $icon_color_class . ' group-hover:rotate-180 transition-transform duration-200" aria-hidden="true">expand_more</span>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output, if needed.
     *
     * @see Walker::end_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Page data object. Not used.
     * @param int      $depth  Depth of page. Not Used.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}


/**
 * Custom Nav Walker for the mobile menu.
 *
 * Renders an accessible toggle button for submenus and uses
 * an external JS file for interactions.
 */
class Mobile_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Starts the element output.
     *
     * @see Walker::start_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $has_children = in_array('menu-item-has-children', $item->classes);
        $submenu_id = 'submenu-' . $item->ID;
        $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);

        $has_header_image = get_header_image() ? true : false;
        $text_color_class = $has_header_image ? 'text-white' : 'text-text-light dark:text-text-dark';
        $bg_class = $has_header_image ? 'bg-white/10 hover:bg-white/20' : 'bg-[rgb(0,0,0,0.256)] hover:bg-gray-50 dark:hover:bg-gray-700';

        if ($has_children) {
            $output .= '<li class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<div class="flex items-center">';

            // Link
            $output .= '<a href="' . esc_url($item->url) . '" class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium ' . $text_color_class . ' ' . $bg_class . ' transition-colors">';
            $output .= esc_html($title);
            $output .= '</a>';

            // Toggle Button
            $output .= '<button type="button" class="mobile-toggle flex-shrink-0 px-4 py-[8px] transition-colors ' . $bg_class . ' ' . $text_color_class . '" aria-controls="' . esc_attr($submenu_id) . '" aria-expanded="false" aria-label="' . esc_attr(sprintf(__('Toggle %s submenu', 'edusiteco'), $title)) . '">';
            $output .= '<span class="material-icons text-2xl transition-transform duration-200" aria-hidden="true">expand_more</span>';
            $output .= '</button>';

            $output .= '</div>';
            $output .= '<div id="' . esc_attr($submenu_id) . '" class="submenu hidden">';

        } else {
            $output .= '<li class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<a class="block pl-4 pr-4 py-3.5 text-base font-medium ' . $text_color_class . ' ' . $bg_class . ' transition-colors" href="' . esc_url($item->url) . '">';
            $output .= esc_html($title);
            $output .= '</a>';
        }
    }

    /**
     * Ends the element output.
     *
     * @see Walker::end_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Page data object.
     * @param int      $depth  Depth of page.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '</div>';
        }
        $output .= '</li>';
    }

    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"pl-6 space-y-0\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}


// Fallback function for desktop menu
function edusiteco_default_menu()
{
    ?>
    <ul class="flex items-center space-x-1">
        <li class="relative header-group group">
            <?php
            $institution_page = get_page_by_path('la-institucion');
            $institution_url = $institution_page ? get_permalink($institution_page->ID) : '#';

            $mision_page = get_page_by_path('mision-vision-y-valores');
            $mision_url = $mision_page ? get_permalink($mision_page->ID) : '#';

            $history_page = get_page_by_path('historia');
            $history_url = $history_page ? get_permalink($history_page->ID) : '#';

            $directory_page = get_page_by_path('directorio');
            $directory_url = $directory_page ? get_permalink($directory_page->ID) : '#';

            $symbols_page = get_page_by_path('simbolos-institucionales');
            $symbols_url = $symbols_page ? get_permalink($symbols_page->ID) : '#';
            ?>

            <a href="<?= $institution_url ?>"
                class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2">
                <span>La Institución</span>
                <span
                    class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>
            </a>

            <ul class="submenu">
                <li><a class="submenu-item" href="<?= $mision_url ?>">Misión y Visión</a></li>
                <li><a class="submenu-item" href="<?= $history_url ?>">Nuestra Historia</a></li>
                <li><a class="submenu-item" href="<?= $directory_url ?>">Directorio</a></li>
                <li><a class="submenu-item" href="<?= $symbols_url ?>">Simbolos Institucionales</a></li>
            </ul>
        </li>

        <li class="header-group">
            <a class="text-text-light dark:text-text-dark text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2"
                href="/comunicados">
                <span>Comunicados</span>
            </a>
        </li>

        <li class="header-group">
            <a class="text-text-light dark:text-text-dark text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2"
                href="/profesores/">
                <span>Profesores</span>
            </a>
        </li>
    </ul>
    <?php
}

// Fallback function for mobile menu
function edusiteco_default_mobile_menu()
{
    $institution_page = get_page_by_path('la-institucion');
    $institution_url = $institution_page ? get_permalink($institution_page->ID) : '#';

    $mision_page = get_page_by_path('mision-vision-y-valores');
    $mision_url = $mision_page ? get_permalink($mision_page->ID) : '#';

    $history_page = get_page_by_path('historia');
    $history_url = $history_page ? get_permalink($history_page->ID) : '#';

    $directory_page = get_page_by_path('directorio');
    $directory_url = $directory_page ? get_permalink($directory_page->ID) : '#';

    $symbols_page = get_page_by_path('simbolos-institucionales');
    $symbols_url = $symbols_page ? get_permalink($symbols_page->ID) : '#';

    ?>
        <div class="border-b border-border-light dark:border-border-dark last:border-b-0">
            <div class="flex items-center">
                <a href="<?= $institution_url ?>"
                    class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                >
                    La Institución
                </a>
                <button
                    class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                    aria-expanded="false" aria-controls="default-submenu-1">
                    <span class="material-icons text-sm transition-transform duration-200">expand_more</span>
                </button>
            </div>
            <div id="default-submenu-1" class="hidden bg-gray-50 dark:bg-gray-800">
                <div class="pl-6 bg-white dark:bg-gray-800 space-y-0">
                    <a 
                        class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                        href="<?= $history_url ?>"
                    >
                        Nuestra Historia
                    </a>
                    <a 
                        class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                        href="<?= $mision_url ?>"
                    >
                        Misión y Visión
                    </a>
                    <a 
                        class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                        href="<?= $symbols_url ?>"
                    >
                        Simbolos Institucionales
                    </a>
                    <a 
                        class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                        href="<?= $directory_url ?>"
                    >
                        Directorio
                    </a>
                </div>
            </div>
        </div>
        <a 
            class="block pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors"
            href="/comunicados/"
        >
            Comunicados
        </a>
        <a 
            class="block pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors"
            href="/profesores/"
        >
            Profesores
        </a>
    <?php
}