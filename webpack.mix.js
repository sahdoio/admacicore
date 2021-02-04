const mix = require('laravel-mix');

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

/**
 * Generic
 */

mix.styles([
    'resources/assets/vendor/bootstrap/css/bootstrap.min.css',
    'resources/assets/vendor/owlcaroulsel/owl.carousel.css',
    'resources/assets/vendor/owlcaroulsel/owl.transitions.css',
    'resources/assets/vendor/full-slider.css',
    'resources/assets/vendor/animate/animate.min.css',
    'resources/assets/vendor/component/component.css',
    'resources/assets/vendor/blueimp-gallery/blueimp-gallery.min.css',
    'resources/assets/vendor/slick/blueimp-gallery.min.css',
    'resources/assets/vendor/slick/assets/slick.css',
    'resources/assets/vendor/slick/assets/slick-theme.css',
], 'public/vendor/vendor.css');

mix.copyDirectory('resources/assets/vendor/fontawesome', 'public/vendor/fontawesome');

mix.scripts([
    'resources/assets/vendor/jquery/jquery.js',
    'resources/assets/vendor/jquery/jquery.parallax-1.1.3.js',
    'resources/assets/vendor/jquery/jquery.nicescroll.min.js',
    'resources/assets/vendor/jquery/jquery.mixitup.min.js',
    'resources/assets/vendor/jquery/jquery.inview.min.js',
    'resources/assets/vendor/jquery/jquery.prettyPhoto.js',
    'resources/assets/vendor/bootstrap/js/bootstrap.js',
    'resources/assets/vendor/owlcaroulsel/owl.carousel.min.js',
    'resources/assets/vendor/slick/assets/slick.js',
    'resources/assets/vendor/modernizr-2.6.2.min.js',
    'resources/assets/vendor/wow.min.js',
    'resources/assets/vendor/grid.js',
    'resources/assets/vendor/masonry/masonry.pkgd.js',
    'resources/assets/vendor/masonry/masonry.js',
    'resources/assets/vendor/blueimp-gallery/jquery.blueimp-gallery.min.js',
], 'public/vendor/vendor.js');

// media
mix.copy('resources/assets/media/', 'public/media/')


/**
 * Website
 */

mix.styles([
    'resources/assets/website/css/main.css',
    'resources/assets/website/css/responsive.css',
    'resources/assets/website/css/pages/home.css',
    'resources/assets/website/css/pages/about.css',
    'resources/assets/website/css/pages/services.css',
    'resources/assets/website/css/pages/jobs.css',
    'resources/assets/website/css/pages/job.css',
    'resources/assets/website/css/pages/gallery.css',
    'resources/assets/website/css/pages/team.css',
    'resources/assets/website/css/pages/clients.css',
    'resources/assets/website/css/pages/contact.css'
], 'public/website/css/app.css');

mix.scripts([
    'resources/assets/website/js/main.js',
    'resources/assets/website/js/pages/home.js',
    'resources/assets/website/js/pages/about.js',
    'resources/assets/website/js/pages/gallery.js',
    'resources/assets/website/js/pages/contact.js',
    'resources/assets/website/js/pages/jobs.js'
], 'public/website/js/app.js');

// fonts
mix.copy('resources/assets/website/fonts', 'public/website/fonts');


/**
 * React
 */

mix.react('resources/js/app.js', 'public/js/react.js')
mix.sass('resources/sass/app.scss', 'public/css/react.css');

/**
 * Admin
 */

// styles
mix.copyDirectory('resources/assets/admin/css', 'public/admin/css');

// scripts
mix.copyDirectory('resources/assets/admin/js', 'public/admin/js');

// fonts
mix.copyDirectory('resources/assets/admin/fonts', 'public/admin/fonts');




