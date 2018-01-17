import gulp from 'gulp';
import fs from 'fs';
import yaml from 'js-yaml';
import plugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import sassGlob from 'gulp-sass-glob';
import imagemin from 'gulp-imagemin';

// Load all Gulp plugins into one variable
const $ = plugins();

// Import settings in yml format from external config file (gulp.settings.yml)
function loadConfig() {
    let ymlFile = fs.readFileSync('gulp.settings.yml', 'utf8');
    return yaml.load(ymlFile);
}

// Load variables from gulp.settings.yml
const { REGEX, URL, PORT, PATHS } = loadConfig();

/*
 * Primary Gulp Tasks
 */

// Default Task
gulp.task('default', ['sass-dev', 'images', 'bsRemote'], function(){
    // watch and compile sass
    gulp.watch( PATHS.sassWatch, ['sass-dev']);
    // watch for minify images
    gulp.watch( PATHS.images.source, ['images']);
    // watch this stuff and reload the browser when there are changes
    gulp.watch( PATHS.reloadFiles ).on('change', browserSync.reload);
});

// 'build' task (for production: compressed css, no sourcemaps etc)
gulp.task('build', ['images', 'sass-prod']);

/*
 * Subtasks
 */

 //sub-task: Imagemin
gulp.task('images', function() {
//{{{
    gulp.src(PATHS.images.source)
        .pipe(imagemin())
        .pipe(gulp.dest(PATHS.images.destination))

});//}}}

 //sub-task: BrowserSync Remote Proxy
gulp.task('bsRemote', function() {
//{{{
    var stringRemove = new RegExp( REGEX, 'g');
    browserSync.init({
        proxy: URL,
        port: PORT,
        serveStatic: PATHS.localAssets,
        injectChanges: true,
        files: PATHS.mainFiles,
        rewriteRules: [{
            match: stringRemove,
            fn: function(matched) {
                return ''
            }
        }]
    });
});//}}}

 //sub-task: Sass compiler (dev)
gulp.task('sass-dev', function() {
//{{{
    return gulp.src('scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: PATHS.sass_includes
            //outputStyle: 'compressed' // if css compressed **file size**
        })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9']
        }))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('css'))
        .pipe(browserSync.stream());
});//}}}

 //sub-task: Sass compiler (prod)
gulp.task('sass-prod', function() {
//{{{
    return gulp.src('scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sass({
            includePaths: PATHS.sass_includes,
            outputStyle: 'compressed' // if css compressed **file size**
        })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9']
        }))
        .pipe(gulp.dest('css'))
});//}}}


