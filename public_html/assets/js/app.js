/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/_js/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/_js/app.js":
/*!************************!*\
  !*** ./src/_js/app.js ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nvar _utils = __webpack_require__(/*! ./utils */ \"./src/_js/utils.js\");\n\nvar utils = new _utils.Utils();\n\n/**\n * sample\n */\nconsole.log('utils.getWindowWidth: ' + utils.getWindowWidth());\nconsole.log('utils.mq(\"1279\", \"max\"): ' + utils.mq('1279', 'max'));\nconsole.log('utils.mq(\"1280\"): ' + utils.mq('1280'));\n\n/**\n * 画像ロールオーバー vanilla JS\n *\n * @param none\n *\n */\nfunction smartRollover() {\n  var preLoadImg = {};\n  if (document.getElementsByClassName) {\n    var elm = document.getElementsByClassName('over');\n\n    var _loop = function _loop(i) {\n      var elmSrc = elm[i].getAttribute('src');\n      var sep = elmSrc.lastIndexOf('.');\n      var onSrc = elmSrc.substr(0, sep) + '_on' + elmSrc.substr(sep, 4);\n      preLoadImg[elmSrc] = new Image();\n      preLoadImg[elmSrc].src = onSrc;\n      elm[i].onmouseover = function (e) {\n        e.preventDefault();\n        e.currentTarget.classList.add('is-hover');\n        e.currentTarget.setAttribute('src', onSrc);\n      };\n      elm[i].onmouseout = function (e) {\n        e.preventDefault();\n        e.currentTarget.classList.remove('is-hover');\n        e.currentTarget.setAttribute('src', elmSrc);\n      };\n    };\n\n    for (var i = 0; i < elm.length; i++) {\n      _loop(i);\n    } // for\n  } // if\n} // func\nwindow.addEventListener('load', smartRollover, false);\n\n/**\n * スムーズスクロール vanilla JS\n *\n * @param none\n *\n */\nvar btnScroll = document.querySelectorAll('[data-scroll]');\nfor (var i = 0; i < btnScroll.length; i++) {\n  btnScroll[i].addEventListener('click', function (e) {\n    var speed = 1000,\n        btn = e.currentTarget,\n        href = btn.getAttribute('href'),\n        diff = btn.dataset.scroll && parseInt(btn.dataset.scroll) ? parseInt(btn.dataset.scroll, 10) : 0,\n        targetElm = document.querySelector(href);\n    // 移動差分取得\n    var offset = diff;\n    // fix要素あれば\n    var fixed = btn.getAttribute('data-scroll-fixed');\n    if (fixed) {\n      var fixedHeight = document.querySelector(fixed).offsetHeight;\n      offset += fixedHeight;\n    } // if\n    utils.smoothScroll(href, targetElm, speed, offset, 'easeOutQuint');\n    return false;\n  }); // addEventListener\n} // for\n\n//# sourceURL=webpack:///./src/_js/app.js?");

/***/ }),

