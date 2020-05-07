const mix = require('laravel-mix');

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

mix.js([
   'resources/js/dashboard/stisla.js',
   'resources/js/dashboard/scripts.js',
   'resources/js/dashboard/custom.js'
], 'public/assets/dashboard/js/userPanelapp.js')
   .version();;

mix.sass('resources/sass/dashboard/style.scss', 'public/assets/dashboard/css/userPanelapp.css')
   .version();
