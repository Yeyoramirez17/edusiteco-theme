const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

/**
 * Configuración de Webpack para manejar múltiples puntos de entrada de JavaScript.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/#provide-your-own-webpack-config
 */
module.exports = {
  ...defaultConfig,
  entry: {
    index: './src/js/index.js',
    'custom-admin': './src/js/custom-admin.js',
    // Agrega aquí cualquier otro archivo JS que necesites compilar
  }
};