/***/ "./src/_js/utils.js":
/*!**************************!*\
  !*** ./src/_js/utils.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nObject.defineProperty(exports, \"__esModule\", {\n  value: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\n/**\n *\n * Utility Class\n *\n * @method: isTouchDevice()\n * @method: getWindowWidth()\n * @method: smoothScroll()\n *\n */\nvar Utils = exports.Utils = function () {\n  function Utils() {\n    _classCallCheck(this, Utils);\n  }\n  // console.log('Load Utils.');\n\n\n  /**\n   * タッチデバイス判定\n   *\n   * @param none\n   * @return bool\n   *\n   */\n\n\n  _createClass(Utils, [{\n    key: 'isTouchDevice',\n    value: function isTouchDevice() {\n      var result = false;\n      if (window.ontouchstart === null) {\n        result = true;\n      }\n      return result;\n    } // isTouchDevice\n\n    /**\n     * window width 値取得\n     *\n     * @param none\n     * @return number\n     *\n     */\n\n  }, {\n    key: 'getWindowWidth',\n    value: function getWindowWidth() {\n      var ww = window.innerWidth;\n      return ww;\n    } // getWindowWidth\n\n    /**\n     * Media Query判定\n     *\n     * @param size: string\n     * @param rule(min / max): string\n     * @return boolean\n     *\n     */\n\n  }, {\n    key: 'mq',\n    value: function mq(size) {\n      var rule = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'min';\n\n      return window.matchMedia('(' + rule + '-width: ' + size + 'px)').matches;\n    } // mq\n\n    /**\n     * スムーズスクロール\n     *\n     * @param targetHash: string\n     * @param dest: string\n     * @param duration: num\n     * @param offset: num\n     * @param easing: string\n     * @param callback: function\n     *\n     */\n\n  }, {\n    key: 'smoothScroll',\n    value: function smoothScroll(targetHash, dest) {\n      var duration = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 200;\n      var offset = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0;\n      var easing = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'linear';\n      var callback = arguments[5];\n\n\n      var easings = {\n        linear: function linear(t) {\n          return t;\n        },\n        easeInQuad: function easeInQuad(t) {\n          return t * t;\n        },\n        easeOutQuad: function easeOutQuad(t) {\n          return t * (2 - t);\n        },\n        easeInOutQuad: function easeInOutQuad(t) {\n          return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;\n        },\n        easeInCubic: function easeInCubic(t) {\n          return t * t * t;\n        },\n        easeOutCubic: function easeOutCubic(t) {\n          return --t * t * t + 1;\n        },\n        easeInOutCubic: function easeInOutCubic(t) {\n          return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;\n        },\n        easeInQuart: function easeInQuart(t) {\n          return t * t * t * t;\n        },\n        easeOutQuart: function easeOutQuart(t) {\n          return 1 - --t * t * t * t;\n        },\n        easeInOutQuart: function easeInOutQuart(t) {\n          return t < 0.5 ? 8 * t * t * t * t : 1 - 8 * --t * t * t * t;\n        },\n        easeInQuint: function easeInQuint(t) {\n          return t * t * t * t * t;\n        },\n        easeOutQuint: function easeOutQuint(t) {\n          return 1 + --t * t * t * t * t;\n        },\n        easeInOutQuint: function easeInOutQuint(t) {\n          return t < 0.5 ? 16 * t * t * t * t * t : 1 + 16 * --t * t * t * t * t;\n        }\n      };\n\n      var start = window.pageYOffset;\n      var startTime = 'now' in window.performance ? performance.now() : new Date().getTime();\n\n      var documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);\n      var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;\n\n      var destOffset = 0;\n      if (targetHash !== '#page_top') {\n        destOffset = typeof dest === 'number' ? dest : dest.offsetTop;\n      }\n      destOffset += offset;\n\n      var destOffsetToScroll = Math.round(documentHeight - destOffset < windowHeight ? documentHeight - windowHeight : destOffset);\n\n      if ('requestAnimationFrame' in window === false) {\n        window.scroll(0, destOffsetToScroll);\n        if (callback) {\n          callback();\n        }\n        return;\n      }\n\n      function scroll() {\n        var now = 'now' in window.performance ? performance.now() : new Date().getTime();\n        var time = Math.min(1, (now - startTime) / duration);\n        var timeFunction = easings[easing](time);\n        window.scroll(0, Math.ceil(timeFunction * (destOffsetToScroll - start) + start));\n        if (window.pageYOffset === destOffsetToScroll) {\n          if (callback) callback();\n          return;\n        }\n        requestAnimationFrame(scroll);\n      } // func\n\n      scroll();\n    } // smoothScroll\n\n  }]);\n\n  return Utils;\n}();\n\n//# sourceURL=webpack:///./src/_js/utils.js?");

/***/ })

/******/ });