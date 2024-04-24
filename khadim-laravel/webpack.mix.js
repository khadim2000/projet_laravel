// webpack.mix.js

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css/fontawesome.css')
   .copy('node_modules/material-design-icons-iconfont/dist/material-design-icons.css', 'public/css/material-icons.css');

