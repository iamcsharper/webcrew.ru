let mix = require('laravel-mix');

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
    .js('resources/assets/js/vue/entry-server.js', 'public/js/vue')
    .js('resources/assets/js/vue/entry-client.js', 'public/js/vue');

mix
    .scripts([
        'jquery.js',
        'modernizr.js',
        'bootstrap.min.js',
    ].map((el)=>'public/js/' + el), 'public/js/blob.js')
    .sass('resources/assets/sass/app.scss', 'public/css');