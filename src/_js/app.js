"use strict";
import { Utils } from "./utils";
import { Uac } from "./uac";

const utils = new Utils();
const uac = new Uac();

/**
 * sample
 */
console.log('utils.getWindowWidth: ' + utils.getWindowWidth());
console.log('utils.mq("1279", "max"): ' + utils.mq('1279', 'max'));
console.log('utils.mq("1280"): ' + utils.mq('1280'));

console.log('browser name: ' + uac.browser());
console.log('device name: ' + uac.device());
console.log('if it\'s IE: ' + uac.isIE());
console.log('if it\'s ios: ' + uac.isiOS());
console.log('if it\'s a mobile device: ' + uac.isMobile());
console.log('if it\'s a tablet device: ' + uac.isTablet());
console.log('if it\'s a touch device: ' + uac.isTouch());
console.log('if it\'s a modern browser: ' + uac.isModern());

/**
 * add classes <html>
 */
// uac.homeClass();

/**
 * 画像ロールオーバー vanilla JS
 *
 * @param none
 *
 */
function smartRollover() {
  let preLoadImg = {};
  if( document.getElementsByClassName ) {
    let elm = document.getElementsByClassName('over');
    for(let i=0; i < elm.length; i++) {
      let elmSrc = elm[i].getAttribute('src');
      let sep    = elmSrc.lastIndexOf('.');
      let onSrc  = elmSrc.substr(0, sep) + '_on' + elmSrc.substr(sep, 4);
      preLoadImg[elmSrc] = new Image();
      preLoadImg[elmSrc].src = onSrc;
      elm[i].onmouseover = (e) => {
        e.preventDefault();
        e.currentTarget.classList.add('is-hover');
        e.currentTarget.setAttribute('src', onSrc );
      }
      elm[i].onmouseout = (e) => {
        e.preventDefault();
        e.currentTarget.classList.remove('is-hover');
        e.currentTarget.setAttribute('src', elmSrc );
      }
    }// for
  }// if
}// func
window.addEventListener('load', smartRollover, false);


/**
 * スムーズスクロール vanilla JS
 *
 * @param none
 *
 */
let btnScroll = document.querySelectorAll('[data-scroll]');
for (let i = 0; i < btnScroll.length; i++) {
  btnScroll[i].addEventListener('click', (e) => {
    const speed  = 1000,
          btn    = e.currentTarget,
          href   = btn.getAttribute('href'),
          diff   = ( btn.dataset.scroll && parseInt(btn.dataset.scroll) ) ? parseInt(btn.dataset.scroll, 10) : 0,
          targetElm = document.querySelector(href);
    // 移動差分取得
    let offset = diff;
    // fix要素あれば
    const fixed = btn.getAttribute('data-scroll-fixed');
    if ( fixed ) {
      const fixedHeight = document.querySelector(fixed).offsetHeight;
      offset += fixedHeight;
    }// if
    utils.smoothScroll(
      href,
      targetElm,
      speed,
      offset,
      'easeOutQuint'
    );
    return false;
  });// addEventListener
}// for
