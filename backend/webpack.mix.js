let mix = require('laravel-mix');

const clientConfig = require("./client.mix.js");
const serverConfig = require("./server.mix.js");

mix
    .js('resources/assets/js/vue/entry-server.js', 'public/js/vue')
    .js('resources/assets/js/vue/entry-client.js', 'public/js/vue')
    .scripts([
        'jquery.js',
        'modernizr.js',
        'bootstrap.min.js',
    ].map((el)=>'public/js/' + el), 'public/js/blob.js')
	.less('resources/assets/less/app.less', 'public/css')
//     .browserSync({
//     proxy: "127.0.0.1:8000",
//     open: false
// });
mix.webpackConfig(() => {
    
});