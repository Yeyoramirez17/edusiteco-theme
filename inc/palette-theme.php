<?php
/**
 * Sistema de personalización de colores para el tema
 * Añadir este código a functions.php
 */

// Convertir HEX a HSL
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
    $primary = get_theme_mod('brand_color_primary', '#0367A6');
    $secondary = get_theme_mod('brand_color_secondary', '#03658C');
    $accent = get_theme_mod('brand_color_accent', '#6C8C3B');
    $warning = get_theme_mod('brand_color_warning', '#F28705');
    $danger = get_theme_mod('brand_color_danger', '#D96907');
    
    // Convertir a HSL
    $primary_hsl = hex_to_hsl($primary);
    $secondary_hsl = hex_to_hsl($secondary);
    $accent_hsl = hex_to_hsl($accent);
    $warning_hsl = hex_to_hsl($warning);
    $danger_hsl = hex_to_hsl($danger);
    
    // Generar variantes de color (50-900)
    $primary_variants = generate_color_variants($primary_hsl);
    $secondary_variants = generate_color_variants($secondary_hsl);
    $accent_variants = generate_color_variants($accent_hsl);
    $warning_variants = generate_color_variants($warning_hsl);
    $danger_variants = generate_color_variants($danger_hsl);
    
    // Ajustar para modo oscuro
    $primary_dark = generate_color_variants($primary_hsl, true);
    $secondary_dark = generate_color_variants($secondary_hsl, true);
    $accent_dark = generate_color_variants($accent_hsl, true);
    $warning_dark = generate_color_variants($warning_hsl, true);
    $danger_dark = generate_color_variants($danger_hsl, true);
    
    // Generar CSS personalizado
    ?>
    <style id="theme-custom-colors">
        :root {
            /* PRIMARY */
            --color-brand-primary: <?php echo esc_attr($primary_hsl); ?>;
            <?php foreach ($primary_variants as $shade => $value): ?>
            --color-brand-primary-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* SECONDARY */
            --color-brand-secondary: <?php echo esc_attr($secondary_hsl); ?>;
            <?php foreach ($secondary_variants as $shade => $value): ?>
            --color-brand-secondary-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* ACCENT */
            --color-brand-accent: <?php echo esc_attr($accent_hsl); ?>;
            <?php foreach ($accent_variants as $shade => $value): ?>
            --color-brand-accent-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* WARNING */
            --color-brand-warning: <?php echo esc_attr($warning_hsl); ?>;
            <?php foreach ($warning_variants as $shade => $value): ?>
            --color-brand-warning-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* DANGER */
            --color-brand-danger: <?php echo esc_attr($danger_hsl); ?>;
            <?php foreach ($danger_variants as $shade => $value): ?>
            --color-brand-danger-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
        }
        
        .dark {
            /* PRIMARY DARK */
            --color-brand-primary: <?php echo esc_attr($primary_dark[500]); ?>;
            <?php foreach ($primary_dark as $shade => $value): ?>
            --color-brand-primary-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* SECONDARY DARK */
            --color-brand-secondary: <?php echo esc_attr($secondary_dark[500]); ?>;
            <?php foreach ($secondary_dark as $shade => $value): ?>
            --color-brand-secondary-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* ACCENT DARK */
            --color-brand-accent: <?php echo esc_attr($accent_dark[500]); ?>;
            <?php foreach ($accent_dark as $shade => $value): ?>
            --color-brand-accent-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* WARNING DARK */
            --color-brand-warning: <?php echo esc_attr($warning_dark[500]); ?>;
            <?php foreach ($warning_dark as $shade => $value): ?>
            --color-brand-warning-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
            
            /* DANGER DARK */
            --color-brand-danger: <?php echo esc_attr($danger_dark[500]); ?>;
            <?php foreach ($danger_dark as $shade => $value): ?>
            --color-brand-danger-<?php echo $shade; ?>: <?php echo esc_attr($value); ?>;
            <?php endforeach; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'theme_custom_colors_css');

// Función para generar variantes de color (50-900)
function generate_color_variants($hsl, $dark_mode = false) {
    list($h, $s, $l) = explode(' ', $hsl);
    $h = (int)$h;
    $s = (int)str_replace('%', '', $s);
    $l = (int)str_replace('%', '', $l);
    
    $variants = array();
    
    if ($dark_mode) {
        // Modo oscuro: invertir la escala
        $variants[50] = "$h $s% 10%";
        $variants[100] = "$h $s% 15%";
        $variants[200] = "$h $s% 20%";
        $variants[300] = "$h $s% " . max(10, $l - 15) . "%";
        $variants[400] = "$h $s% " . max(15, $l - 5) . "%";
        $variants[500] = "$h $s% " . min(85, $l + 12) . "%"; // Base más clara
        $variants[600] = "$h $s% " . min(90, $l + 20) . "%";
        $variants[700] = "$h $s% " . min(92, $l + 28) . "%";
        $variants[800] = "$h $s% " . min(95, $l + 35) . "%";
        $variants[900] = "$h $s% " . min(97, $l + 42) . "%";
    } else {
        // Modo claro: escala normal
        $variants[50] = "$h $s% 95%";
        $variants[100] = "$h $s% 90%";
        $variants[200] = "$h $s% 80%";
        $variants[300] = "$h $s% 70%";
        $variants[400] = "$h $s% " . min(95, $l + 15) . "%";
        $variants[500] = "$h $s% $l%"; // Base original
        $variants[600] = "$h $s% " . max(5, $l - 8) . "%";
        $variants[700] = "$h $s% " . max(5, $l - 13) . "%";
        $variants[800] = "$h $s% " . max(5, $l - 18) . "%";
        $variants[900] = "$h $s% " . max(5, $l - 23) . "%";
    }
    
    return $variants;
}

// Preview
function theme_customizer_live_preview() {
    wp_enqueue_script(
        'theme-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-palette.js',
        array('customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'theme_customizer_live_preview');