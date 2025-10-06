<?php
/**
 * Custom Nav Walkers for the theme
 * 
 * @package edusiteco
 */

// Walker para navegación desktop
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

        if ($has_children) {
            $output .= $indent . '<div class="relative header-group">';
            $output .= '<button class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 rounded-sm px-2 py-1">';
            $output .= '<span>' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
            $output .= '<span class="material-icons text-sm ml-1">expand_more</span>';
            $output .= '</button>';
            $output .= '<div class="submenu absolute z-50 mt-2 w-56 rounded-md shadow-lg bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark">';
            $output .= '<div class="py-1">';
        } else {
            $output .= $indent . '<div class="header-group">';
            $output .= '<a class="text-text-light dark:text-text-dark text-sm font-semibold underline-link hover:text-primary transition-colors px-2 py-1" href="' . esc_url($item->url) . '">';
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

// Walker para navegación móvil
class Mobile_Nav_Walker extends Walker_Nav_Menu
{

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        if ($has_children) {
            $output .= '<div class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<button class="w-full text-left pl-3 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 flex justify-between items-center transition-colors" onclick="this.nextElementSibling.classList.toggle(\'hidden\')">';
            $output .= '<span>' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
            $output .= '<span class="material-icons text-sm transition-transform">expand_more</span>';
            $output .= '</button>';
            $output .= '<div class="hidden bg-gray-50 dark:bg-gray-800">';
        } else {
            $output .= '<a class="block pl-3 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark last:border-b-0 transition-colors" href="' . esc_url($item->url) . '">';
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

        // Para submenús en móvil
        $output .= "{$n}{$indent}<div class=\"pl-6 bg-white dark:bg-gray-800\">{$n}";
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

// Función para menú desktop por defecto
function edusiteco_default_menu(): void
{
    ?>
    <div class="relative header-group">
        <button
            class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 rounded-sm px-2 py-1">
            <span>La Institución</span>
            <span class="material-icons text-sm ml-1">expand_more</span>
        </button>
        <div
            class="submenu absolute z-50 mt-2 w-56 rounded-md shadow-lg bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark">
            <div class="py-1">
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Misión y Visión</a>
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Nuestra Historia</a>
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Organigrama</a>
            </div>
        </div>
    </div>
    <div class="relative header-group">
        <button
            class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 rounded-sm px-2 py-1">
            <span>Sedes</span>
            <span class="material-icons text-sm ml-1">expand_more</span>
        </button>
        <div
            class="submenu absolute z-50 mt-2 w-56 rounded-md shadow-lg bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark">
            <div class="py-1">
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Sede Principal</a>
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Sedes Regionales</a>
            </div>
        </div>
    </div>
    <div class="header-group">
        <a class="text-text-light dark:text-text-dark text-sm font-semibold underline-link hover:text-primary transition-colors px-2 py-1"
            href="#">
            <span>Comunicados</span>
        </a>
    </div>
    <div class="relative header-group">
        <button
            class="text-text-light dark:text-text-dark inline-flex items-center text-sm font-semibold underline-link focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 rounded-sm px-2 py-1">
            <span>Normativa</span>
            <span class="material-icons text-sm ml-1">expand_more</span>
        </button>
        <div
            class="submenu absolute z-50 mt-2 w-56 rounded-md shadow-lg bg-background-light dark:bg-background-dark ring-1 ring-black ring-opacity-5 border border-border-light dark:border-border-dark">
            <div class="py-1">
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Leyes y Decretos</a>
                <a class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    href="#">Resoluciones</a>
            </div>
        </div>
    </div>
    <?php
}

// Función para menú móvil por defecto
function edusiteco_default_mobile_menu()
{
    ?>
    <div class="border-b border-border-light dark:border-border-dark">
        <button
            class="w-full text-left pl-3 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 flex justify-between items-center transition-colors"
            onclick="this.nextElementSibling.classList.toggle('hidden')">
            <span>La Institución</span>
            <span class="material-icons text-sm transition-transform">expand_more</span>
        </button>
        <div class="hidden bg-gray-50 dark:bg-gray-800">
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark"
                href="#">Misión y Visión</a>
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark"
                href="#">Nuestra Historia</a>
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700"
                href="#">Organigrama</a>
        </div>
    </div>
    <div class="border-b border-border-light dark:border-border-dark">
        <button
            class="w-full text-left pl-3 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 flex justify-between items-center transition-colors"
            onclick="this.nextElementSibling.classList.toggle('hidden')">
            <span>Sedes</span>
            <span class="material-icons text-sm transition-transform">expand_more</span>
        </button>
        <div class="hidden bg-gray-50 dark:bg-gray-800">
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark"
                href="#">Sede Principal</a>
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700"
                href="#">Sedes Regionales</a>
        </div>
    </div>
    <a class="block pl-3 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark transition-colors"
        href="#">Comunicados</a>
    <div class="border-b border-border-light dark:border-border-dark">
        <button
            class="w-full text-left pl-3 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700 flex justify-between items-center transition-colors"
            onclick="this.nextElementSibling.classList.toggle('hidden')">
            <span>Normativa</span>
            <span class="material-icons text-sm transition-transform">expand_more</span>
        </button>
        <div class="hidden bg-gray-50 dark:bg-gray-800">
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-border-light dark:border-border-dark"
                href="#">Leyes y Decretos</a>
            <a class="block pl-6 pr-4 py-3 text-base font-medium text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700"
                href="#">Resoluciones</a>
        </div>
    </div>
    <?php
}