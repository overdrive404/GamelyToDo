const purgecss = require('purgecss').PurgeCSS;

module.exports = {
    content: ['./resources/views', './public/assets/js'], // Укажите пути к вашим HTML и JS файлам
    css: ['./public/assets/css/style.css'], // Укажите путь к вашему CSS файлу
    defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
};
