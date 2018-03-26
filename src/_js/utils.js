/**
 *
 * Utility Class
 *
 * @method: isTouchDevice()
 * @method: getWindowWidth()
 * @method: smoothScroll()
 *
 */
 export class Utils {

  constructor() {
    // console.log('Load Utils.');
  }

  /**
   * タッチデバイス判定
   *
   * @param none
   * @return bool
   *
   */
  isTouchDevice() {
    let result = false;
    if (window.ontouchstart === null) {
      result = true;
    }
    return result;
  }// isTouchDevice

  /**
   * window width 値取得
   *
   * @param none
   * @return number
   *
   */
  getWindowWidth() {
    let ww = window.innerWidth;
    return ww;
  }// getWindowWidth

  /**
   * Media Query判定
   *
   * @param size: string
   * @param rule(min / max): string
   * @return boolean
   *
   */
  mq(size, rule = 'min') {
    return window.matchMedia('('+rule+'-width: '+size+'px)').matches;
  }// mq

  /**
   * スムーズスクロール
   *
   * @param targetHash: string
   * @param dest: string
   * @param duration: num
   * @param offset: num
   * @param easing: string
   * @param callback: function
   *
   */
  smoothScroll(targetHash, dest, duration = 200, offset = 0, easing = 'linear', callback) {

    const easings = {
      linear(t) {
        return t;
      },
      easeInQuad(t) {
        return t * t;
      },
      easeOutQuad(t) {
        return t * (2 - t);
      },
      easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
      },
      easeInCubic(t) {
        return t * t * t;
      },
      easeOutCubic(t) {
        return (--t) * t * t + 1;
      },
      easeInOutCubic(t) {
        return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
      },
      easeInQuart(t) {
        return t * t * t * t;
      },
      easeOutQuart(t) {
        return 1 - (--t) * t * t * t;
      },
      easeInOutQuart(t) {
        return t < 0.5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t;
      },
      easeInQuint(t) {
        return t * t * t * t * t;
      },
      easeOutQuint(t) {
        return 1 + (--t) * t * t * t * t;
      },
      easeInOutQuint(t) {
        return t < 0.5 ? 16 * t * t * t * t * t : 1 + 16 * (--t) * t * t * t * t;
      }
    };

    const start = window.pageYOffset;
    const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

    const documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
    const windowHeight = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

    let destOffset = 0;
    if ( targetHash !== '#page_top' ) {
      destOffset = typeof dest === 'number' ? dest : dest.offsetTop;
    }
    destOffset += offset;

    const destOffsetToScroll = Math.round(documentHeight - destOffset < windowHeight ? documentHeight - windowHeight : destOffset);

    if ('requestAnimationFrame' in window === false) {
      window.scroll(0, destOffsetToScroll);
      if (callback) {
        callback();
      }
      return;
    }

    function scroll() {
      const now = 'now' in window.performance ? performance.now() : new Date().getTime();
      const time = Math.min(1, ((now - startTime) / duration));
      const timeFunction = easings[easing](time);
      window.scroll(0, Math.ceil((timeFunction * (destOffsetToScroll - start)) + start));
      if (window.pageYOffset === destOffsetToScroll) {
        if (callback) callback();
        return;
      }
      requestAnimationFrame(scroll);
    }// func

    scroll();
  }// smoothScroll

}
