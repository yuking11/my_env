/**
 * ENV Settings
 */
const config = {
  env: 'current',// local or current
  url: 'http://gh_my_env.local.test/',// site url
  phpVer:  '7.2.9',// for Windows
  phpBase: 'public'
};


/**
 * site-config
 */
const paths = {
  dest       : './public',
  srcImages  : './src/_img',
  srcFonts   : './src/_icons',
  srcScripts : './src/_js',
  sass       : './src/_sass',
  assets     : './public/assets',
  images     : './public/assets/img',
  fonts      : './public/assets/fonts',
  scripts    : './public/assets/js',
  styles     : './public/assets/css'
};


/**
 * exports
 */
module.exports = {
  // base
  base: config,
  // paths
  path: paths
};
