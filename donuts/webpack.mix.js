let mix = require('laravel-mix');

mix
.sass('resources/sass/app.scss', 'public')
.js('resources/js/app.js', 'public');