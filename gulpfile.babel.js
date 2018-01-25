/*@format*/
'use strict';
import gulp from 'gulp';
import fs from 'fs';
import yaml from 'js-yaml';
import plugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import sassGlob from 'gulp-sass-glob';
import imagemin from 'gulp-imagemin';
import concat from 'gulp-concat-util';

// Load all Gulp plugins into one variable
const $ = plugins();

// Import settings in yml format from external config file (gulp.settings.yml)
const ymlFile = fs.readFileSync('gulp.settings.yml', 'utf8');
const loadConfig = () => yaml.load(ymlFile);

// Load variables from gulp.settings.yml
const {REGEX, URL, PORT, PATHS} = loadConfig();

/*
 * Primary Gulp Tasks
 */

// Default Task
gulp.task('default', ['sass-dev', 'images', 'file-mover', 'bsRemote'], () => {
    // watch and compile sass
    gulp.watch('src/scss/**/*.scss', ['sass-dev']);
    // watch and compile sass
    gulp.watch('src/scss/**/*.js', ['js-concat']);
    // watch for minify images
    gulp.watch('src/img-src/*', ['images']);
    // watch this stuff and reload the browser when there are changes
    gulp.watch('src/assets/*', ['file-mover']);
    //gulp.watch(PATHS.reloadFiles).on('change', browserSync.reload);
});

// 'build' task (for production: compressed css, no sourcemaps etc)
gulp.task('build', ['images', 'file-mover', 'sass-prod']);

/*
 * Subtasks
 */

gulp.task('file-mover', () => {
    gulp.src('src/assets/**/*').pipe(gulp.dest('dist/assets'));
});

//sub-task: Imagemin
gulp.task('images', () => {
    gulp
        .src('src/img-src/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/images'));
});

//sub-task: BrowserSync Remote Proxy
gulp.task('bsRemote', () => {
    var stringRemove = new RegExp(REGEX, 'g');
    browserSync.init({
        proxy: URL,
        port: 8000,
        //logLevel: 'debug',
        serveStatic: ['dist/js', 'dist/css'],
        injectChanges: true,
        files: ['dist/css/app.css', 'dist/js/app.js'],
        rewriteRules: [
            {
                match: stringRemove,
                fn: matched => {
                    return '';
                },
            },
        ],
    });
});

// sub-task: JS concatination
gulp.task('js-concat', () => {
    gulp
        .src('src/scss/{,*/}*.js')
        .pipe(concat('app.js'))
        .pipe(concat.header('(function($) {\n'))
        .pipe(concat.footer('\n})(jQuery);'))
        .pipe(gulp.dest('dist/js'));
});

//sub-task: Sass compiler (dev)
gulp.task('sass-dev', () => {
    let sassOptions = {
        includePaths: PATHS.sass_includes,
        //outputStyle: 'compressed'
    };
    let autoprefixerOptions = {
        browsers: ['last 2 versions', 'ie >= 9'],
    };
    gulp
        .src('src/scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sourcemaps.init())
        .pipe($.sass(sassOptions).on('error', $.sass.logError))
        .pipe($.autoprefixer(autoprefixerOptions))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('dist/css'))
        .pipe(browserSync.stream());
});

//sub-task: Sass compiler (prod)
gulp.task('sass-prod', () => {
    const sassOptions = {
        includePaths: PATHS.sass_includes,
        outputStyle: 'compressed', // if css compressed **file size**
    };

    const autoprefixerOptions = {
        browsers: ['last 2 versions', 'ie >= 9'],
    };
    gulp
        .src('src/scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sass(sassOptions).on('error', $.sass.logError))
        .pipe($.autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest('dist/css'));
});
