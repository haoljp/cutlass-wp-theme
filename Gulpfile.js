'use strict';

// == Gulp Require Modules == //
var gulp =            require('gulp'),
    sass =            require('gulp-sass'),
    autoprefixer =    require('gulp-autoprefixer'),
    cssmin =          require('gulp-cssmin'),
    rename =          require('gulp-rename'),
    concat =          require('gulp-concat'),
    uglify =          require('gulp-uglify'),
    livereload =      require('gulp-livereload'),
    plumber =         require('gulp-plumber'),
    imagemin =        require('gulp-imagemin'),
    pngcrush =        require('imagemin-pngcrush'),
    mainBowerFiles =  require('main-bower-files'),
    filter =          require('gulp-filter'),
    connect =         require('gulp-connect'),
    copy =            require('gulp-copy'),
    clean =           require('gulp-clean');

// == Clean Tasks == //

gulp.task('clean-tmp', function(){
    return gulp.src('dist/tmp/', {read: false})
      .pipe(clean());
});
gulp.task('clean-scripts', function(){
    return gulp.src('dist/js/*.js', {read: false})
      .pipe(clean());
});
gulp.task('clean-styles', function(){
    return gulp.src('dist/css/*.css', {read: false})
      .pipe(clean());
});
gulp.task('clean-images', function(){
    return gulp.src('dist/img/*', {read: false})
      .pipe(clean());
});
gulp.task('clean-fonts', function() {
  return gulp.src('dist/fonts/*', {read: false})
    .pipe(clean());
});

// == STYLES TASKS == //

// = Only compiles SASS and autoprefixes = //
gulp.task('styles-dev', function() {
  return gulp.src('src/sass/*.scss')
    .pipe(plumber())
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
    .pipe(gulp.dest('dist/css/'));
});
// = Compiles SASS, autoprefixes then minifies the final version = //
gulp.task('styles-build', function() {
  return gulp.src('src/sass/*.scss')
    .pipe(plumber())
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
    .pipe(gulp.dest('dist/css/'))
    .pipe(cssmin())
    .pipe(gulp.dest('dist/css/'));
});


// == SCRIPTS TASKS == //

// = Only copies over the javascript files and concatinates them = //
gulp.task('scripts-dev',function(){
  return gulp.src('src/js/*.js')
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/js/'));
});
// = Uglifies the javascript files then concatinates them = //
gulp.task('scripts-build', function() {
  return gulp.src('src/js/**/*.js')
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js/'));
});


// == VENDOR TASKS == // 
// 
var filterVendor = filter(['*.js', '!html5shiv/**']);

// = Copies and concatinates the development vendor CSS and JS specified in Bower (Read the Docs) = //
gulp.task('vendor-dev', function(){
  gulp.src(mainBowerFiles())
    .pipe(plumber())
    .pipe(filterVendor)
    .pipe(gulp.dest('dist/tmp/'))
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('dist/js/'));
  gulp.src(mainBowerFiles())
    .pipe(plumber())
    .pipe(filter('*.css'))
    .pipe(gulp.dest('dist/tmp/'))
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('dist/css/'));
});
// = Same thing as vendor-dev except we'll uglify the Javascript and cssmin the CSS = //
gulp.task('vendor-build', function() {
  gulp.src(mainBowerFiles())
    .pipe(plumber())
    .pipe(filterVendor)
    .pipe(gulp.dest('dist/tmp/'))
    .pipe(uglify())
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('dist/js/'));
  gulp.src(mainBowerFiles())
    .pipe(plumber())
    .pipe(filter('*.css'))
    .pipe(gulp.dest('dist/tmp/'))
    .pipe(cssmin())
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('dist/css/'));
});


// == IMAGE TASKS == //

// = Any images in the src/img folder are minified then copied over to the dist/img folder = //
gulp.task('imagemin', function () {
  return gulp.src('src/img/*')
      .pipe(imagemin({
          progressive: true,
          svgoPlugins: [{removeViewBox: false}],
          use: [pngcrush()]
      }))
      .pipe(gulp.dest('dist/img/'));
});


// == WATCH TASKS == //

// = Watches all SASS, JS, and the image folder for any changes, then runs the appropriate task. 
// = Also watches all PHP, CSS, JS and the image folder in the dist folder for any changes then triggers livereload
gulp.task('watch', function() {
  gulp.watch('src/sass/**/*.scss', ['styles-dev']);
  gulp.watch('src/js/**/*.js', ['scripts-dev']);
  gulp.watch('src/img/**', ['imagemin']);
  gulp.watch('html/*.html', ['html']);
  gulp.watch('src/fonts/**', ['fonts-copy']);

  livereload.listen();
  gulp.watch('**/*.php').on('change', livereload.changed);
  gulp.watch('html/*.html').on('change', livereload.changed);
  gulp.watch('dist/css/*.css').on('change', livereload.changed);
  gulp.watch('dist/js/*.js').on('change', livereload.changed);
  gulp.watch('dist/img/**').on('change', livereload.changed);
  gulp.watch('dist/fonts/**').on('change', livereload.changed);
});

gulp.task('connect', function() {
  connect.server({
    root: '',
    livereload: true
  });
});

gulp.task('html', function() {
  gulp.src('./html/*.html')
    .pipe(connect.reload());
});

gulp.task('fonts-copy', function() {
  return gulp.src('src/fonts/**')
    .pipe(copy('dist/fonts', {
      prefix: 2
    }));
});


// == GULP TASKS == //

// = Clean Task = //
gulp.task('clean', ['clean-styles', 'clean-scripts', 'clean-tmp', 'clean-fonts']);
// = Development Task = //
gulp.task('dev', ['clean', 'fonts-copy', 'vendor-dev', 'styles-dev', 'scripts-dev']);
// = Build Task = //
gulp.task('build', ['clean', 'fonts-copy', 'vendor-build', 'styles-build', 'scripts-build']);
// = Image Task = //
gulp.task('image', ['imagemin']);
gulp.task('image-clear', ['clean-images', 'imagemin']);
// = Default Task = //
gulp.task('default', ['dev', 'watch']);

gulp.task('server', ['connect', 'dev', 'watch']);