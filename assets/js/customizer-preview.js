/**
 * File customizer-preview.js.
 *
 * Instantly previews changes in the Customizer.
 *
 * @package edusiteco
 */

( function( $ ) {

    // Abort if wp.customize is not available.
    if ( ! wp.customize ) {
        return;
    }

    // 1. Vista previa para la imagen del Hero de Símbolos
    wp.customize( 'simbolos_hero_image', function( value ) {
        value.bind( function( newval ) {
            // Busca la sección del hero y actualiza su estilo de fondo.
            // Asegúrate de que el selector coincida con tu HTML en page-institutional-symbols.php
            var heroSection = document.querySelector('.site-main section:first-child');
            if (heroSection) {
                heroSection.style.backgroundImage = 'linear-gradient(rgba(51, 102, 204, 0.85), rgba(51, 102, 204, 0.9)), url(' + newval + ')';
            }
        } );
    } );

    // 2. Vista previa para el subtítulo del Hero
    wp.customize( 'simbolos_subtitle', function( value ) {
        value.bind( function( newval ) {
            $( '.site-main section:first-child .text-xl' ).text( newval );
        } );
    } );

    // 3. Vista previa para el título del Escudo
    wp.customize( 'escudo_title', function( value ) {
        value.bind( function( newval ) {
            // Busca el H2 del escudo por su ID y actualiza el texto.
            // Añadiremos un ID al H2 en la plantilla para que esto funcione.
            $( '#escudo-title' ).text( newval );
        } );
    } );

    // 4. Vista previa para la descripción del Escudo
    wp.customize( 'escudo_description', function( value ) {
        value.bind( function( newval ) {
            $( '#escudo-description' ).html( newval.replace(/\n/g, '<br>') );
        } );
    } );

} )( jQuery );