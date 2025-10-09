<?php
/**
 * edusiteco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edusiteco
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edusiteco_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on edusiteco, use a find and replace
		* to change 'edusiteco' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'edusiteco', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'edusiteco' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'edusiteco_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for block templates. This is key for hybrid themes.
	add_theme_support( 'block-templates' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'edusiteco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edusiteco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edusiteco_content_width', 640 );
}
add_action( 'after_setup_theme', 'edusiteco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edusiteco_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'edusiteco' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'edusiteco' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'edusiteco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edusiteco_scripts() {
	// WordPress theme info (required but contains only header)
	wp_enqueue_style( 'edusiteco-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// Main Tailwind CSS stylesheet
	wp_enqueue_style( 'edusiteco-base', get_template_directory_uri() . '/assets/css/index.css', array(), _S_VERSION );
	wp_style_add_data( 'edusiteco-base', 'rtl', 'replace' );

	// RTL stylesheet for Tailwind
	if ( is_rtl() ) {
		wp_enqueue_style( 'edusiteco-base-rtl', get_template_directory_uri() . '/assets/css/base-rtl.css', array( 'edusiteco-base' ), _S_VERSION );
	}

	// Main theme script
	$main_js_path = get_template_directory() . '/assets/js/index.asset.php';
    $main_js_dependencies = file_exists($main_js_path) ? require($main_js_path) : array('dependencies' => array(), 'version' => _S_VERSION);

	wp_enqueue_script( 'edusiteco-main', get_template_directory_uri() . '/assets/js/index.js', $main_js_dependencies['dependencies'], $main_js_dependencies['version'], true );

	// Navigation script (keep existing if exists)
	if ( file_exists( get_template_directory() . '/js/navigation.js' ) ) {
		wp_enqueue_script( 'edusiteco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	}

	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Pass data to JavaScript
	wp_localize_script( 'edusiteco-main', 'edusiteco_data', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'edusiteco_nonce' ),
		'theme_url' => get_template_directory_uri(),
	) );
}
add_action( 'wp_enqueue_scripts', 'edusiteco_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Incluir walkers de navegación
require get_template_directory() . '/inc/nav-walkers.php';

// Registrar menús de navegación
function edusiteco_register_menus() {
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary Menu', 'edusiteco'),
        )
    );
}
add_action('init', 'edusiteco_register_menus');

# Front Page
function edusiteco_enqueue_swiper() {
    if (is_front_page()) {
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.0', true);
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.0.0');
    }
}
add_action('wp_enqueue_scripts', 'edusiteco_enqueue_swiper');

/**
 * Devuelve los datos de los hitos históricos.
 * En un proyecto real, estos datos vendrían de un Custom Post Type,
 * campos personalizados (ACF Repeater) o un bloque personalizado.
 *
 * @return array
 */
function edusiteco_get_hitos_historia() {
    return array(
        array(
            'año' => '1965',
            'titulo' => __('Fundación del Colegio', 'edusiteco'),
            'descripcion' => __('Iniciamos con 35 estudiantes y 4 profesores en el barrio La Soledad, Bogotá.', 'edusiteco'),
            'icono' => '🏛️'
        ),
        array(
            'año' => '1978',
            'titulo' => __('Primera Promoción', 'edusiteco'),
            'descripcion' => __('Graduamos nuestra primera promoción de bachilleres, marcando el inicio de nuestra tradición.', 'edusiteco'),
            'icono' => '🎓'
        ),
        array(
            'año' => '1992',
            'titulo' => __('Nueva Sede', 'edusiteco'),
            'descripcion' => __('Nos trasladamos a nuestra sede actual en el barrio El Recuerdo con instalaciones modernas.', 'edusiteco'),
            'icono' => '🏫'
        ),
        array(
            'año' => '2005',
            'titulo' => __('Certificación de Calidad', 'edusiteco'),
            'descripcion' => __('Obtenemos la certificación ISO 9001 por nuestros procesos educativos y de gestión.', 'edusiteco'),
            'icono' => '⭐'
        ),
        array(
            'año' => '2018',
            'titulo' => __('Modernización Tecnológica', 'edusiteco'),
            'descripcion' => __('Implementación de laboratorios de tecnología y robótica en el proceso educativo.', 'edusiteco'),
            'icono' => '💻'
        ),
        array(
            'año' => '2023',
            'titulo' => __('Expansión Deportiva', 'edusiteco'),
            'descripcion' => __('Inauguración de nuevas canchas y espacios deportivos para nuestros estudiantes.', 'edusiteco'),
            'icono' => '⚽'
        )
    );
}

