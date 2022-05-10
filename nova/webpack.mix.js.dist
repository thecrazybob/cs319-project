let mix = require('laravel-mix')
let tailwindcss = require('tailwindcss')
let path = require('path')
let postcssImport = require('postcss-import')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/app.js', 'public')
  .vue({version: 3})
  .sourceMaps()
  .extract()
  .setPublicPath('public')
  .postCss('resources/css/app.css', 'public', [postcssImport(), tailwindcss('tailwind.config.js'),])
  .copy('resources/fonts/', 'public/fonts')
  .alias({'@': path.join(__dirname, 'resources/js/')})
  .webpackConfig({output: {uniqueName: 'laravel/nova'},})
  .options({
    vue: {
      compilerOptions: {
        isCustomElement: tag => tag.startsWith('trix-')
      }
    },
    processCssUrls: false
  })
  .version()
