import gulp from 'gulp';
import fs from 'fs';
import yaml from 'js-yaml';
import plugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import sassGlob from 'gulp-sass-glob';

// Load all Gulp plugins into one variable
const $ = plugins();


// Load settings from settings.yml
const {
    REGEX,
    URL,
    PORT,
    PATHS
} = loadConfig();

function loadConfig() {
    let ymlFile = fs.readFileSync('gulp.settings.yml', 'utf8');
    return yaml.load(ymlFile);
}


/*
 *Task: BrowserSync Remote Proxy
 */
gulp.task('bsRemote', ['sass'], function() {//{{{
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
    gulp.watch( PATHS.sassWatch, ['sass']);
    gulp.watch( PATHS.reloadFiles ).on('change', browserSync.reload);
});//}}}


/*
 *Task: Sass compiler
 */
gulp.task('sass', function() {//{{{
    return gulp.src('scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: PATHS.sass_includes,
            outputStyle: 'compressed' // if css compressed **file size**
        })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9']
        }))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.stream());
});//}}}


gulp.task('default', ['bsRemote']);
