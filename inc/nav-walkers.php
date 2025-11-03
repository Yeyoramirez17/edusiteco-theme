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
class Custom_Nav_Walker extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
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
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
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
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_classes = array( 'header-group' );
        $has_children = in_array( 'menu-item-has-children', $item->classes );

        if ( $has_children ) {
            $li_classes[] = 'relative';
            $li_classes[] = 'group';
        }

        $output .= $indent . '<li class="' . implode( ' ', $li_classes ) . '">';

        $has_header_image = get_header_image() ? true : false;
        $text_color_class = $has_header_image ? 'text-white text-shadow-lg text-shadow-black/70' : 'text-text-light dark:text-text-dark';

        $a_classes = array(
            $text_color_class,
            'text-lg',
            'font-bold',
            'hover:text-brand-primary',
            'transition-colors',
            'rounded-sm',
            'focus:outline-none',
            'focus:ring-2',
            'focus:ring-brand-primary/50',
            'focus:ring-offset-2'
        );

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';
        
        if ( $has_children ) {
            $attributes .= ' aria-haspopup="true" aria-expanded="false"';
        }

        $item_output = $args->before;
        $item_output .= '<a class="' . implode(' ', $a_classes) . '"' . $attributes . '>';
        $item_output .= $args->link_before . '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>' . $args->link_after;
        if ( $has_children ) {
            $item_output .= '<span class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
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
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}


/**
 * Custom Nav Walker for the mobile menu.
 *
 * Renders an accessible toggle button for submenus and uses
 * an external JS file for interactions.
 */
class Mobile_Nav_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = in_array( 'menu-item-has-children', $item->classes );
        $submenu_id = 'submenu-' . $item->ID;

        if ( $has_children ) {
            $output .= '<div class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<div class="flex items-center">';
            
            // Link
            $output .= '<a href="' . esc_url( $item->url ) . '" class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">';
            $output .= apply_filters( 'the_title', $item->title, $item->ID );
            $output .= '</a>';
            
            // Toggle Button
            $output .= '<button class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" aria-controls="' . $submenu_id . '" aria-expanded="false">';
            $output .= '<span class="material-icons text-sm transition-transform duration-200">expand_more</span>';
            $output .= '</button>';
            
            $output .= '</div>';
            $output .= '<div id="' . $submenu_id . '" class="hidden bg-gray-50 dark:bg-gray-800">';

        } else {
            $output .= '<a class="block pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors" href="' . esc_url( $item->url ) . '">';
            $output .= apply_filters( 'the_title', $item->title, $item->ID );
            $output .= '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            $output .= '</div></div>';
        }
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<div class=\"pl-6 bg-white dark:bg-gray-800 space-y-0\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "$indent</div>\n";
    }
}


// Fallback function for desktop menu
function edusiteco_default_menu(): void {
    ?>
    <ul class="flex items-center space-x-1">
        <li class="relative header-group group">
            <a href="#" class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2">
                <span>La Institución</span>
                <span class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>
            </a>
            <ul class="submenu">
                <li><a class="submenu-item" href="#">Misión y Visión</a></li>
                <li><a class="submenu-item" href="#">Nuestra Historia</a></li>
                <li><a class="submenu-item" href="#">Organigrama</a></li>
            </ul>
        </li>
        <li class="header-group">
             <a class="text-text-light dark:text-text-dark text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2" href="#">
                <span>Comunicados</span>
            </a>
        </li>
    </ul>
    <?php
}

// Fallback function for mobile menu
function edusiteco_default_mobile_menu() {
    ?>
    <div class="border-b border-border-light dark:border-border-dark last:border-b-0">
        <div class="flex items-center">
            <a href="#" class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                La Institución
            </a>
            <button class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" aria-expanded="false" aria-controls="default-submenu-1">
                <span class="material-icons text-sm transition-transform duration-200">expand_more</span>
            </button>
        </div>
        <div id="default-submenu-1" class="hidden bg-gray-50 dark:bg-gray-800">
            <div class="pl-6 bg-white dark:bg-gray-800 space-y-0">
                <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" href="#">Misión y Visión</a>
                <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" href="#">Nuestra Historia</a>
            </div>
        </div>
    </div>
    <a class="block pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors" href="#">
        Comunicados
    </a>
    <?php
}