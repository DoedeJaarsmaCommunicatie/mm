let mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.sass('assets/sass/main.sass', 'dist/styles/app.css')
	.tailwind('tailwind.config.js');

mix
	.js('assets/vue/mail/app.js', 'dist/js/mc-app.vue.js');

mix
	.js('assets/js/ScrollTo.js', 'dist/js/scrollto.js')
	.js('assets/js/NavigationListener.js', 'dist/js/main.js')
	.js('assets/js/VacancyFilter.js', 'dist/js/filter.js');
