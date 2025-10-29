<?php

function hex_to_hsl($hex) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2)) / 255;
    $g = hexdec(substr($hex, 2, 2)) / 255;
    $b = hexdec(substr($hex, 4, 2)) / 255;
    
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $l = ($max + $min) / 2;
    
    if ($max == $min) {
        $h = $s = 0;
    } else {
        $d = $max - $min;
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
        
        switch ($max) {
            case $r:
                $h = (($g - $b) / $d + ($g < $b ? 6 : 0)) / 6;
                break;
            case $g:
                $h = (($b - $r) / $d + 2) / 6;
                break;
            case $b:
                $h = (($r - $g) / $d + 4) / 6;
                break;
        }
    }
    
    $h = round($h * 360);
    $s = round($s * 100);
    $l = round($l * 100);
    
    return "$h $s% $l%";
}

// Ajustar luminosidad para modo oscuro
function adjust_hsl_for_dark($hsl, $lightness_increase = 15) {
    list($h, $s, $l) = explode(' ', $hsl);
    $l = (int)str_replace('%', '', $l);
    $l = min(100, $l + $lightness_increase);
    return "$h $s $l%";
}

// Registrar opciones en el Customizer de WordPress
function theme_color_customizer($wp_customize) {
    // Sección de colores personalizados
    $wp_customize->add_section('theme_brand_colors', array(
        'title'    => __('Colores de Marca', 'tu-tema'),
        'priority' => 30,
    ));
    
    // Color Primario
    $wp_customize->add_setting('brand_color_primary', array(
        'default'           => '#0367A6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand_color_primary', array(
        'label'    => __('Color Primario', 'tu-tema'),
        'section'  => 'theme_brand_colors',
        'settings' => 'brand_color_primary',
    )));
    
    // Color Secundario
    $wp_customize->add_setting('brand_color_secondary', array(
        'default'           => '#03658C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand_color_secondary', array(
        'label'    => __('Color Secundario', 'tu-tema'),
        'section'  => 'theme_brand_colors',
        'settings' => 'brand_color_secondary',
    )));
    
    // Color Acento
    $wp_customize->add_setting('brand_color_accent', array(
        'default'           => '#6C8C3B',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand_color_accent', array(
        'label'    => __('Color Acento', 'tu-tema'),
        'section'  => 'theme_brand_colors',
        'settings' => 'brand_color_accent',
    )));
    
    // Color Advertencia
    $wp_customize->add_setting('brand_color_warning', array(
        'default'           => '#F28705',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand_color_warning', array(
        'label'    => __('Color Advertencia', 'tu-tema'),
        'section'  => 'theme_brand_colors',
        'settings' => 'brand_color_warning',
    )));
    
    // Color Peligro
    $wp_customize->add_setting('brand_color_danger', array(
        'default'           => '#D96907',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand_color_danger', array(
        'label'    => __('Color Peligro', 'tu-tema'),
        'section'  => 'theme_brand_colors',
        'settings' => 'brand_color_danger',
    )));
}
add_action('customize_register', 'theme_color_customizer');

// Inyectar variables CSS personalizadas en el head
function theme_custom_colors_css() {
    // Obtener colores del customizer
    $primary   = get_theme_mod('brand_color_primary', '#0367A6');
    $secondary = get_theme_mod('brand_color_secondary', '#03658C');
    $accent    = get_theme_mod('brand_color_accent', '#6C8C3B');
    $warning   = get_theme_mod('brand_color_warning', '#F28705');
    $danger    = get_theme_mod('brand_color_danger', '#D96907');
    
    // Convertir a HSL
    $primary_hsl   = hex_to_hsl($primary);
    $secondary_hsl = hex_to_hsl($secondary);
    $accent_hsl    = hex_to_hsl($accent);
    $warning_hsl   = hex_to_hsl($warning);
    $danger_hsl    = hex_to_hsl($danger);
    
    // Ajustar para modo oscuro
    $primary_dark   = adjust_hsl_for_dark($primary_hsl, 17);
    $secondary_dark = adjust_hsl_for_dark($secondary_hsl, 12);
    $accent_dark    = adjust_hsl_for_dark($accent_hsl, 16);
    $warning_dark   = adjust_hsl_for_dark($warning_hsl, 11);
    $danger_dark    = adjust_hsl_for_dark($danger_hsl, 14);
    
    // Generar CSS personalizado
    ?>
    <style id="theme-custom-colors">
        :root {
            --color-brand-primary: <?php echo esc_attr($primary_hsl); ?>;
            --color-brand-secondary: <?php echo esc_attr($secondary_hsl); ?>;
            --color-brand-accent: <?php echo esc_attr($accent_hsl); ?>;
            --color-brand-warning: <?php echo esc_attr($warning_hsl); ?>;
            --color-brand-danger: <?php echo esc_attr($danger_hsl); ?>;
        }
        
        .dark {
            --color-brand-primary: <?php echo esc_attr($primary_dark); ?>;
            --color-brand-secondary: <?php echo esc_attr($secondary_dark); ?>;
            --color-brand-accent: <?php echo esc_attr($accent_dark); ?>;
            --color-brand-warning: <?php echo esc_attr($warning_dark); ?>;
            --color-brand-danger: <?php echo esc_attr($danger_dark); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'theme_custom_colors_css');

// Preview en vivo en el Customizer
function edusiteco_theme_customizer_live_preview() {
    wp_enqueue_script(
        'theme-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-palette.js',
        array('customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'edusiteco_theme_customizer_live_preview');