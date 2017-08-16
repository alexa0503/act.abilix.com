const { mix } = require('laravel-mix');

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
/*
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
*/
mix.scripts(['resources/assets/js/abilix.js'], 'public/js/abilix.js');
mix.scripts(['resources/assets/js/abilix.index.js'], 'public/js/abilix.index.js');
mix.scripts(['resources/assets/js/abilix.list.js'], 'public/js/abilix.list.js');
mix.scripts(['resources/assets/js/abilix.phase2.js'], 'public/js/abilix.phase2.js');
mix.copy('bower_components/fullpage.js/dist/jquery.fullPage.min.js','public/js/')
    .copy('bower_components/fullpage.js/dist/jquery.fullPage.min.css','public/css/')
    .copy('bower_components/fullpage.js/vendors/jquery.easings.min.js','public/js/')
    .copy('bower_components/fullpage.js/vendors/scrolloverflow.min.js','public/js/');
