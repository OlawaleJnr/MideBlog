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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    './resources/css/style.css',
    './resources/css/responsive.css',
    './resources/css/fontawesome.css',
    './resources/css/vendors/animate.css',
    './resources/css/vendors/feather-icon.css',
    './resources/css/vendors/flag-icon.css',
    './resources/css/vendors/icofont.css',
    './resources/css/vendors/select2.css',
    './resources/css/vendors/themify.css',
    './resources/css/sweetalert2.css'
], './public/css/theme.css')

mix.scripts([
    './resources/js/config.js',
    './resources/js/script.js',
    './resources/js/sidebar-menu.js',
    './resources/js/dashboard/default.js'
], './public/js/bundle.js')

mix.scripts([
    './resources/js/select2/select2.full.min.js',
    './resources/js/select2/select2-custom.js',
    './resources/js/theme-customizer/customizer.js',
    './resources/js/sweetalert.min.js'
], './public/js/libs.js')

