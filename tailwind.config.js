/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './*.php',
    './template-parts/**/*.php',
    './inc/**/*.php',
    './src/js/**/*.js',
    './assets/js/**/*.js',
    // Para páginas Gutenberg personalizadas
    './blocks/**/*.php',
    './patterns/**/*.php'
  ],
  theme: {
    extend: {
      colors: {
        'gov-top': "#0943B5",
        'primary': '#3366CC',
        'background-light': '#FFFFFF',
        'background-dark' : '#1A202C',
        'text-light'      : '#1A202C',
        'text-dark'       : '#EDF2F7',
        'border-light'    : '#E2E8F0',
        'border-dark'     : '#4A5568',
        'accent'          : '#FFA500',
        // Custom
        'dark-slate-gray': '#36453b',
        'dim-gray': '#596869',
        'ebony'   : '#515751',
        'ivory'   : '#f5f9e9',
        'sage'    : '#c2c1a5',
        
        'keppel': {
          50: 'hsl(var(--keppel-50) / <alpha-value>)',
          100: 'hsl(var(--keppel-100) / <alpha-value>)',
          200: 'hsl(var(--keppel-200) / <alpha-value>)',
          300: 'hsl(var(--keppel-300) / <alpha-value>)',
          400: 'hsl(var(--keppel-400) / <alpha-value>)',
          500: 'hsl(var(--keppel-500) / <alpha-value>)',
          600: 'hsl(var(--keppel-600) / <alpha-value>)',
          700: 'hsl(var(--keppel-700) / <alpha-value>)',
          800: 'hsl(var(--keppel-800) / <alpha-value>)',
          900: 'hsl(var(--keppel-900) / <alpha-value>)',
          950: 'hsl(var(--keppel-950) / <alpha-value>)',
        }
      },
      // Tipografía personalizada - Combinando fuentes
      fontFamily: {
        'sans': ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Oxygen-Sans', 'Ubuntu', 'Cantarell', 'Helvetica Neue', 'sans-serif'],
        'code': ['Monaco', 'Consolas', 'Andale Mono', 'DejaVu Sans Mono', 'monospace'],
        'quartzo-bold': ['Quartzo-Bold', 'sans-serif'],
        'plus-jakarta': ['Plus Jakarta Sans', 'sans-serif'],
        'display': ['Montserrat', 'sans-serif'],
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
        // TODO
      })
    }
  ],
  // Para mejor compatibilidad con WordPress
  corePlugins: {
    preflight: true, // Mantener el reset de CSS de Tailwind
  },
}