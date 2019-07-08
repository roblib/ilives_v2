//@format
let siteUrl, sassImportPaths;
/*=================
 * Project Settings
 *=================*/
//###########################################################
// site to be proxied
//###########################################################
siteUrl = 'https://islandlives.dev.islandarchives.ca';
//###########################################################
// sass libraries to be made available to '@import' in *.scss files
//###########################################################
sassImportPaths = [
    'node_modules/foundation-sites/scss',
    'node_modules/motion-ui/src',
];
//###########################################################
// this will be removed from the css/js paths to redirect to locally hosted versions
//###########################################################
const regEx = 'http.*themes/ilives/dist/((css)|(js))';
//###########################################################
const browserSyncPort = 8000;
//###########################################################

/*==============
 *Module Imports
 *==============*/
import gulp from 'gulp';
import fs from 'fs';
import yaml from 'js-yaml';
import plugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import sassGlob from 'gulp-sass-glob';
import imagemin from 'gulp-imagemin';
import concat from 'gulp-concat-util';
import handlebars from 'gulp-compile-handlebars';
import rename from 'gulp-rename';

/*==============
 *Module Options
 *==============*/

// Gulp-load-plugins: Load all Gulp plugins into one variable
const $ = plugins();

// Sass--Development
const sassOptions__dev = {
    includePaths: sassImportPaths,
};
// Sass--Production
const sassOptions__prod = {
    includePaths: sassImportPaths,
    outputStyle: 'compressed', // if css compressed **file size**
};

// Autoprefixer
const autoprefixerOptions = {
    browsers: ['last 2 versions', 'ie >= 9'],
};

// Handlebars (arbitrary global template varables)
const handlebarsTemplateData = {
    // these can be inserted in handlebars templates by {{ thingOne }}
    thingOne: 'yay',
    thingTwo: 'woooo',
};

const handlebarsOptions = {
    ignorePartials: true, //ignores the unknown footer2 partial in the handlebars template, defaults to false
    partials: {
        // arbitrary partials: the following could be used as {{> dummy_partial }}
        //dummy_partial: '<span>this can be used as a partial</span>',
    },
    //location of partials (html or hbs)
    batch: ['src/static/partials'],
};
/*==================
 *Primary Gulp Tasks
 *==================*/

// Default Task
gulp.task(
    'default',
    ['sass-dev', 'images', 'js-concat', 'file-mover', 'bsRemote'],
    () => {
        // watch and compile sass
        gulp.watch('src/scss/**/*.scss', ['sass-dev']);
        // watch and compile sass
        gulp.watch('src/js/*.js', ['js-concat']);
        // watch for minify images
        gulp.watch('src/img-src/*', ['images']);
        // watch this stuff and reload the browser when there are changes
        gulp.watch('src/assets/*', ['file-mover']);
        //gulp.watch(PATHS.reloadFiles).on('change', browserSync.reload);
    },
);

// 'build' task (for production: compressed css, no sourcemaps etc)
gulp.task('production', ['images', 'file-mover', 'sass-prod']);

gulp.task(
    'static',
    ['sass-dev', 'images', 'file-mover', 'mockup-templates', 'mockup-server'],
    () => {
        gulp.watch('src/mockups/**/*', ['mockup-templates']);
        // watch and compile sass
        gulp.watch('src/scss/**/*.scss', ['sass-dev']);
        // watch and compile sass
        gulp.watch('src/js/*.js', ['js-concat']);
        // watch for minify images
        gulp.watch('src/img-src/*', ['images']);
        // watch this stuff and reload the browser when there are changes
        gulp.watch('src/assets/*', ['file-mover']);
        //gulp.watch(PATHS.reloadFiles).on('change', browserSync.reload);
    },
);

/*========
 *Subtasks
 *========*/
gulp.task('file-mover', () => {
    gulp.src('src/assets/**/*').pipe(gulp.dest('dist/assets'));
});

//sub-task: Imagemin
gulp.task('images', () => {
    gulp.src('src/img-src/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/images'));
});

//sub-task: BrowserSync Remote Proxy
gulp.task('bsRemote', () => {
    var stringRemove = new RegExp(regEx, 'g');
    browserSync.init({
        proxy: siteUrl,
        port: browserSyncPort,
        //startPath: 'user',
        //logLevel: 'debug',
        serveStatic: ['dist/js', 'dist/css', 'dist/assets/fonts/**/*'],
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

gulp.task(
    'static--watch',
    ['sass-dev', 'static--templates', 'static--server'],
    () => {
        gulp.watch('dist/static/*').on('change', browserSync.reload);
        gulp.watch('src/static/**/*.*', ['static--templates']);
        gulp.watch('src/scss/**/*.scss', ['sass-dev']);
        gulp.watch('src/js/app.js', ['js-concat']);
    },
);

gulp.task('static--server', () => {
    browserSync.init({
        server: './dist',
        startPath: '/static',
        files: ['dist/css/app.css', 'dist/js/app.js'],
    });
});
gulp.task('static--templates', () => {
    gulp.src('src/static/index.html')
        .pipe(handlebars(handlebarsTemplateData, handlebarsOptions))
        .pipe(gulp.dest('dist/static'));
});

// sub-task: JS concatination
gulp.task('js-concat', () => {
    gulp.src('src/js/app.js').pipe(gulp.dest('dist/js'));

    //.src('src/scss/{,*/}*.js')
    //.pipe(concat('app.js'))
    //.pipe(concat.header('(function($) {\n'))
    //.pipe(concat.footer('\n})(jQuery);'))
    //.pipe(gulp.dest('dist/js'));
});

//sub-task: Sass compiler (dev)
gulp.task('sass-dev', () => {
    gulp.src('src/scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sourcemaps.init())
        .pipe($.sass(sassOptions__dev).on('error', $.sass.logError))
        .pipe($.autoprefixer(autoprefixerOptions))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('dist/css'))
        .pipe(browserSync.stream());
});

//sub-task: Sass compiler (prod)
gulp.task('sass-prod', () => {
    gulp.src('src/scss/app.scss')
        .pipe(sassGlob())
        .pipe($.sass(sassOptions__prod).on('error', $.sass.logError))
        .pipe($.autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest('dist/css'));
});
