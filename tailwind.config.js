/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './*.php',
    './template-parts/**/*.php',
    './inc/**/*.php',
    './src/js/**/*.js',
    './assets/js/**/*.js',
    // Si tienes páginas Gutenberg personalizadas
    './blocks/**/*.php',
    './patterns/**/*.php'
  ],
  theme: {
    extend: {
      // Colores personalizados del tema - Combinando ambas configuraciones
      colors: {
        'theme': {
          'primary': '#005cee',
          'secondary': '#6c757d',
          'success': '#28a745',
          'danger': '#dc3545',
          'warning': '#ffc107',
          'info': '#17a2b8',
          'light': '#f8f9fa',
          'dark': '#343a40',
        },
        // Colores del header institucional
        'primary': '#3366CC',
        'background-light': '#FFFFFF',
        'background-dark': '#1A202C',
        'text-light': '#1A202C',
        'text-dark': '#EDF2F7',
        'border-light': '#E2E8F0',
        'border-dark': '#4A5568',
        'accent': '#FFA500',
      },
      // Tipografía personalizada - Combinando fuentes
      fontFamily: {
        'sans': ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Oxygen-Sans', 'Ubuntu', 'Cantarell', 'Helvetica Neue', 'sans-serif'],
        'code': ['Monaco', 'Consolas', 'Andale Mono', 'DejaVu Sans Mono', 'monospace'],
        'quartzo-bold': ['Quartzo-Bold', 'sans-serif'],
        'plus-jakarta': ['Plus Jakarta Sans', 'sans-serif'],
        'display': ['Montserrat', 'sans-serif'], // Para el header
      },
      // Espaciado personalizado para WordPress
      spacing: {
        '15': '3.75rem',
        '18': '4.5rem',
        '88': '22rem',
        '92': '23rem',
      },
      // Breakpoints personalizados
      screens: {
        'xs': '480px',
      },
      // Aspectos de ratio para multimedia
      aspectRatio: {
        '4/3': '4 / 3',
        '3/2': '3 / 2',
        '2/3': '2 / 3',
        '9/16': '9 / 16',
      },
      // Contenedores personalizados
      maxWidth: {
        'content': '1200px',
        'content-wide': '1400px',
      },
      // Border radius personalizado
      borderRadius: {
        DEFAULT: '0.5rem',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    // Plugin personalizado para WordPress
    function({ addComponents, theme }) {
      addComponents({
        // Estilos para contenido de WordPress
        '.wp-content': {
          '& h1, & h2, & h3, & h4, & h5, & h6': {
            marginTop: theme('spacing.8'),
            marginBottom: theme('spacing.4'),
            fontWeight: theme('fontWeight.bold'),
          },
          '& p': {
            marginBottom: theme('spacing.4'),
          },
          '& ul, & ol': {
            marginBottom: theme('spacing.4'),
            paddingLeft: theme('spacing.6'),
          },
          '& blockquote': {
            borderLeft: `4px solid ${theme('colors.theme.primary')}`,
            paddingLeft: theme('spacing.4'),
            marginLeft: theme('spacing.4'),
            fontStyle: 'italic',
          }
        },
        // Botones de WordPress
        '.wp-block-button__link': {
          display: 'inline-block',
          padding: `${theme('spacing.3')} ${theme('spacing.6')}`,
          backgroundColor: theme('colors.theme.primary'),
          color: 'white',
          textDecoration: 'none',
          borderRadius: theme('borderRadius.md'),
          fontWeight: theme('fontWeight.medium'),
          '&:hover': {
            backgroundColor: theme('colors.theme.primary') + 'dd',
          }
        },
        // Alineaciones de WordPress
        '.alignleft': {
          float: 'left',
          marginRight: theme('spacing.4'),
          marginBottom: theme('spacing.2'),
        },
        '.alignright': {
          float: 'right',
          marginLeft: theme('spacing.4'),
          marginBottom: theme('spacing.2'),
        },
        '.aligncenter': {
          display: 'block',
          margin: '0 auto',
        },
        '.alignwide': {
          maxWidth: theme('maxWidth.content-wide'),
          marginLeft: 'auto',
          marginRight: 'auto',
        },
        '.alignfull': {
          width: '100vw',
          maxWidth: 'none',
          marginLeft: 'calc(50% - 50vw)',
        },
      })
    }
  ],
  // Para mejor compatibilidad con WordPress
  corePlugins: {
    preflight: true, // Mantener el reset de CSS de Tailwind
  },
  // Prefijo para evitar conflictos (opcional)
  // prefix: 'tw-',
}