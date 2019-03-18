var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

//elixir(function(mix) {
//    mix.sass('app.scss');
//});

elixir(mix => {
    mix.sass('app.scss')
    .sass('home.scss')
    .sass('about.scss')
    .sass('contact.scss')
    .sass('shop.scss')
    .sass('services.scss')
    .sass('references.scss')
    .sass('gallery.scss')
    .sass('partners.scss')
    .sass('gallerySingle.scss')
    .browserify('app.js')
    .browserify('home.js')
    .browserify('about.js')
    .browserify('contact.js')
    .browserify('shop.js')
    .browserify('services.js')
    .browserify('references.js')
    .browserify('gallerySingle.js')
    .browserify('gallery.js')
    .browserify('partners.js');
});