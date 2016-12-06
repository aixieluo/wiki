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
        .webpack(['app.js', 'common.js'], '/public/js/app.js');
        // .version(['css/app.css', 'js/app.js'], 'public');
});
