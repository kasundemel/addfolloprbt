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

elixir(function(mix) {
    mix.sass('app.scss');
});

elixir(function(mix){
	mix.scripts(['jquery-3.1.1.js'],'public/js');
})

// mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');
//      	mix.styles([
//           'bower_components/bootstrap/dist/css/bootstrap.css',
//  -        'bower_components/font-awesome/css/font-awesome.css',
//  +        'bower_components/fontawesome/css/font-awesome.css',
//           'resources/css/sb-admin-2.css',
//           'resources/css/timeline.css'
//       ], 'public/assets/stylesheets/styles.css', './');

