<?php
/**
 * Custom Nav Walkers for the theme
 * 
 * @package edusiteco
 */

// Walker para navegación desktop - MEJORADO
class Custom_Nav_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes);
        $has_header_image = get_header_image() ? true : false;

        $text_color_class = $has_header_image ? 'text-white text-shadow-lg text-shadow-black/70' : 'text-text-light dark:text-text-dark';

        if ($has_children) {
            // Elemento con hijos - MEJORADO ESPACIADO
            $output .= $indent . '<div class="relative header-group group">';
            $output .= '<a href="' . esc_url($item->url) . '" class="' . $text_color_class . ' inline-flex items-center text-lg font-bold hover:text-brand-primary transition-colors px-2 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2" aria-haspopup="true" aria-expanded="false">';
            $output .= '<span>' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
            $output .= '<span class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>';
            $output .= '</a>';
            // Submenú MEJORADO - MEJOR ESPACIADO Y DISEÑO
            $output .= '<div class="submenu group absolute z-50 left-0 w-64 p-3 rounded-lg shadow-xl bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 translate-y-1 transition-all duration-200">';
            $output .= '<div class="space-y-0">';
        } else {
            // Elemento sin hijos - MEJORADO ESPACIADO
            $output .= $indent . '<div class="header-group">';
            $output .= '<a href="' . esc_url($item->url) . '" class="' . $text_color_class . ' text-lg font-bold hover:text-brand-primary transition-colors rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2">';
            $output .= '<span>' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
            $output .= '</a>';
            $output .= '</div>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        if ($has_children) {
            $output .= '</div></div></div>' . $n;
        }
    }

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        // El submenú ya está incluido en start_el para items con hijos
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        // El cierre del submenú ya está en end_el
    }
}

// Walker para navegación móvil - CORREGIDO (SIN BORDES INTERNOS)
class Mobile_Nav_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        if ($has_children) {
            // Elemento con hijos - SIN BORDES INTERNOS
            $output .= '<div class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<div class="flex items-center">';
            $output .= '<a href="' . esc_url($item->url) . '" class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">';
            $output .= apply_filters('the_title', $item->title, $item->ID);
            $output .= '</a>';
            $output .= '<button class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" onclick="this.classList.toggle(\'text-brand-primary\'); this.classList.toggle(\'rotate-180\'); this.parentNode.nextElementSibling.classList.toggle(\'hidden\')">';
            $output .= '<span class="material-icons text-sm transition-transform duration-200">expand_more</span>';
            $output .= '</button>';
            $output .= '</div>';
            $output .= '<div class="hidden bg-gray-50 dark:bg-gray-800">';
        } else {
            // Elemento sin hijos - SOLO BORDE INFERIOR PRINCIPAL
            $output .= '<a class="block pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors" href="' . esc_url($item->url) . '">';
            $output .= apply_filters('the_title', $item->title, $item->ID);
            $output .= '</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        if ($has_children) {
            $output .= '</div></div>';
        }
    }

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        // Para submenús en móvil - SIN BORDES INTERNOS
        $output .= "{$n}{$indent}<div class=\"pl-6 bg-white dark:bg-gray-800 space-y-0\">{$n}";
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);

        $output .= "{$indent}</div>{$n}";
    }
}

// Función para menú desktop por defecto - MEJORADO
function edusiteco_default_menu(): void
{
    ?>
    <div class="relative header-group group">
        <a href="#"
            class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2">
            <span>La Institución</span>
            <span
                class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>
        </a>
        <div
            class="submenu absolute z-50 left-0 w-64 p-3 rounded-lg shadow-xl bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 translate-y-1 transition-all duration-200">
            <div class="space-y-1">
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Misión y Visión</a>
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Nuestra Historia</a>
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Organigrama</a>
            </div>
        </div>
    </div>
    <div class="relative header-group group">
        <a href="#"
            class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2">
            <span>Sedes</span>
            <span
                class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>
        </a>
        <div
            class="submenu absolute z-50 left-0 w-64 p-3 rounded-lg shadow-xl bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 translate-y-1 transition-all duration-200">
            <div class="space-y-1">
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Sede Principal</a>
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Sedes Regionales</a>
            </div>
        </div>
    </div>
    <div class="header-group">
        <a class="text-text-light dark:text-text-dark text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2"
            href="#">
            <span>Comunicados</span>
        </a>
    </div>
    <div class="relative header-group group">
        <a href="#"
            class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link hover:text-brand-primary transition-colors px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-brand-primary/50 focus:ring-offset-2">
            <span>Normativa</span>
            <span
                class="material-icons text-sm ml-1 group-hover:rotate-180 transition-transform duration-200">expand_more</span>
        </a>
        <div
            class="submenu absolute z-50 left-0 w-64 p-3 rounded-lg shadow-xl bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 translate-y-1 transition-all duration-200">
            <div class="space-y-1">
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Leyes y Decretos</a>
                <a class="block px-4 py-2.5 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-md"
                    href="#">Resoluciones</a>
            </div>
        </div>
    </div>
    <?php
}

// Función para menú móvil por defecto - CORREGIDO (SIN BORDES INTERNOS)
function edusiteco_default_mobile_menu()
{
    ?>
    <div class="border-b border-border-light dark:border-border-dark last:border-b-0">
        <div class="flex items-center">
            <a href="#"
                class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                La Institución
            </a>
            <button
                class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                onclick="this.classList.toggle('text-brand-primary'); this.classList.toggle('rotate-180'); this.parentNode.nextElementSibling.classList.toggle('hidden')">
                <span class="material-icons text-sm transition-transform duration-200">expand_more</span>
            </button>
        </div>
        <div class="hidden bg-gray-50 dark:bg-gray-800">
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Misión y Visión</a>
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Nuestra Historia</a>
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Organigrama</a>
        </div>
    </div>
    <div class="border-b border-border-light dark:border-border-dark last:border-b-0">
        <div class="flex items-center">
            <a href="#"
                class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                Sedes
            </a>
            <button
                class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                onclick="this.classList.toggle('text-brand-primary'); this.classList.toggle('rotate-180'); this.parentNode.nextElementSibling.classList.toggle('hidden')">
                <span class="material-icons text-sm transition-transform duration-200">expand_more</span>
            </button>
        </div>
        <div class="hidden bg-gray-50 dark:bg-gray-800">
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Sede Principal</a>
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Sedes Regionales</a>
        </div>
    </div>
    <a class="block pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors"
        href="#">
        Comunicados
    </a>
    <div class="border-b border-border-light dark:border-border-dark last:border-b-0">
        <div class="flex items-center">
            <a href="#"
                class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                Normativa
            </a>
            <button
                class="mobile-toggle flex-shrink-0 px-4 py-3.5 text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                onclick="this.classList.toggle('text-brand-primary'); this.classList.toggle('rotate-180'); this.parentNode.nextElementSibling.classList.toggle('hidden')">
                <span class="material-icons text-sm transition-transform duration-200">expand_more</span>
            </button>
        </div>
        <div class="hidden bg-gray-50 dark:bg-gray-800">
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Leyes y Decretos</a>
            <a class="block pl-8 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                href="#">Resoluciones</a>
        </div>
    </div>
    <?php
}

