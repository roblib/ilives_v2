var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var browserSync = require('browser-sync').create();
var sassGlob = require('gulp-sass-glob');

var sassPaths = [
    'bower_components/normalize.scss/sass',
    'bower_components/foundation-sites/scss',
    'bower_components/motion-ui/src',
];

gulp.task('bsLocal', ['sass'], function() {
    browserSync.init({
        proxy: 'drupal7.dev',
    });
    gulp.watch('scss/**/*.scss', ['sass']);
    gulp.watch('js/app.js').on('change', browserSync.reload);
});

gulp.task('sass', function() {
  return gulp.src('scss/app.scss')
    .pipe(sassGlob())
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle: 'compressed' // if css compressed **file size**
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream());
});


gulp.task('default', ['bsLocal']);
