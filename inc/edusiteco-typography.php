<?php
/**
 * Sistema de Tipografía Personalizable
 * Añadir este código a functions.php
 * 
 * @package edusiteco
 */

// ============================================
// 1. REGISTRAR GOOGLE FONTS DISPONIBLES
// ============================================
function edusiteco_get_google_fonts() {
    return array(
        '' => 'Fuente por defecto',
        'Roboto:300,400,500,700' => 'Roboto',
        'Open Sans:300,400,600,700' => 'Open Sans',
        'Lato:300,400,700,900' => 'Lato',
        'Montserrat:300,400,500,600,700,800' => 'Montserrat',
        'Poppins:300,400,500,600,700' => 'Poppins',
        'Inter:300,400,500,600,700' => 'Inter',
        'Nunito:300,400,600,700,800' => 'Nunito',
        'Raleway:300,400,500,600,700' => 'Raleway',
        'Work Sans:300,400,500,600,700' => 'Work Sans',
        'Plus Jakarta Sans:200,300,400,500,600,700' => 'Plus Jakarta Sans',
        'Ubuntu:300,400,500,700' => 'Ubuntu',
        'Merriweather:300,400,700,900' => 'Merriweather',
        'Playfair Display:400,500,600,700,800,900' => 'Playfair Display',
        'Source Sans Pro:300,400,600,700' => 'Source Sans Pro',
        'Quicksand:300,400,500,600,700' => 'Quicksand',
        'Outfit:300,400,500,600,700,800' => 'Outfit',
        'Space Grotesk:300,400,500,600,700' => 'Space Grotesk',
    );
}

