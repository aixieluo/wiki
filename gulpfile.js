const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');


elixir.config.sourcemaps = false;
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


elixir(mix => {
    mix.sass('app.scss')
        .sass('dashboard.scss')
        .webpack('app.js', 'public/js/app.js')
        .webpack('dashboard.js', 'public/js/dashboard.js')
});