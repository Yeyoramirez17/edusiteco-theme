/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './*.php',
    './**/*.php',
    './src/js/**/*.js',
    './src/css/**/*.css'
  ],
  theme: {
    extend: {
      colors: {
        'gov-top': "#0943B5",
        
        // Nueva paleta personalizable con variables CSS
        'brand': {
          'primary': 'hsl(var(--color-brand-primary) / <alpha-value>)',
          'secondary': 'hsl(var(--color-brand-secondary) / <alpha-value>)',
          'accent': 'hsl(var(--color-brand-accent) / <alpha-value>)',
          'warning': 'hsl(var(--color-brand-warning) / <alpha-value>)',
          'danger': 'hsl(var(--color-brand-danger) / <alpha-value>)',
        },
        
        // Colores antiguos mantenidos para compatibilidad
        'primary': '#3366CC',
        'background-light': '#FFFFFF',
        'background-dark': '#1A202C',
        'text-light': '#1A202C',
        'text-dark': '#EDF2F7',
        'border-light': '#E2E8F0',
        'border-dark': '#4A5568',
        'accent': '#FFA500',
        
        // Custom
        'dark-slate-gray': '#36453b',
        'dim-gray': '#596869',
        'ebony': '#515751',
        'ivory': '#f5f9e9',
        'sage': '#c2c1a5',
        
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
      
      fontFamily: {
        'sans': ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Oxygen-Sans', 'Ubuntu', 'Cantarell', 'Helvetica Neue', 'sans-serif'],
        'code': ['Monaco', 'Consolas', 'Andale Mono', 'DejaVu Sans Mono', 'monospace'],
        'quartzo-bold': ['Quartzo-Bold', 'sans-serif'],
        'plus-jakarta': ['Plus Jakarta Sans', 'sans-serif'],
        'display': ['Montserrat', 'sans-serif'],
      },
      
      spacing: {
        '15': '3.75rem',
        '18': '4.5rem',
        '88': '22rem',
        '92': '23rem',
      },
      
      screens: {
        'xs': '480px',
      },
      
      aspectRatio: {
        '4/3': '4 / 3',
        '3/2': '3 / 2',
        '2/3': '2 / 3',
        '9/16': '9 / 16',
      },
      
      maxWidth: {
        'content': '1200px',
        'content-wide': '1400px',
      },
      
      borderRadius: {
        DEFAULT: '0.5rem',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    function({ addComponents, theme }) {
      addComponents({
        // TODO
      })
    }
  ],
  corePlugins: {
    preflight: true,
  },
}