/**
 * Devuelve los datos de los logros destacados.
 *
 * @return array
 */
function edusiteco_get_logros_historia() {
    return array(
        array('titulo' => __('Premio Excelencia', 'edusiteco'), 'descripcion' => __('Reconocimiento del Ministerio de Educación (2019)', 'edusiteco'), 'icono' => '🏆', 'color' => 'from-yellow-400 to-yellow-500'),
        array('titulo' => __('Certificación Verde', 'edusiteco'), 'descripcion' => __('Primer colegio certificado ambientalmente', 'edusiteco'), 'icono' => '🌱', 'color' => 'from-green-400 to-green-500'),
        array('titulo' => __('Olimpiadas Matemáticas', 'edusiteco'), 'descripcion' => __('15 medallas en competencias internacionales', 'edusiteco'), 'icono' => '📚', 'color' => 'from-blue-400 to-blue-500'),
        array('titulo' => __('Deportes', 'edusiteco'), 'descripcion' => __('Campeones intercolegiales 2022-2023', 'edusiteco'), 'icono' => '⚽', 'color' => 'from-red-400 to-red-500')
    );
}

/**
 * Devuelve los datos ficticios de los valores.
 * Se usa como fallback si el CPT 'valor' no tiene entradas.
 *
 * @return array
 */
function edusiteco_get_valores_ficticios() {
    return array(
        array(
            'icono' => '🤝',
            'titulo' => __('Respeto', 'edusiteco'),
            'descripcion' => __('Promovemos relaciones basadas en la empatía, tolerancia y reconocimiento mutuo.', 'edusiteco')
        ),
        array(
            'icono' => '✅',
            'titulo' => __('Responsabilidad', 'edusiteco'),
            'descripcion' => __('Asumimos compromisos con disciplina, honestidad y sentido del deber.', 'edusiteco')
        ),
        array(
            'icono' => '💡',
            'titulo' => __('Excelencia', 'edusiteco'),
            'descripcion' => __('Buscamos la superación constante en todos los aspectos de nuestra labor educativa.', 'edusiteco')
        ),
        // Puedes añadir los demás valores aquí si lo deseas
    );
}


// Funciones para personalizar los símbolos institucionales
function edusiteco_simbolos_customize_register($wp_customize) {
    // Sección para Símbolos Institucionales
    $wp_customize->add_section('simbolos_institucionales', array(
        'title' => __('Símbolos Institucionales', 'edusiteco'),
        'priority' => 40,
    ));

    // Hero Section
    $wp_customize->add_setting('simbolos_hero_image');
    $wp_customize->add_setting('simbolos_subtitle', array(
        'default' => 'Emblemas que nos identifican y nos unen como comunidad educativa'
    ));

    // Escudo
    $wp_customize->add_setting('escudo_image');
    $wp_customize->add_setting('escudo_alt', array('default' => 'Escudo del Colegio San Martín'));
    $wp_customize->add_setting('escudo_title', array('default' => 'Escudo Institucional'));
    $wp_customize->add_setting('escudo_description');

    // Bandera
    $wp_customize->add_setting('bandera_image');
    $wp_customize->add_setting('bandera_alt', array('default' => 'Bandera del Colegio San Martín'));
    $wp_customize->add_setting('bandera_title', array('default' => 'Bandera Institucional'));
    $wp_customize->add_setting('bandera_description');

    // Himno
    $wp_customize->add_setting('himno_title', array('default' => 'Nuestro Himno'));
    $wp_customize->add_setting('himno_audio_url');
    $wp_customize->add_setting('himno_audio_label', array('default' => 'Audio del Himno del Colegio San Martín'));
    $wp_customize->add_setting('himno_letra');

    // Lema
    $wp_customize->add_setting('lema_title', array('default' => 'Nuestro Lema'));
    $wp_customize->add_setting('lema_text', array('default' => 'Saber, Honor y Disciplina'));
    $wp_customize->add_setting('lema_explicacion');

    // Frase Final
    $wp_customize->add_setting('simbolos_frase_final', array(
        'default' => 'Nuestros símbolos reflejan la historia, el orgullo y los valores que nos inspiran cada día.'
    ));

    // Controles para upload de imágenes...
    // (Aquí irían los controles para cada setting)
}
add_action('customize_register', 'edusiteco_simbolos_customize_register');
