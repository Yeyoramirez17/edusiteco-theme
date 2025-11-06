const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');
const glob = require('glob');
const CopyWebpackPlugin = require('copy-webpack-plugin');

// Función para obtener todas las entradas de bloques dinámicamente
const getBlockEntries = () => {
  const entries = {};
  const blockFiles = glob.sync('./src/blocks/*/index.js');
  blockFiles.forEach(file => {
    const name = path.basename(path.dirname(file));
    entries[`blocks/${name}/index`] = path.resolve(process.cwd(), file);
  });
  return entries;
};

module.exports = {
  ...defaultConfig,
  entry: {
    // Scripts generales del tema -> van a assets/js/
    'index': path.resolve(process.cwd(), 'src/js/index.js'),
    'custom-admin': path.resolve(process.cwd(), 'src/js/custom-admin.js'),
    
    // Entradas de bloques personalizadas (detectadas automáticamente)
    ...getBlockEntries(),
  },
  output: {
    // La ruta base de salida es la raíz del tema, la lógica de abajo distribuye los archivos
    path: path.resolve(process.cwd(), 'build'),
    filename: (pathData) => {
      // Scripts generales van a assets/js/
      if (['index', 'custom-admin'].includes(pathData.chunk.name)) {
        return `../assets/js/${pathData.chunk.name}.js`;
      }
      // Los bloques van a build/blocks/{nombre-bloque}/index.js
      return '[name].js';
    },
    // Limpia el directorio de salida (excepto lo que le decimos que ignore)
    clean: {
      keep: /^(?!blocks\/|\.\.\/assets\/js\/)/, // No limpiar los directorios de destino
    },
  },
  plugins: [
    // Asegúrate de que los plugins por defecto de @wordpress/scripts se mantengan
    ...defaultConfig.plugins,
    // Añade el plugin para copiar archivos
    new CopyWebpackPlugin({
      patterns: [
        {
          from: 'src/blocks/**/block.json',
          to: ({ context, absoluteFilename }) => {
            const relativePath = path.relative(context, path.dirname(absoluteFilename));
            return `${relativePath.replace('src\\', '')}/[name][ext]`;
          },
        },
        {
          from: 'src/blocks/**/render.php',
          to: ({ context, absoluteFilename }) => {
            const relativePath = path.relative(context, path.dirname(absoluteFilename));
            return `${relativePath.replace('src\\', '')}/[name][ext]`;
          },
        },
      ],
    }),
  ],
};