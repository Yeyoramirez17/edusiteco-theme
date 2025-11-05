<?php
// ============================
// Registrar CPT: Comunicados
// ============================
function edusite_register_comunicados_cpt() {
    $labels = [
        'name'               => __('Comunicados', 'edusiteco'),
        'singular_name'      => __('Comunicado', 'edusiteco'),
        'menu_name'          => __('Comunicados', 'edusiteco'),
        'name_admin_bar'     => __('Comunicado', 'edusiteco'),
        'add_new'            => __('Agregar nuevo', 'edusiteco'),
        'add_new_item'       => __('Agregar nuevo comunicado', 'edusiteco'),
        'new_item'           => __('Nuevo comunicado', 'edusiteco'),
        'edit_item'          => __('Editar comunicado', 'edusiteco'),
        'view_item'          => __('Ver comunicado', 'edusiteco'),
        'all_items'          => __('Todos los comunicados', 'edusiteco'),
        'search_items'       => __('Buscar comunicados', 'edusiteco'),
        'not_found'          => __('No se encontraron comunicados.', 'edusiteco'),
        'not_found_in_trash' => __('No hay comunicados en la papelera.', 'edusiteco'),
    ];

    $args = [
        'labels'             => $labels,
        'description'        => __('Comunicados oficiales del colegio dirigidos a la comunidad educativa: avisos institucionales, convocatorias, eventos, circulares y documentos (PDF/archivos).', 'edusiteco'),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'comunicados'],
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest'       => true, // compatible con el editor de bloques
        'taxonomies'         => ['category'],
    ];

    register_post_type('comunicado', $args);
}
add_action('init', 'edusite_register_comunicados_cpt');

/**
 * Crea automáticamente la categoría "Convocatorias" al activar el tema.
 */
function edusite_create_default_categories() {
    # Check if the category exists
    if (!term_exists('Comunicado', 'category')) {
        wp_insert_term(
            'Comunicado', # Name
            'category',   # Taxonomy
            [
                'slug' => 'comunicado',
                'description' => 'Publicaciones oficiales del colegio dirigidas a la comunidad educativa: avisos institucionales, convocatorias, eventos, circulares y documentos (PDF/archivos).'
            ]
        );
    }
    if (!term_exists('Convocatorias', 'category')) {
        wp_insert_term(
            'Convocatorias', # Name
            'category',      # Taxonomy
            [
                'slug' => 'convocatorias',
                'description' => 'Publicaciones relacionadas con convocatorias, concursos, inscripciones o procesos institucionales del colegio.'
            ]
        );
    }
    if (!term_exists('Eventos', 'category')) {
        wp_insert_term(
            'Eventos',  # Name
            'category', # Taxonomy
            [
                'slug' => 'eventos',
                'description' => 'Publicaciones relacionadas con eventos, actividades y celebraciones institucionales del colegio.'
            ]
        );
    }
    if (!term_exists('Circulares', 'category')) {
        wp_insert_term(
            'Circulares',  # Name
            'category',    # Taxonomy
            [
                'slug' => 'circulares',
                'description' => 'Publicaciones relacionadas con circulares y comunicados internos del colegio.'
            ]
        );
    }
    
}
add_action('init', 'edusite_create_default_categories');


// ============================
// Metaboxes para Comunicados
// ============================

function edusite_add_comunicado_metaboxes() {
    add_meta_box(
        'comunicado_detalles',
        'Detalles del Comunicado',
        'edusite_render_comunicado_metabox',
        'comunicado',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'edusite_add_comunicado_metaboxes');

function edusite_render_comunicado_metabox($post) {
    // Recuperar valores guardados
    $fecha_evento = get_post_meta($post->ID, '_fecha_evento', true);
    $pdf_url = get_post_meta($post->ID, '_pdf_url', true);

    wp_nonce_field('guardar_comunicado_detalles', 'comunicado_detalles_nonce');
    ?>
        <div style="margin-top: 10px;">
            <label for="fecha_evento" style="display:block; font-weight:600;">📅 Fecha del evento:</label>
            <input 
                type="date" 
                id="fecha_evento" 
                name="fecha_evento" 
                value="<?php echo esc_attr($fecha_evento); ?>" 
                style="width:100%; max-width:300px; margin-top:4px;"
            />

            <hr style="margin:20px 0;">

            <label for="pdf_url" style="display:block; font-weight:600;">📎 Archivo PDF (opcional):</label>
            <input 
                type="url" id="pdf_url" 
                name="pdf_url" value="<?php echo esc_attr($pdf_url); ?>" 
                placeholder="https://ejemplo.com/archivo.pdf" 
                style="width:100%; margin-top:4px;"
            />
            <p style="color:#666;">Puedes subir el archivo en la Biblioteca de medios y pegar aquí su URL.</p>
        </div>
    <?php
}

// Guardar los campos personalizados
function edusite_guardar_comunicado_detalles($post_id) {
    if (!isset($_POST['comunicado_detalles_nonce']) ||
        !wp_verify_nonce($_POST['comunicado_detalles_nonce'], 'guardar_comunicado_detalles')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Guardar fecha
    if (isset($_POST['fecha_evento'])) {
        update_post_meta($post_id, '_fecha_evento', sanitize_text_field($_POST['fecha_evento']));
    }

    // Guardar PDF
    if (isset($_POST['pdf_url'])) {
        update_post_meta($post_id, '_pdf_url', esc_url_raw($_POST['pdf_url']));
    }
}
add_action('save_post', 'edusite_guardar_comunicado_detalles');
