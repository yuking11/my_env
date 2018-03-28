/*
 * gulp-config
 */
require('babel-register');
import gulp from 'gulp';
/*
 * gulp-load-plugins
 *   concat / consolidate / cssmin / iconfont / imageoptim
 *   load-plugins / notify / plumber / postcss / rename
 *   sass / sourcemaps / spritesmith / uglify
 */
import gulpLoadPlugins from 'gulp-load-plugins';
const $ = gulpLoadPlugins();
/*
 * Other Plugins
 */
// Browser Sync
import bs from 'browser-sync';
const browserSync = bs.create();
// Post CSS
import autoprefixer from 'autoprefixer';
import assets       from 'postcss-assets';
import mqpacker     from 'css-mqpacker';
// webpack
import webpack from 'webpack';
import webpackStream from 'webpack-stream';
import webpackConfig from './webpack.config.js';

/*
 * site-config
 */
const siteUrl = 'http://gh_my_env.local.test/';// 環境にあわせて変更
const paths   = {
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
export const watch = () => {
  gulp.watch( paths.sass + '/**/*.scss', sass );
  gulp.watch( paths.styles + '/*.css', cssmin );
  gulp.watch( paths.srcScripts + '/**/*.js', scripts );
  // gulp.watch( paths.scripts + '/*.js', jsmin );
  gulp.watch( paths.dest + '/**/*.php', html );
}

// js ES2015 WebPack
export const scripts = () => {
  return webpackStream(webpackConfig, webpack)
    .pipe($.plumber())
    .pipe(gulp.dest( paths.scripts ))
    .pipe(browserSync.reload({ stream: true }));
}

// jsmin
export const jsmin = () => {
      return gulp.src( paths.scripts + '/app.js' )
  //gulp.src(paths.scripts + '/**/*.js')
    //.pipe(concat('app.js'))
    .pipe($.plumber())
    .pipe($.uglify())
    .pipe($.rename({ suffix: '.min' }))
    .pipe(gulp.dest( paths.scripts ))
    .pipe(browserSync.reload({ stream: true }));
}

// sass
export const sass = () => {
  return gulp.src( paths.sass + '/**/*.scss' )
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
}

// css-min
export const cssmin = () => {
  gulp.src( paths.styles + '/app.css' )
    .pipe($.postcss([mqpacker()]))
    .pipe($.cssmin())
    .pipe($.rename({ suffix: '.min' }))
    .pipe(gulp.dest( paths.styles ))
    .pipe(browserSync.reload({stream: true}));
}

// HTML
export const html = () => {
  return gulp.src(paths.dest + '/**/*.php')
    .pipe($.plumber())
    .pipe(browserSync.reload({stream: true}));
}

// BrowserSync
export const localServer = () => {
  browserSync.init({
    proxy: siteUrl,
    open: 'external'// URLをUPで開く
  });
}

/*
 * gulp option tasks
 */

// sprite
export const sprite = () => {
  const spriteData = gulp.src( paths.images + '/sprites/*.png' )
    .pipe($.spritesmith({
      imgName: 'sprite.png',
      imgPath: '../img/sprite.png',
      cssName: '_sprites.scss',
      padding: 40
  }));
  spriteData.img.pipe(gulp.dest( paths.images ));
  return spriteData.css.pipe(gulp.dest( paths.sass + '/object/modules' ));
}

// sprite ( retina )
export const spriter = () => {
  const spriteData = gulp.src( paths.images + '/sprites/*.png' )
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
}

// iconfont
export const font = () => {
  const fontName = 'icon';
  return gulp.src( paths.srcFonts + '/*.svg' )
    .pipe( $.iconfont( {
      normalize : true,
      fontName: fontName,
      appendCodepoints: true,
      startUnicode: 0xF001,
      fontHeight: 1001
    } ) )
    .on('glyphs', (glyphs) => {
    // .on( 'codepoints', function( codepoints ) {
      const options = {
        glyphs: glyphs.map( (glyph) => {
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
}

// imageoptim
// export const img = () => {
//   return gulp.src( paths.srcImages + '/**/*' )
//     .pipe( $.imageoptim.optimize() )
//     .pipe( gulp.dest(paths.images) );
// }


/*
 * gulp.default
 */
export default gulp.series( gulp.parallel(localServer, watch) );
