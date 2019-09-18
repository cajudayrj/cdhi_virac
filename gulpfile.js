// GULP PACKAGES
// Most packages are lazy loaded
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    browserSync = require('browser-sync').create(),
    filter = require('gulp-filter'),
    touch = require('gulp-touch-cmd'),
    plugin = require('gulp-load-plugins')(),
    svgSprite = require('gulp-svg-sprite');

const dotenv = require('dotenv').config();

// GULP VARIABLES
// Modify these variables to match your project needs

// Set local URL if using Browser-Sync
const LOCAL_URL = process.env.LOCAL_URL;

const SOURCE = {
    scripts: [
        // Place custom JS here, files will be concantonated, minified if ran with --production
        'assets/js/**/*.js',
        '!assets/js/scripts.js',
        '!assets/js/scripts.js.map',
    ],
    // Scss files will be concantonated, minified if ran with --production
    styles: 'assets/scss/**/*.scss',

    php: '**/*.php',

    sprites: 'assets/svg/files/*.svg'
};

const ASSETS = {
    styles: 'assets/scss/',
    scripts: 'assets/js/',
    images: 'assets/images/',
    all: 'assets/'
};

const JSHINT_CONFIG = {
    "node": true,
    "globals": {
        "document": true,
        "window": true,
        "jQuery": true,
        "$": true,
        "Foundation": true
    }
};

//GULP CONFIG FOR SVG SPRITES
const svgConfig = {
    mode: {
        stack: {
            bust: false
        }
    }
};

gulp.task('sprite', function () {
    return gulp.src('**/*.svg', { cwd: './assets/svg/files' })
        .pipe(svgSprite(svgConfig))
        .pipe(gulp.dest('./assets/svg'));
})

// GULP FUNCTIONS
// JSHint, concat, and minify JavaScript
gulp.task('scripts', function () {

    // Use a custom filter so we only lint custom JS
    const CUSTOMFILTER = filter(ASSETS.scripts + 'js/**/*.js', { restore: true });

    return gulp.src(SOURCE.scripts)
        .pipe(plugin.plumber(function (error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(plugin.sourcemaps.init())
        .pipe(plugin.babel({
            presets: ['es2015'],
            compact: true,
            ignore: ['what-input.js']
        }))
        .pipe(CUSTOMFILTER)
        .pipe(plugin.jshint(JSHINT_CONFIG))
        .pipe(plugin.jshint.reporter('jshint-stylish'))
        .pipe(CUSTOMFILTER.restore)
        .pipe(plugin.concat('scripts.js'))
        .pipe(plugin.uglify())
        .pipe(plugin.sourcemaps.write('.')) // Creates sourcemap for minified JS
        .pipe(gulp.dest(ASSETS.scripts))
});

// Compile Sass, Autoprefix and minify
gulp.task('styles', function () {
    return gulp.src(SOURCE.styles)
        .pipe(plugin.plumber(function (error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(plugin.sourcemaps.init())
        .pipe(plugin.sass())
        .pipe(plugin.autoprefixer({
            browsers: [
                'last 2 versions',
                'ie >= 9',
                'ios >= 7'
            ],
            cascade: false
        }))
        .pipe(plugin.cssnano({ safe: true, minifyFontValues: { removeQuotes: false } }))
        .pipe(plugin.sourcemaps.write('.'))
        .pipe(gulp.dest(ASSETS.styles))
        .pipe(touch())
        .pipe(browserSync.reload({
            stream: true
        }));
});

// Browser-Sync watch files and inject changes
gulp.task('browsersync', function () {

    // Watch these files
    var files = [
        SOURCE.php,
    ];

    browserSync.init(files, {
        proxy: LOCAL_URL,
    });

    gulp.watch(SOURCE.styles, gulp.parallel('styles')).on('change', browserSync.reload);
    gulp.watch(SOURCE.scripts, gulp.parallel('scripts')).on('change', browserSync.reload);
    gulp.watch(SOURCE.sprites, gulp.parallel('sprite')).on('change', browserSync.reload);

});

// Watch files for changes (without Browser-Sync)
gulp.task('watch', function () {

    // Watch .scss files
    gulp.watch(SOURCE.styles, gulp.parallel('styles'));

    // Watch scripts files
    gulp.watch(SOURCE.scripts, gulp.parallel('scripts'));

    // Watch svg files
    gulp.watch(SOURCE.sprites, gulp.parallel('sprite'));


});

// Run styles, scripts and foundation-js
gulp.task('default', gulp.parallel('styles', 'scripts', 'sprite'));
