let mix = require('laravel-mix');

mix.postCss('public/assets/css/style.css', 'public/assets/css', [
    require('autoprefixer'),
    require('cssnano')
]).version();
