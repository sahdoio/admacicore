var gulp = require('gulp');
var path = require('path');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var open = require('gulp-open');

// paths
var Paths = {
    HERE: './',
    DIST: './public/admin/dist/',
    CSS: './public/admin/css/',
    SCSS_TOOLKIT_SOURCES: './resources/assets/admin/scss/now-ui-dashboard.scss',
    SCSS: './resources/assets/admin/scss/**/**'
};

// compile admin scss
gulp.task('compile-scss', function () {
    return gulp.src(Paths.SCSS_TOOLKIT_SOURCES)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write(Paths.HERE))
        .pipe(gulp.dest(Paths.CSS));
});

// watch admin project
gulp.task('watch', function () {
    gulp.watch(Paths.SCSS, gulp.series('compile-scss'));
});

// default task
gulp.task('default', gulp.series('compile-scss'));