// ============================================
// 2. REGISTRAR OPCIONES EN EL CUSTOMIZER
// ============================================
function edusiteco_typography_customizer($wp_customize) {
    
    // ========== PANEL PRINCIPAL ==========
    $wp_customize->add_panel('typography_panel', array(
        'title'       => __('Tipografía y Fuentes', 'edusiteco'),
        'description' => __('Personaliza las fuentes y tamaños del sitio', 'edusiteco'),
        'priority'    => 35,
    ));
    
    // ========== SECCIÓN: FUENTE PRINCIPAL (Body) ==========
    $wp_customize->add_section('body_typography', array(
        'title'    => __('Fuente Principal (Cuerpo)', 'edusiteco'),
        'panel'    => 'typography_panel',
        'priority' => 10,
    ));
    
    // Google Font - Body
    $wp_customize->add_setting('body_font_family', array(
        'default'           => 'Plus Jakarta Sans:200,300,400,500,600,700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_font_family', array(
        'label'    => __('Familia de Fuente', 'edusiteco'),
        'section'  => 'body_typography',
        'type'     => 'select',
        'choices'  => edusiteco_get_google_fonts(),
    ));
    
    // Tamaño de fuente - Body
    $wp_customize->add_setting('body_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_font_size', array(
        'label'       => __('Tamaño de Fuente (px)', 'edusiteco'),
        'description' => __('Tamaño base del texto del sitio', 'edusiteco'),
        'section'     => 'body_typography',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ));
    
    // Peso de fuente - Body
    $wp_customize->add_setting('body_font_weight', array(
        'default'           => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_font_weight', array(
        'label'   => __('Peso de Fuente', 'edusiteco'),
        'section' => 'body_typography',
        'type'    => 'select',
        'choices' => array(
            '300' => 'Ligera (300)',
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
        ),
    ));
    
    // Color de texto - Body
    $wp_customize->add_setting('body_text_color', array(
        'default'           => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_text_color', array(
        'label'    => __('Color del Texto', 'edusiteco'),
        'section'  => 'body_typography',
        'settings' => 'body_text_color',
    )));
    
    // Altura de línea - Body
    $wp_customize->add_setting('body_line_height', array(
        'default'           => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_line_height', array(
        'label'       => __('Altura de Línea', 'edusiteco'),
        'description' => __('Espaciado entre líneas de texto', 'edusiteco'),
        'section'     => 'body_typography',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 3,
            'step' => 0.1,
        ),
    ));
    
    // ========== SECCIÓN: ENCABEZADOS (H1-H6) ==========
    $wp_customize->add_section('headings_typography', array(
        'title'    => __('Encabezados (Títulos)', 'edusiteco'),
        'panel'    => 'typography_panel',
        'priority' => 20,
    ));
    
    // Google Font - Headings
    $wp_customize->add_setting('headings_font_family', array(
        'default'           => 'Montserrat:400,500,600,700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('headings_font_family', array(
        'label'    => __('Familia de Fuente', 'edusiteco'),
        'section'  => 'headings_typography',
        'type'     => 'select',
        'choices'  => edusiteco_get_google_fonts(),
    ));
    
    // Peso de fuente - Headings
    $wp_customize->add_setting('headings_font_weight', array(
        'default'           => '700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('headings_font_weight', array(
        'label'   => __('Peso de Fuente', 'edusiteco'),
        'section' => 'headings_typography',
        'type'    => 'select',
        'choices' => array(
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
            '800' => 'Extra-negrita (800)',
            '900' => 'Ultra-negrita (900)',
        ),
    ));
    
    // Color de encabezados
    $wp_customize->add_setting('headings_text_color', array(
        'default'           => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'headings_text_color', array(
        'label'    => __('Color de Títulos', 'edusiteco'),
        'section'  => 'headings_typography',
        'settings' => 'headings_text_color',
    )));
    
    // Transformación de texto - Headings
    $wp_customize->add_setting('headings_text_transform', array(
        'default'           => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('headings_text_transform', array(
        'label'   => __('Transformación de Texto', 'edusiteco'),
        'section' => 'headings_typography',
        'type'    => 'select',
        'choices' => array(
            'none'       => 'Normal',
            'uppercase'  => 'MAYÚSCULAS',
            'lowercase'  => 'minúsculas',
            'capitalize' => 'Primera Letra Mayúscula',
        ),
    ));
    
    // ========== TAMAÑOS INDIVIDUALES H1-H6 ==========
    
    // H1
    $wp_customize->add_setting('h1_font_size', array(
        'default'           => '36',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h1_font_size', array(
        'label'       => __('Tamaño H1 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 24, 'max' => 72, 'step' => 1),
    ));
    
    // H2
    $wp_customize->add_setting('h2_font_size', array(
        'default'           => '30',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h2_font_size', array(
        'label'       => __('Tamaño H2 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 20, 'max' => 60, 'step' => 1),
    ));
    
    // H3
    $wp_customize->add_setting('h3_font_size', array(
        'default'           => '24',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h3_font_size', array(
        'label'       => __('Tamaño H3 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 18, 'max' => 48, 'step' => 1),
    ));
    
    // H4
    $wp_customize->add_setting('h4_font_size', array(
        'default'           => '20',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h4_font_size', array(
        'label'       => __('Tamaño H4 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 16, 'max' => 36, 'step' => 1),
    ));
    
    // H5
    $wp_customize->add_setting('h5_font_size', array(
        'default'           => '18',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h5_font_size', array(
        'label'       => __('Tamaño H5 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 14, 'max' => 30, 'step' => 1),
    ));
    
    // H6
    $wp_customize->add_setting('h6_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h6_font_size', array(
        'label'       => __('Tamaño H6 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 12, 'max' => 24, 'step' => 1),
    ));
    
    // ========== SECCIÓN: MENÚ DE NAVEGACIÓN ==========
    $wp_customize->add_section('menu_typography', array(
        'title'    => __('Menú de Navegación', 'edusiteco'),
        'panel'    => 'typography_panel',
        'priority' => 30,
    ));
    
    // Tamaño de fuente - Menu
    $wp_customize->add_setting('menu_font_size', array(
        'default'           => '14',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('menu_font_size', array(
        'label'       => __('Tamaño de Fuente (px)', 'edusiteco'),
        'section'     => 'menu_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 12, 'max' => 20, 'step' => 1),
    ));
    
    // Peso de fuente - Menu
    $wp_customize->add_setting('menu_font_weight', array(
        'default'           => '600',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('menu_font_weight', array(
        'label'   => __('Peso de Fuente', 'edusiteco'),
        'section' => 'menu_typography',
        'type'    => 'select',
        'choices' => array(
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
        ),
    ));
    
    // Color del menú
    $wp_customize->add_setting('menu_text_color', array(
        'default'           => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_text_color', array(
        'label'    => __('Color del Texto', 'edusiteco'),
        'section'  => 'menu_typography',
        'settings' => 'menu_text_color',
    )));
    
    // Transformación de texto - Menu
    $wp_customize->add_setting('menu_text_transform', array(
        'default'           => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('menu_text_transform', array(
        'label'   => __('Transformación de Texto', 'edusiteco'),
        'section' => 'menu_typography',
        'type'    => 'select',
        'choices' => array(
            'none'       => 'Normal',
            'uppercase'  => 'MAYÚSCULAS',
            'lowercase'  => 'minúsculas',
            'capitalize' => 'Primera Letra Mayúscula',
        ),
    ));
}
add_action('customize_register', 'edusiteco_typography_customizer');

// ============================================
// 3. INYECTAR ESTILOS CSS PERSONALIZADOS
// ============================================
function edusiteco_typography_css() {
    // Obtener valores
    $body_font         = get_theme_mod('body_font_family', 'Plus Jakarta Sans:200,300,400,500,600,700');
    $body_size         = get_theme_mod('body_font_size', 16);
    $body_weight       = get_theme_mod('body_font_weight', '400');
    $body_color        = get_theme_mod('body_text_color', '#1A202C');
    $body_line_height  = get_theme_mod('body_line_height', '1.6');
    
    $headings_font      = get_theme_mod('headings_font_family', 'Montserrat:400,500,600,700');
    $headings_weight    = get_theme_mod('headings_font_weight', '700');
    $headings_color     = get_theme_mod('headings_text_color', '#1A202C');
    $headings_transform = get_theme_mod('headings_text_transform', 'none');
    
    $h1_size = get_theme_mod('h1_font_size', 36);
    $h2_size = get_theme_mod('h2_font_size', 30);
    $h3_size = get_theme_mod('h3_font_size', 24);
    $h4_size = get_theme_mod('h4_font_size', 20);
    $h5_size = get_theme_mod('h5_font_size', 18);
    $h6_size = get_theme_mod('h6_font_size', 16);
    
    $menu_size      = get_theme_mod('menu_font_size', 14);
    $menu_weight    = get_theme_mod('menu_font_weight', '600');
    $menu_color     = get_theme_mod('menu_text_color', '#1A202C');
    $menu_transform = get_theme_mod('menu_text_transform', 'none');
    
    // Extraer nombre de fuente para CSS
    $body_font_name = explode(':', $body_font)[0];
    $headings_font_name = explode(':', $headings_font)[0];
    
    ?>
    <style id="edusiteco-typography-customizer">
        /* Fuente del cuerpo */
        body {
            font-family: '<?php echo esc_attr($body_font_name); ?>', sans-serif;
            font-size: <?php echo esc_attr($body_size); ?>px;
            font-weight: <?php echo esc_attr($body_weight); ?>;
            color: <?php echo esc_attr($body_color); ?>;
            line-height: <?php echo esc_attr($body_line_height); ?>;
        }
        
        /* Encabezados */
        h1, h2, h3, h4, h5, h6 {
            font-family: '<?php echo esc_attr($headings_font_name); ?>', sans-serif;
            font-weight: <?php echo esc_attr($headings_weight); ?>;
            color: <?php echo esc_attr($headings_color); ?>;
            text-transform: <?php echo esc_attr($headings_transform); ?>;
        }
        
        h1 { font-size: <?php echo esc_attr($h1_size); ?>px; }
        h2 { font-size: <?php echo esc_attr($h2_size); ?>px; }
        h3 { font-size: <?php echo esc_attr($h3_size); ?>px; }
        h4 { font-size: <?php echo esc_attr($h4_size); ?>px; }
        h5 { font-size: <?php echo esc_attr($h5_size); ?>px; }
        h6 { font-size: <?php echo esc_attr($h6_size); ?>px; }
        
        /* Menú de navegación */
        nav a,
        .header-group a,
        .nav-links a {
            font-size: <?php echo esc_attr($menu_size); ?>px;
            font-weight: <?php echo esc_attr($menu_weight); ?>;
            color: <?php echo esc_attr($menu_color); ?>;
            text-transform: <?php echo esc_attr($menu_transform); ?>;
        }
        
        /* Modo oscuro - ajustar colores automáticamente */
        .dark body {
            color: <?php echo edusiteco_adjust_color_brightness($body_color, 180); ?>;
        }
        
        .dark h1, .dark h2, .dark h3, .dark h4, .dark h5, .dark h6 {
            color: <?php echo edusiteco_adjust_color_brightness($headings_color, 200); ?>;
        }
        
        .dark nav a,
        .dark .header-group a {
            color: <?php echo edusiteco_adjust_color_brightness($menu_color, 200); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'edusiteco_typography_css');

// ============================================
// 4. CARGAR GOOGLE FONTS
// ============================================
function edusiteco_load_google_fonts() {
    $body_font = get_theme_mod('body_font_family', 'Plus Jakarta Sans:200,300,400,500,600,700');
    $headings_font = get_theme_mod('headings_font_family', 'Montserrat:400,500,600,700');
    
    $fonts = array();
    
    if (!empty($body_font) && $body_font != '') {
        $fonts[] = $body_font;
    }
    
    if (!empty($headings_font) && $headings_font != '' && $headings_font != $body_font) {
        $fonts[] = $headings_font;
    }
    
    if (!empty($fonts)) {
        $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', $fonts) . '&display=swap';
        wp_enqueue_style('edusiteco-google-fonts', $fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'edusiteco_load_google_fonts');

// ============================================
// 5. FUNCIÓN AUXILIAR: AJUSTAR BRILLO
// ============================================
function edusiteco_adjust_color_brightness($hex, $brightness = 0) {
    // Remover #
    $hex = str_replace('#', '', $hex);
    
    // Convertir a RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    // Ajustar brillo
    $r = max(0, min(255, $r + $brightness));
    $g = max(0, min(255, $g + $brightness));
    $b = max(0, min(255, $b + $brightness));
    
    // Convertir de vuelta a HEX
    return '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT)
               . str_pad(dechex($g), 2, '0', STR_PAD_LEFT)
               . str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
}

// ============================================
// 6. PREVIEW EN VIVO (CUSTOMIZER)
// ============================================
function edusiteco_typography_customizer_live_preview() {
    wp_enqueue_script(
        'edusiteco-typography-customizer',
        get_template_directory_uri() . '/js/typography-customizer.js',
        array('customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'edusiteco_typography_customizer_live_preview');