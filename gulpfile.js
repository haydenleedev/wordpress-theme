// Gulp.js configuration
'use strict';

const

    // source and build folders
    dir = {
        src: 'src/',
        build: 'dist/'
    },

    // Gulp and plugins
    gulp = require('gulp'),
    gutil = require('gulp-util'),
    newer = require('gulp-newer'),
    imagemin = require('gulp-imagemin'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    deporder = require('gulp-deporder'),
    concat = require('gulp-concat'),
    stripdebug = require('gulp-strip-debug'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    yargs = require('yargs'),
    gulpif = require('gulp-if'),
    rev = require('gulp-rev'),
    runSequence = require('run-sequence'),
    del = require('del');

// Check for --production flag
const PRODUCTION = !!(yargs.argv.production);

// Set to true if you want static asset revisioning, helpful for cache busting
const REVISIONING = true;

// Browser-sync
var browsersync = false;

// Delete the "dist" folder
// This happens every time a build starts
gulp.task('clean', function () {
    // You can use multiple globbing patterns as you would with `gulp.src`
    return del(['dist']);
});

// image settings
const images = {
    src: dir.src + 'images/**/*',
    build: dir.build + 'images/'
};

// image processing
gulp.task('images', function () {
    return gulp.src(images.src)
        .pipe(newer(images.build))
        .pipe(imagemin())
        .pipe(gulp.dest(images.build));
});

// fonts settings
const fonts = {
    src: dir.src + 'fonts/**/*',
    build: dir.build + 'fonts/'
};

// fonts processing
gulp.task('fonts', function () {
    return gulp.src(fonts.src)
        .pipe(newer(fonts.build))
        .pipe(gulp.dest(fonts.build));
});


// CSS settings
const css = {
    src: dir.src + 'scss/app.scss',
    watch: dir.src + 'scss/**/*.scss',
    build: dir.build + 'css/',
    sassOpts: {
        outputStyle: 'nested',
        imagePath: images.build,
        precision: 3,
        errLogToConsole: true
    },
    processors: [
        require('postcss-assets')({
            loadPaths: ['images/'],
            basePath: dir.build,
            baseUrl: 'dist/'
        }),
        require('autoprefixer')({
            browsers: ['last 2 versions', '> 2%']
        }),
        require('cssnano')
    ]
};

// CSS processing
gulp.task('css', ['images', 'fonts'], function () {
    return gulp.src(css.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sourcemaps.init())
        .pipe(sass(css.sassOpts))
        .pipe(postcss(css.processors))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulpif(REVISIONING && PRODUCTION, rev()))
        .pipe(gulp.dest(css.build))
        .pipe(gulpif(REVISIONING && PRODUCTION, rev.manifest()))
        .pipe(gulp.dest(css.build))
        .pipe(browsersync ? browsersync.reload({stream: true}) : gutil.noop());
});


// JavaScript settings
const js = {
    src: dir.src + 'js/**/*.js',
    build: dir.build + 'js/',
    filename: 'app.js'
};

// JavaScript processing
gulp.task('js', function () {

    return gulp.src(js.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(deporder())
        .pipe(concat(js.filename))
        .pipe(gulpif(PRODUCTION, stripdebug()))
        .pipe(uglify())
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulpif(REVISIONING && PRODUCTION, rev()))
        .pipe(gulp.dest(js.build))
        .pipe(gulpif(REVISIONING && PRODUCTION, rev.manifest()))
        .pipe(gulp.dest(js.build))
        .pipe(browsersync ? browsersync.reload({stream: true}) : gutil.noop());

});


// Browsersync options
const syncOpts = {
    proxy: 'localhost',
    files: dir.build + '**/*',
    open: false,
    notify: false,
    ghostMode: false,
    ui: {
        port: 8001
    }
};


// browser-sync
gulp.task('browsersync', function () {
    if (browsersync === false) {
        browsersync = require('browser-sync').create();
        browsersync.init(syncOpts);
    }
});


// run all tasks
gulp.task('build', function () {
    runSequence('clean', ['css', 'js']);
});


// watch for file changes
gulp.task('watch', function () {

    // image changes
    gulp.watch(images.src, ['images']);

    // fonts changes
    gulp.watch(fonts.src, ['fonts']);

    // CSS changes
    gulp.watch(css.watch, ['css']);

    // JavaScript main changes
    gulp.watch(js.src, ['js']);

});


// default task
gulp.task('default', ['build', 'watch']);
