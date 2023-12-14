/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/helper/add-remove-qty.js ***!
  \***********************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "addRemoveQty": () => (/* binding */ addRemoveQty)
/* harmony export */ });


function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function enableBtnDec(btnDec) {
  // enabling the button decrement while input is more than max quantity of the product
  btnDec.removeAttribute("disabled");
  // remove the class who support the disable class and add enable class
  btnDec.classList.remove("disabled-qty", "cursor-not-allowed");
  btnDec.classList.add("active-qty");
}
function disableBtnDec(btnDec) {
  // disabling the button decrement while input is more than max quantity of the product
  btnDec.setAttribute("disabled", true);
  // remove the class who support the enable class and add disable class
  btnDec.classList.remove("active-qty");
  btnDec.classList.add("disabled-qty", "cursor-not-allowed");
}
function enableBtnInc(btnInc) {
  // enabling the button increment while input is more than max quantity of the product
  btnInc.removeAttribute("disabled");
  // remove the class who support the disable class and add enable class
  btnInc.classList.remove("disabled-qty", "cursor-not-allowed");
  btnInc.classList.add("active-qty");
}
function disableBtnInc(btnInc) {
  // disabling the button increment while input is more than max quantity of the product
  btnInc.setAttribute("disabled", true);
  // remove the class who support the enable class and add disable class
  btnInc.classList.remove("active-qty");
  btnInc.classList.add("disabled-qty", "cursor-not-allowed");
}
function addRemoveQty(container) {
  // loop the container
  _toConsumableArray(container).forEach(function (children) {
    var childEl = children.children;
    var _childEl = _slicedToArray(childEl, 3),
      btnDec = _childEl[0],
      inputQty = _childEl[1],
      btnInc = _childEl[2];

    // each button decrement function click
    btnDec.addEventListener("click", function () {
      var inputEl = inputQty;

      // decrement the value
      inputEl.value = +inputEl.value - 1;

      // disable the button decrease and enable the button increase while input value less than equal 1
      if (+inputEl.value <= 1) {
        // enable increment button
        enableBtnInc(btnInc);
        // disable decrement button
        disableBtnDec(btnDec);
      }

      // enable the button increase while input value less than max quantity of the product
      if (+inputEl.value < 999) {
        // enable increment button
        enableBtnInc(btnInc);
      }
    });

    // avoid the string and symbol value of input element
    inputQty.addEventListener("keydown", function (event) {
      var isBackspace = event.key === "Backspace";
      if (!(event.keyCode >= 48 && event.keyCode <= 57) && !isBackspace && !(event.keyCode >= 37 && event.keyCode <= 40) && !(event.keyCode >= 112 && event.keyCode <= 123)) {
        event.preventDefault();
      }
    });

    // each input element function change
    inputQty.addEventListener("keyup", function (event) {
      var thisEl = event.target;

      // avoid zero value
      if (thisEl.value.length === 0 || thisEl.value === "") {
        // set it to 1
        thisEl.value = 1;

        // enable button increment
        enableBtnInc(btnInc);
        // disable button decrement
        enableBtnDec(btnDec);
      }

      // avoid the length value more than 3 and qty is more than 999
      if (thisEl.value.length > 3 || +thisEl.value > 999) {
        // set it to max quantity of the product
        thisEl.value = 999;

        // enable button decrement
        enableBtnDec(btnDec);
        // disable button increment
        disableBtnInc(btnInc);
      }
    });

    // each button increment function click
    btnInc.addEventListener("click", function () {
      var inputEl = inputQty;

      // increment the value
      inputEl.value = +inputEl.value + 1;

      // enable the button decrease while input value more than 1
      if (+inputEl.value > 1) {
        // enable button decrement
        enableBtnDec(btnDec);
      }

      // avoid the length value more than 3 and qty is more than 999
      if (+inputEl.value >= 999) {
        // enable button decrement
        enableBtnDec(btnDec);
        // disable button increment
        disableBtnInc(btnInc);
      }
    });
  });
}
/******/ })()
;