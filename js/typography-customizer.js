/**
 * Archivo: js/typography-customizer.js
 * Preview en tiempo real de tipografía en el Customizer
 */

(function($) {
    'use strict';
    
    // Función para cargar Google Fonts dinámicamente
    function loadGoogleFont(fontFamily) {
        if (!fontFamily || fontFamily === '') return;
        
        // Remover fuente anterior si existe
        $('#edusiteco-preview-font').remove();
        
        // Crear URL de Google Fonts
        const fontUrl = 'https://fonts.googleapis.com/css2?family=' + fontFamily + '&display=swap';
        
        // Agregar link al head
        $('<link>')
            .attr({
                'id': 'edusiteco-preview-font',
                'rel': 'stylesheet',
                'href': fontUrl
            })
            .appendTo('head');
    }
    
    // Función para extraer nombre de fuente
    function getFontName(fontValue) {
        return fontValue.split(':')[0];
    }
    
    // ========== BODY TYPOGRAPHY ==========
    
    // Fuente del cuerpo
    wp.customize('body_font_family', function(value) {
        value.bind(function(to) {
            loadGoogleFont(to);
            const fontName = getFontName(to);
            $('body').css('font-family', "'" + fontName + "', sans-serif");
        });
    });
    
    // Tamaño de fuente del cuerpo
    wp.customize('body_font_size', function(value) {
        value.bind(function(to) {
            $('body').css('font-size', to + 'px');
        });
    });
    
    // Peso de fuente del cuerpo
    wp.customize('body_font_weight', function(value) {
        value.bind(function(to) {
            $('body').css('font-weight', to);
        });
    });
    
    // Color del texto del cuerpo
    wp.customize('body_text_color', function(value) {
        value.bind(function(to) {
            $('body').css('color', to);
        });
    });
    
    // Altura de línea del cuerpo
    wp.customize('body_line_height', function(value) {
        value.bind(function(to) {
            $('body').css('line-height', to);
        });
    });
    
    // ========== HEADINGS TYPOGRAPHY ==========
    
    // Fuente de encabezados
    wp.customize('headings_font_family', function(value) {
        value.bind(function(to) {
            loadGoogleFont(to);
            const fontName = getFontName(to);
            $('h1, h2, h3, h4, h5, h6').css('font-family', "'" + fontName + "', sans-serif");
        });
    });
    
    // Peso de fuente de encabezados
    wp.customize('headings_font_weight', function(value) {
        value.bind(function(to) {
            $('h1, h2, h3, h4, h5, h6').css('font-weight', to);
        });
    });
    
    // Color de encabezados
    wp.customize('headings_text_color', function(value) {
        value.bind(function(to) {
            $('h1, h2, h3, h4, h5, h6').css('color', to);
        });
    });
    
    // Transformación de texto de encabezados
    wp.customize('headings_text_transform', function(value) {
        value.bind(function(to) {
            $('h1, h2, h3, h4, h5, h6').css('text-transform', to);
        });
    });
    
    // ========== TAMAÑOS INDIVIDUALES H1-H6 ==========
    
    wp.customize('h1_font_size', function(value) {
        value.bind(function(to) {
            $('h1').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h2_font_size', function(value) {
        value.bind(function(to) {
            $('h2').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h3_font_size', function(value) {
        value.bind(function(to) {
            $('h3').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h4_font_size', function(value) {
        value.bind(function(to) {
            $('h4').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h5_font_size', function(value) {
        value.bind(function(to) {
            $('h5').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h6_font_size', function(value) {
        value.bind(function(to) {
            $('h6').css('font-size', to + 'px');
        });
    });
    
    // ========== MENU TYPOGRAPHY ==========
    
    // Tamaño de fuente del menú
    wp.customize('menu_font_size', function(value) {
        value.bind(function(to) {
            $('nav a, .header-group a, .nav-links a').css('font-size', to + 'px');
        });
    });
    
    // Peso de fuente del menú
    wp.customize('menu_font_weight', function(value) {
        value.bind(function(to) {
            $('nav a, .header-group a, .nav-links a').css('font-weight', to);
        });
    });
    
    // Color del menú
    wp.customize('menu_text_color', function(value) {
        value.bind(function(to) {
            $('nav a, .header-group a, .nav-links a').css('color', to);
        });
    });
    
    // Transformación de texto del menú
    wp.customize('menu_text_transform', function(value) {
        value.bind(function(to) {
            $('nav a, .header-group a, .nav-links a').css('text-transform', to);
        });
    });
    
})(jQuery);