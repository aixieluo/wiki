const { mix } = require('laravel-mix');
const Mix = require('laravel-mix').config;

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.(png|jpe?g|gif)$/,
                loaders: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: path => {
                                if (! /node_modules|bower_components/.test(path)) {
                                    return 'images/vendor/[name].[ext]?[hash]';
                                }

                                return 'images/vendor/' + path
                                        .replace(/\\/g, '/')
                                        .replace(
                                            /((.*(node_modules|bower_components))|images|image|img|assets)\//g, ''
                                        ) + '?[hash]';
                            },
                            publicPath: Mix.options.resourceRoot
                        }
                    },
                    'img-loader'
                ]
            }
        ]
    }
})

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
    // .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/dashboard.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/dashboard.scss', 'public/css')
   .version();
