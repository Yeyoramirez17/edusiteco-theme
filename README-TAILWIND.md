# 🎨 Tailwind CSS - Edusite CO Theme

## ✅ Configuración Completa

¡Tu tema de WordPress ya tiene **Tailwind CSS** configurado y funcionando!

## 📁 Estructura de Archivos FINAL

```
tu-tema/
├── style.css                    # ✅ Solo información del tema (WordPress lo requiere)
├── assets/                      # 🤖 Archivos compilados automáticamente
│   ├── css/
│   │   └── base.css            # ❌ CSS compilado de Tailwind (NO editar directamente)
│   ├── js/
│   │   └── main.js             # ❌ JS copiado desde src/ (NO editar directamente)
│   └── img/                    # ✅ Coloca imágenes aquí directamente
├── src/                         # ✅ Archivos fuente (EDITAR aquí)
│   ├── css/
│   │   └── base.css            # ✅ Archivo principal con Tailwind + CSS puro
│   └── js/
│       └── main.js             # ✅ JavaScript personalizado
├── tailwind.config.js          # ⚙️ Configuración de Tailwind
├── postcss.config.js           # ⚙️ Configuración PostCSS
└── package.json                # ⚙️ Scripts y dependencias
```

## 🧹 **SIN SASS** - Solo Tailwind + CSS puro
✅ Estructura limpia y simple
❌ No hay archivos .scss ni dependencias Sass

## 🚀 Comandos Disponibles

### Desarrollo (recomendado)
```bash
npm run dev        # Compila y observa cambios automáticamente
npm run watch:css  # Solo CSS en modo watch
```

### Producción
```bash
npm run build:css  # Compila CSS minificado para producción
npm run build      # Compila todo (CSS + JS)
```

### Otros
```bash
npm run lint:css   # Revisa errores en CSS
npm run clean      # Limpia archivos compilados
```

## 🎯 Cómo usar Tailwind CSS

### 1. **Desarrollo diario:**
```bash
# Ejecuta este comando y déjalo corriendo
npm run dev
```

### 2. **Editar estilos:**
Edita `src/css/base.css` - por ejemplo:
```css
@layer components {
  .mi-boton {
    @apply bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600;
  }
}
```

### 3. **En templates PHP:**
Usa clases de Tailwind directamente:
```php
<button class="bg-theme-primary text-white px-6 py-3 rounded-lg hover:bg-theme-primary/90">
  Mi Botón
</button>

<div class="container-content">
  <h1 class="text-3xl font-bold text-gray-900">Mi Título</h1>
</div>
```

## 🎨 Colores y Configuración Personalizada

### Colores del tema:
- `bg-theme-primary` - Azul principal (#005cee)  
- `bg-theme-secondary` - Gris secundario
- `bg-theme-success` - Verde éxito
- `bg-theme-danger` - Rojo peligro
- `bg-theme-warning` - Amarillo advertencia

### Contenedores:
- `container-content` - Ancho máximo 1200px
- `container-wide` - Ancho máximo 1400px

### Clases WordPress incluidas:
- `.alignleft`, `.alignright`, `.aligncenter`
- `.wp-content` - Para contenido de posts
- `.btn-primary`, `.btn-secondary`
- `.post`, `.sidebar`, `.widget`

## 📝 Personalización

### Agregar colores personalizados:
Edita `tailwind.config.js`:
```js
colors: {
  'mi-color': '#ff6b6b',
  'theme': {
    'primary': '#005cee', // Ya configurado
  }
}
```

### Agregar componentes personalizados:
En `src/css/base.css`:
```css
@layer components {
  .mi-card {
    @apply bg-white rounded-lg shadow-md p-6 mb-4;
  }
  
  .mi-titulo {
    @apply text-2xl font-bold text-gray-900 mb-4;
  }
}
```

## ⚡ Ventajas de esta configuración

✅ **Purge automático** - Solo se incluyen las clases CSS que usas
✅ **Optimizado para WordPress** - Incluye estilos para Gutenberg
✅ **RTL ready** - Soporte para idiomas de derecha a izquierda  
✅ **Plugins incluidos** - Typography, Forms, Aspect Ratio
✅ **Hot reload** - Los cambios se ven instantáneamente
✅ **Minificado** - CSS optimizado para producción

## 🔧 WordPress Integration

WordPress automáticamente carga:
- `style.css` (información del tema)
- `assets/css/base.css` (Tailwind compilado)
- `assets/js/main.js` (JavaScript personalizado)

## 🚨 Reglas Importantes

- ✅ **SÍ edita:** `src/css/base.css`, templates PHP
- ❌ **NO edites:** `assets/css/base.css`, `style.css` de la raíz
- 🔄 **Siempre ejecuta** `npm run dev` durante desarrollo
- 📦 **Para producción** ejecuta `npm run build`

## 💡 Ejemplos de uso común

### Layout básico:
```php
<div class="bg-gray-50 min-h-screen">
  <div class="container-content py-8">
    <main class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <div class="lg:col-span-2">
        <!-- Contenido principal -->
      </div>
      <aside class="sidebar">
        <!-- Sidebar -->
      </aside>
    </main>
  </div>
</div>
```

### Card de post:
```php
<article class="post">
  <h2 class="post-title"><?php the_title(); ?></h2>
  <div class="post-meta">
    <span><?php the_date(); ?></span>
  </div>
  <div class="post-content prose prose-lg">
    <?php the_content(); ?>
  </div>
</article>
```

¡Ya tienes Tailwind CSS listo para crear interfaces modernas y responsivas! 🎉