var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');
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

var npm_path = '../../../node_modules';

elixir(function (mix) {
    mix.sass('app.scss');
    mix.scripts([
        npm_path + '/jquery/dist/jquery.js',
        npm_path + '/bootstrap-sass/assets/javascripts/bootstrap.js',
        npm_path + '/moment/min/moment.min.js',
        npm_path + '/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        'app.js'
    ]);
    mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts');
    mix.livereload();
});