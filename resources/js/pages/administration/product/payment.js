/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/helper/popup.js":
/*!**************************************!*\
  !*** ./resources/js/helper/popup.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

  __webpack_require__.r(__webpack_exports__);
  /* harmony export */ __webpack_require__.d(__webpack_exports__, {
  /* harmony export */   "closeModal": () => (/* binding */ closeModal),
  /* harmony export */   "openModal": () => (/* binding */ openModal)
  /* harmony export */ });
  
  
  // visible class
  var modalVisibleClass = "bg-black/80 w-full h-screen fixed bottom-0 left-0";
  var modalOverlayVisibleClass = "absolute w-full h-full z-10";
  var modalContentVisibleClass = "absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-0 bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 py-4 z-50 transition-transform duration-300";
  // invisible class
  var modalInvisibleClass = "bg-transparent invisible w-full h-screen fixed bottom-0 left-0 transition-all";
  var modalOverlayInvisibleClass = "hidden w-full h-full z-10";
  var modalContentInvisibleClass = "absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-[40rem] bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 pt-4 z-50 transition-transform duration-300";
  function openModal(modal, modalOverlay, modalContent) {
    // remove class
    modalInvisibleClass.split(" ").forEach(function (cls) {
      return modal.classList.remove(cls);
    });
    modalOverlayInvisibleClass.split(" ").forEach(function (cls) {
      return modalOverlay.classList.remove(cls);
    });
    modalContentInvisibleClass.split(" ").forEach(function (cls) {
      return modalContent.classList.remove(cls);
    });
  
    // add class
    modalVisibleClass.split(" ").forEach(function (cls) {
      return modal.classList.add(cls);
    });
    modalOverlayVisibleClass.split(" ").forEach(function (cls) {
      return modalOverlay.classList.add(cls);
    });
    modalContentVisibleClass.split(" ").forEach(function (cls) {
      return modalContent.classList.add(cls);
    });
  }
  function closeModal(modal, modalOverlay, modalContent) {
    // remove class
    modalVisibleClass.split(" ").forEach(function (cls) {
      return modal.classList.remove(cls);
    });
    modalOverlayVisibleClass.split(" ").forEach(function (cls) {
      return modalOverlay.classList.remove(cls);
    });
    modalContentVisibleClass.split(" ").forEach(function (cls) {
      return modalContent.classList.remove(cls);
    });
  
    // add class
    modalInvisibleClass.split(" ").forEach(function (cls) {
      return modal.classList.add(cls);
    });
    modalOverlayInvisibleClass.split(" ").forEach(function (cls) {
      return modalOverlay.classList.add(cls);
    });
    modalContentInvisibleClass.split(" ").forEach(function (cls) {
      return modalContent.classList.add(cls);
    });
  }
  
  /***/ })
  
  /******/ 	});
  /************************************************************************/
  /******/ 	// The module cache
  /******/ 	var __webpack_module_cache__ = {};
  /******/ 	
  /******/ 	// The require function
  /******/ 	function __webpack_require__(moduleId) {
  /******/ 		// Check if module is in cache
  /******/ 		var cachedModule = __webpack_module_cache__[moduleId];
  /******/ 		if (cachedModule !== undefined) {
  /******/ 			return cachedModule.exports;
  /******/ 		}
  /******/ 		// Create a new module (and put it into the cache)
  /******/ 		var module = __webpack_module_cache__[moduleId] = {
  /******/ 			// no module.id needed
  /******/ 			// no module.loaded needed
  /******/ 			exports: {}
  /******/ 		};
  /******/ 	
  /******/ 		// Execute the module function
  /******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
  /******/ 	
  /******/ 		// Return the exports of the module
  /******/ 		return module.exports;
  /******/ 	}
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
  // This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
  (() => {
  /*!**********************************************!*\
    !*** ./resources/js/user/payment/payment.js ***!
    \**********************************************/
  __webpack_require__.r(__webpack_exports__);
  /* harmony import */ var _helper_popup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helper/popup */ "./resources/js/helper/popup.js");
  
  
  
  window.addEventListener("load", function () {
    var listMenus = document.querySelectorAll(".list-menu");
    var modal = document.getElementById("modal");
    var modalOverlay = document.getElementById("modal-overlay");
    var modalContent = document.getElementById("modal-content");
    var modalDismiss = document.querySelector('[modal-dismiss="modal-close"]');
    listMenus.forEach(function (value, index) {
      value.addEventListener("click", function () {
        (0,_helper_popup__WEBPACK_IMPORTED_MODULE_0__.openModal)(modal, modalOverlay, modalContent);
      });
    });
    modalOverlay.addEventListener("click", function () {
      (0,_helper_popup__WEBPACK_IMPORTED_MODULE_0__.closeModal)(modal, modalOverlay, modalContent);
    });
    modalDismiss.addEventListener("click", function () {
      (0,_helper_popup__WEBPACK_IMPORTED_MODULE_0__.closeModal)(modal, modalOverlay, modalContent);
    });
  });
  })();
  
  /******/ })()
  ;