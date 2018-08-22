let mix = require('laravel-mix');

mix
    .js('resources/assets/js/vue/entry-server.js', 'public/js/vue')
    .js('resources/assets/js/vue/entry-client.js', 'public/js/vue')
    .scripts([
        'jquery.js',
        'modernizr.js',
        'bootstrap.min.js',
    ].map((el) => 'public/js/' + el), 'public/js/blob.js')
    .less('resources/assets/less/app.less', 'public/css');