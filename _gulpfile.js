/*
 * gulp-config
 */
var gulp = require('gulp');
/*
 * gulp-load-plugins
 *   concat / consolidate / cssmin / iconfont / imageoptim
 *   load-plugins / notify / plumber / postcss / rename
 *   sass / sourcemaps / spritesmith / uglify
*/
var $            = require('gulp-load-plugins')();
var browserSync  = require('browser-sync').create();
var autoprefixer = require('autoprefixer');
var assets       = require('postcss-assets');
var mqpacker     = require('css-mqpacker');
// webpack
var webpack = require('webpack');
var webpackStream = require('webpack-stream');
var webpackConfig = require('./webpack.config.js');

/*
 * site-config
 */
var siteUrl = 'http://gh_my_env.local.dev/';// 環境にあわせて変更
var paths   = {
  dest       : './public_html',
  srcImages  : './src/_img',
  srcFonts   : './src/_icons',
  srcScripts : './src/_js',
  sass       : './src/_sass',
  images     : './public_html/assets/img',
  fonts      : './public_html/assets/fonts',
  scripts    : './public_html/assets/js',
  styles     : './public_html/assets/css'
}

/*
 * gulp.tasks
 */

// Watch
gulp.task('watch', function () {
  //gulp.watch(paths.sass + '/**/*.scss', ['sass']);
  gulp.watch( paths.sass + '/**/*.scss', gulp.task('sass') );
  gulp.watch( paths.styles + '/*.css', gulp.task('cssmin') );
  gulp.watch( paths.srcScripts + '/**/*.js', gulp.task('webpack') );
  // gulp.watch( paths.scripts + '/*.js', ['jsmin'] );
  gulp.watch( paths.dest + '/**/*.php', gulp.task('html') );
});

// js ES2015 WebPack
gulp.task('webpack', function() {
  return webpackStream(webpackConfig, webpack)
    // .pipe($.plumber({errorHandler: $.notify.onError("Error: <%= error.message %>")}))
    .pipe($.plumber())
    .pipe(gulp.dest( paths.scripts ))
    .pipe(browserSync.reload({ stream: true }));
});

// jsmin
gulp.task('jsmin', function() {
  gulp.src( paths.scripts + '/app.js' )
  //gulp.src(paths.scripts + '/**/*.js')
    //.pipe(concat('app.js'))
    .pipe($.plumber())
    .pipe($.uglify())
    .pipe($.rename({ suffix: '.min' }))
    .pipe(gulp.dest( paths.scripts ))
    .pipe(browserSync.reload({ stream: true }));
});

// sass
gulp.task('sass', function () {
  gulp.src( paths.sass + '/**/*.scss' )
    //②plumberの引数にエラーメッセージを設定
    .pipe($.plumber({errorHandler: $.notify.onError("Error: <%= error.message %>")}))
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      //outputStyle: 'compressed'
    })
    // .on('error', $.sass.logError)
    )
    .pipe($.postcss([assets({
      // プロジェクトで公開するパス
      basePath : paths.dest + '/assets/',
      // basePathから見た画像フォルダの位置
      loadPaths: ['img/'],
      // img/とcss/の相対的な位置
      relative : 'css/',
      cachebuster: true
    })]))
    .pipe($.postcss([
      require('autoprefixer')({
        browsers: ['last 2 versions']
      })
    ]))
    .pipe($.sourcemaps.write( './' ))
    .pipe(gulp.dest( paths.styles ))
    .pipe(browserSync.reload({stream: true}));
});

// css-min
gulp.task('cssmin', function () {
  gulp.src( paths.styles + '/app.css' )
  .pipe($.postcss([mqpacker()]))
  .pipe($.cssmin())
  .pipe($.rename({ suffix: '.min' }))
  .pipe(gulp.dest( paths.styles ))
  .pipe(browserSync.reload({stream: true}));
});

// HTML
gulp.task('html', function() {
  gulp.src(paths.dest + '/**/*.php')
    .pipe($.plumber())
    .pipe(browserSync.reload({stream: true}));
});

// BrowserSync
gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: siteUrl,
    open: 'external'// URLをUPで開く
  });
});

/*
 * gulp option tasks
 */

// sprite
gulp.task('sprite', function(){
  var spriteData;
  spriteData = gulp.src( paths.images + '/sprites/*.png' )
  .pipe($.spritesmith({
    imgName: 'sprite.png',
    imgPath: '../img/sprite.png',
    cssName: '_sprites.scss',
    padding: 40
  }));
  spriteData.img.pipe(gulp.dest( paths.images ));
  return spriteData.css.pipe(gulp.dest( paths.sass + '/object/modules' ));
});

// sprite ( retina )
gulp.task('spriter', function(){
  var spriteData;
  spriteData = gulp.src( paths.images + '/sprites/*.png' )
  .pipe($.spritesmith({
    retinaSrcFilter: paths.images + '/sprites/*-2x.png',
    imgName: 'sprite.png',
    retinaImgName: 'sprite-2x.png',
    imgPath: '../img/sprite.png',
    retinaImgPath: paths.images + '/sprite-2x.png',
    cssName: '_sprites.scss',
    padding: 40
  }));
  spriteData.img.pipe(gulp.dest( paths.images ));
  return spriteData.css.pipe(gulp.dest( paths.sass + '/object/modules' ));
});

// iconfont
gulp.task( 'font', function() {
  var fontName = 'icon';
  return gulp.src( paths.srcFonts + '/*.svg' )
    .pipe( $.iconfont( {
      normalize : true,
      fontName: fontName,
      appendCodepoints: true,
      startUnicode: 0xF001,
      fontHeight: 1001
    } ) )
    .on('glyphs', function(glyphs) {
    // .on( 'codepoints', function( codepoints ) {
      var options = {
        glyphs: glyphs.map(function(glyph) {
          // this line is needed because gulp-iconfont has changed the api from 2.0
          return { name: glyph.name, codepoint: glyph.unicode[0].charCodeAt(0) }
        }),
        fontName  : fontName,
        className : fontName,
        fontPath  : '../fonts/',
        cssPath   : '/assets/css/app.css',
        timeStamp : Date.now()
      };
      // CSS
      gulp.src( './src/_icons/template.css' )
      .pipe( $.consolidate( 'lodash', options ) )
      .pipe( $.rename( {
        basename: '_iconfont',
        extname: '.scss'
      } ) )
      .pipe( gulp.dest( paths.sass + '/object/modules' ) );
      // フォント一覧 HTML
      gulp.src( './src/_icons/template.php' )
      .pipe( $.consolidate( 'lodash', options ) )
      .pipe( $.rename( {
        basename: '_icon-sample',
        extname: '.php'
      }))
      .pipe( gulp.dest( paths.dest ) );
    } )
  .pipe( gulp.dest( paths.fonts ) );
} );

// imageoptim
gulp.task('img', function() {
  return gulp.src( paths.srcImages + '/**/*' )
  .pipe($.imageoptim.optimize())
  .pipe(gulp.dest(paths.images));
});


/*
 * gulp.default
 */
gulp.task('default', gulp.series( gulp.parallel('browser-sync', 'watch'), function(){
}));
