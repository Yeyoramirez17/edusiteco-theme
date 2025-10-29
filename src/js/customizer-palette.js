/**
 * Archivo: js/customizer-preview.js
 * Preview en tiempo real de los colores en el Customizer
 */

(function($) {
    'use strict';
    
    // Función para convertir HEX a HSL
    function hexToHSL(hex) {
        // Remover el # si existe
        hex = hex.replace('#', '');
        
        // Convertir a RGB
        const r = parseInt(hex.substr(0, 2), 16) / 255;
        const g = parseInt(hex.substr(2, 2), 16) / 255;
        const b = parseInt(hex.substr(4, 2), 16) / 255;
        
        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;
        
        if (max === min) {
            h = s = 0; // acromático
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            
            switch (max) {
                case r:
                    h = ((g - b) / d + (g < b ? 6 : 0)) / 6;
                    break;
                case g:
                    h = ((b - r) / d + 2) / 6;
                    break;
                case b:
                    h = ((r - g) / d + 4) / 6;
                    break;
            }
        }
        
        h = Math.round(h * 360);
        s = Math.round(s * 100);
        l = Math.round(l * 100);
        
        return `${h} ${s}% ${l}%`;
    }
    
    // Función para ajustar luminosidad para modo oscuro
    function adjustForDarkMode(hsl, increase = 15) {
        const parts = hsl.split(' ');
        const h = parts[0];
        const s = parts[1];
        let l = parseInt(parts[2].replace('%', ''));
        
        l = Math.min(100, l + increase);
        
        return `${h} ${s} ${l}%`;
    }
    
    // Función para actualizar una variable CSS
    function updateColorVariable(setting, to) {
        const hslLight = hexToHSL(to);
        const hslDark = adjustForDarkMode(hslLight, 15);
        
        // Actualizar o crear el style tag
        let styleTag = document.getElementById('theme-custom-colors-preview');
        if (!styleTag) {
            styleTag = document.createElement('style');
            styleTag.id = 'theme-custom-colors-preview';
            document.head.appendChild(styleTag);
        }
        
        // Obtener valores actuales o usar defaults
        const colors = {
            primary: wp.customize('brand_color_primary')() || '#0367A6',
            secondary: wp.customize('brand_color_secondary')() || '#03658C',
            accent: wp.customize('brand_color_accent')() || '#6C8C3B',
            warning: wp.customize('brand_color_warning')() || '#F28705',
            danger: wp.customize('brand_color_danger')() || '#D96907'
        };
        
        // Convertir todos a HSL
        const hslColors = {
            primary: hexToHSL(colors.primary),
            secondary: hexToHSL(colors.secondary),
            accent: hexToHSL(colors.accent),
            warning: hexToHSL(colors.warning),
            danger: hexToHSL(colors.danger)
        };
        
        const hslDarkColors = {
            primary: adjustForDarkMode(hslColors.primary, 17),
            secondary: adjustForDarkMode(hslColors.secondary, 12),
            accent: adjustForDarkMode(hslColors.accent, 16),
            warning: adjustForDarkMode(hslColors.warning, 11),
            danger: adjustForDarkMode(hslColors.danger, 14)
        };
        
        // Generar CSS completo
        styleTag.innerHTML = `
            :root {
                --color-brand-primary: ${hslColors.primary};
                --color-brand-secondary: ${hslColors.secondary};
                --color-brand-accent: ${hslColors.accent};
                --color-brand-warning: ${hslColors.warning};
                --color-brand-danger: ${hslColors.danger};
            }
            
            .dark {
                --color-brand-primary: ${hslDarkColors.primary};
                --color-brand-secondary: ${hslDarkColors.secondary};
                --color-brand-accent: ${hslDarkColors.accent};
                --color-brand-warning: ${hslDarkColors.warning};
                --color-brand-danger: ${hslDarkColors.danger};
            }
        `;
    }
    
    // Escuchar cambios en cada color
    wp.customize('brand_color_primary', function(value) {
        value.bind(function(to) {
            updateColorVariable('primary', to);
        });
    });
    
    wp.customize('brand_color_secondary', function(value) {
        value.bind(function(to) {
            updateColorVariable('secondary', to);
        });
    });
    
    wp.customize('brand_color_accent', function(value) {
        value.bind(function(to) {
            updateColorVariable('accent', to);
        });
    });
    
    wp.customize('brand_color_warning', function(value) {
        value.bind(function(to) {
            updateColorVariable('warning', to);
        });
    });
    
    wp.customize('brand_color_danger', function(value) {
        value.bind(function(to) {
            updateColorVariable('danger', to);
        });
    });
    
})(jQuery);