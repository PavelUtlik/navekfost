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

mix.copy('foundation-emails/dist/css/app.css', 'resources/assets/css/emails.css')
  .copy('foundation-emails/dist/assets/img/*', 'public/emails/assets/img');