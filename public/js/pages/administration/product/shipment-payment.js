/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/component/shipment-modal.js":
/*!**************************************************!*\
  !*** ./resources/js/component/shipment-modal.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   shipmentModal: () => (/* binding */ shipmentModal)
/* harmony export */ });


function shipmentModal(_ref) {
  var container = _ref.container,
    title = _ref.title,
    costData = _ref.costData,
    cartDetail = _ref.cartDetail,
    buyerDetail = _ref.buyerDetail;
  // get object from cost data
  var name = costData.name,
    costs = costData.costs;
  // shipping list fee
  var shippingEstimate = [];
  var shippingService = [];
  var shippingFeeList = [];
  // make a modal content
  var modalContent = '';
  modalContent += "\n    <div class=\"bg-transparent invisible w-full h-screen fixed bottom-0 left-0 transition-all\" id=\"modal-".concat(title, "\">\n      <div class=\"hidden w-full h-full z-10\" id=\"modal-overlay-").concat(title, "\"></div>\n      <div class=\"absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-[40rem] bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 pt-4 z-50 transition-transform duration-300\" id=\"modal-content-").concat(title, "\">\n          <div class=\"flex items-center px-6 gap-4\">\n              <a href=\"javascript:;\" class=\"text-[3rem] leading-none\" modal-dismiss=\"modal-close\">&times;</a>\n              <h2 class=\"text-[1.2rem] font-bold mt-[0.5rem]\">Pilih Pengiriman</h2>\n          </div>\n          <div class=\"modal-body-").concat(title, " h-100\">\n              <ul class=\"flex flex-col\">\n  ");

  // make the lists of costs
  costs.forEach(function (costList, index) {
    // get the data
    var cost = costList.cost,
      description = costList.description,
      service = costList.service;
    var _cost$ = cost[0],
      value = _cost$.value,
      etd = _cost$.etd,
      note = _cost$.note;

    // support variable
    var dayMonthYearETD = [];

    // split the etd
    var splitETD = etd.split('-');
    // manipulate the etd + today's date then returning back to arr
    var estimateArray = splitETD.map(function (etd, i) {
      // formatter
      var monthFormat = new Intl.DateTimeFormat('en-US', {
        month: 'short'
      });
      // estimate days
      var estimateDays = new Date(Date.now());

      // avoid "HARI" in string
      if (etd.toLowerCase().includes('hari')) {
        etd = etd.split(' ').at(0);
      }

      // increment the now day with etd day
      estimateDays.setDate(+etd + estimateDays.getDate());

      // split into date + month string format
      var date = estimateDays.getDate();
      var month = monthFormat.format(estimateDays);
      var year = estimateDays.getFullYear();
      var dateMonth = "".concat(date, " ").concat(month);
      var dateMonthYear = "".concat(date, " ").concat(month, " ").concat(year);
      dayMonthYearETD.push(dateMonthYear);
      return dateMonth;
    });

    // join them with '-'
    var estimateStringFormat = estimateArray.length > 1 ? estimateArray.join(' - ') : estimateArray.join('');

    // change the format into rupiah
    var valueRupiahFormat = "Rp. ".concat(value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
    modalContent += "\n      <li class=\"shipment-list flex items-center justify-between border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200\">\n          <a href=\"javascript:;\">\n              <span class=\"text-[1.2rem] font-bold\">".concat(service, " - ").concat(description, " (").concat(valueRupiahFormat, ")</span>\n              <p class=\"text-[#767676]\">Estimasi tiba ").concat(estimateStringFormat, "</p>\n              ").concat(note !== '' ? "<p class=\"text-[#767676]\">*note: ".concat(note, "</p>") : '', "\n          </a>\n      </li>\n    ");

    // push the value (shipping estimate time)
    shippingEstimate.push({
      row: index + 1,
      estimate_day: dayMonthYearETD
    });

    // push the value (shipping service)
    shippingService.push({
      row: index + 1,
      service: "".concat(service, " - ").concat(description)
    });

    // push the value (amount of shipping fee)
    shippingFeeList.push({
      row: index + 1,
      amount: value
    });
  });
  modalContent += "\n            </ul>\n          </div>\n      </div>\n    </div>\n  ";

  // check the current modal
  var currModal = document.getElementById("modal-".concat(title));

  // if not null then remove the old one
  if (currModal !== null) {
    currModal.remove();
  }

  // insert the element
  container.insertAdjacentHTML('afterend', modalContent);

  // after the modal is inserted, then return the data
  var shipmentData = [];
  var cartId = cartDetail.cartId,
    cartWeight = cartDetail.cartWeight;
  var buyerAddress = buyerDetail.buyerAddress;
  var splitCartId = cartId.split(',');
  splitCartId.forEach(function (id, index) {
    shipmentData.push({
      order_detail_id: id,
      shipping_name: name,
      shipping_number: null,
      shipping_address: buyerAddress,
      billing_address: buyerAddress,
      shipping_weight: cartWeight,
      shipping_fee: shippingFeeList,
      shipping_services: shippingService,
      shipping_estimate: shippingEstimate
    });
  });
  return shipmentData;
}

/***/ }),

/***/ "./resources/js/pages/administration/product/shipment-payment.js":
/*!***********************************************************************!*\
  !*** ./resources/js/pages/administration/product/shipment-payment.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {



function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
var _require = __webpack_require__(/*! ../../../component/shipment-modal */ "./resources/js/component/shipment-modal.js"),
  shipmentModal = _require.shipmentModal;
var _require2 = __webpack_require__(/*! ../../helper/popup */ "./resources/js/pages/helper/popup.js"),
  initModal = _require2.initModal,
  closeModal = _require2.closeModal;
window.addEventListener("load", function () {
  // list of elements
  var mainContainer = document.querySelector(".main-container");
  var courierEl = document.querySelectorAll(".courier");

  // get cart overview element
  var totalPriceEl = document.querySelector(".total-price").firstElementChild;
  var totalShipmentEl = document.querySelector(".total-shipment");
  var subTotalEl = document.querySelector(".sub-total");
  var payButton = document.getElementById("pay-button");
  var parentButton = payButton.closest("div");

  // class list for pay button and parent itself
  var removeCursorNotAllowed = ["cursor-not-allowed"];
  var addCursorPointer = ["cursor-pointer"];
  var removeDisableBtn = ["bg-gray-200", "pointer-events-none"];
  var addBackgroundBtn = ["bg-[#FFCC33]"];
  var lastCartShippingsData = [];
  var cartShippingsData = [];
  var shipmentCounter = 0;
  var lastShipmentFeeOrder = [];
  var totalShipmentFee = 0;
  function filteringShipment(filterDatas, indexDatas) {
    indexDatas = indexDatas.map(function (indexData) {
      return JSON.stringify(indexData);
    });
    var filteredData = filterDatas.map(function (filterData) {
      var compareData = indexDatas.indexOf(JSON.stringify(filterData));
      if (compareData === -1) return filterData;
    }).filter(function (filterData) {
      return filterData !== undefined;
    });
    return filteredData;
  }
  function checkCost(_x, _x2, _x3, _x4) {
    return _checkCost.apply(this, arguments);
  } // shipment selection
  function _checkCost() {
    _checkCost = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3(courierEl, originEl, destinationEl, weightEl) {
      var formData, _url, _token, response, textErr, textErrParse, _Object$entries$, keyErr, msgErr, error_message, error_detail;
      return _regeneratorRuntime().wrap(function _callee3$(_context4) {
        while (1) switch (_context4.prev = _context4.next) {
          case 0:
            // form data
            formData = new FormData(); // credentials
            _url = "/rajaongkir/cost";
            _token = document.getElementsByTagName("meta")[3].getAttribute("content"); // append the form
            formData.append("origin", originEl.value);
            formData.append("destination", destinationEl.value);
            formData.append("weight", weightEl.value);
            formData.append("courier", courierEl.value);

            // get the cost from rajaongkir
            _context4.prev = 7;
            _context4.next = 10;
            return fetch(_url, {
              method: "POST",
              mode: "cors",
              dataType: "JSON",
              cache: "no-cache",
              credentials: "same-origin",
              headers: {
                "X-CSRF-TOKEN": _token
              },
              body: formData
            });
          case 10:
            response = _context4.sent;
            if (response.ok) {
              _context4.next = 20;
              break;
            }
            _context4.next = 14;
            return response.text();
          case 14:
            textErr = _context4.sent;
            textErrParse = JSON.parse(textErr);
            _Object$entries$ = _slicedToArray(Object.entries(textErrParse)[0], 2), keyErr = _Object$entries$[0], msgErr = _Object$entries$[1];
            error_message = textErrParse[keyErr];
            error_detail = {
              status: response.status,
              message: error_message
            };
            throw new Error(JSON.stringify(error_detail));
          case 20:
            _context4.next = 22;
            return response.json();
          case 22:
            return _context4.abrupt("return", _context4.sent);
          case 25:
            _context4.prev = 25;
            _context4.t0 = _context4["catch"](7);
            throw _context4.t0;
          case 28:
          case "end":
            return _context4.stop();
        }
      }, _callee3, null, [[7, 25]]);
    }));
    return _checkCost.apply(this, arguments);
  }
  courierEl.forEach(function (courier, index) {
    courier.addEventListener("change", /*#__PURE__*/function () {
      var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(el) {
        var _shipmentContainer$cl, _shipmentContainer$cl2;
        var currEl, shipmentContainerEl, orderDetailIdEl, buyerAddressEl, shipmentContainer, originEl, destinationEl, weightEl, removeClass, addClass, tempAmount, selectShipmentText, _parentButton$classLi, _parentButton$classLi2, _payButton$classList, _payButton$classList2, totalShipmentFeeRupiah, _shipmentContainer$cl3, _shipmentContainer$cl4, shipmentTitle, _yield$checkCost, _yield$checkCost2, getCost, _removeClass, _addClass, shipmentModalData, modalEL, modalOverlay, modalContent, modalBodyEl, shipmentListParentEl, _iterator, _step, _loop;
        return _regeneratorRuntime().wrap(function _callee$(_context2) {
          while (1) switch (_context2.prev = _context2.next) {
            case 0:
              // current element
              currEl = el.target; // get sibling parent of courier element
              shipmentContainerEl = currEl.closest("div.courier-selection").nextElementSibling; // all element siblings
              orderDetailIdEl = currEl.closest("div").querySelector("#order_detail_list");
              buyerAddressEl = currEl.closest("div").querySelector("#buyer_address");
              shipmentContainer = currEl.closest("div").nextElementSibling;
              originEl = currEl.closest("div").querySelector("#city_seller");
              destinationEl = currEl.closest("div").querySelector("#city_buyer");
              weightEl = currEl.closest("div").querySelector("#total_weight"); // remove and add class for container can be clickable
              removeClass = ["cursor-pointer"];
              addClass = ["pointer-events-none", "bg-gray-200"]; // variable support
              tempAmount = 0;
              (_shipmentContainer$cl = shipmentContainer.classList).remove.apply(_shipmentContainer$cl, removeClass);
              (_shipmentContainer$cl2 = shipmentContainer.classList).add.apply(_shipmentContainer$cl2, addClass);

              // default behavior for shipmentContainerEl after courier do selection
              selectShipmentText = "<span class=\"font-bold text-[1.2rem]\">Pilih Pengiriman</span>"; // doing only when the element is already changed
              if (shipmentContainerEl.firstElementChild.nodeName !== "SPAN") {
                // remove the first child element
                shipmentContainerEl.removeChild(shipmentContainerEl.firstElementChild);
                // insert to first child element with new element
                shipmentContainerEl.insertAdjacentHTML("afterbegin", selectShipmentText);

                // reduce when the element is changed
                shipmentCounter -= 1;

                // filtering shipment by cart shippings data but per indexing element value
                cartShippingsData = filteringShipment(cartShippingsData, lastCartShippingsData[index]);

                // totaling all lastShipmentFeeOrder values
                totalShipmentFee = lastShipmentFeeOrder.length > 0 ? lastShipmentFeeOrder.reduce(function (acc, fee) {
                  return acc + fee;
                }, 0) : 0;

                // change the format into rupiah
                totalShipmentFeeRupiah = "".concat(totalShipmentFee > 0 ? "Rp. ".concat(totalShipmentFee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")) : "-"); // replace the text content last element child of total shipment
                totalShipmentEl.lastElementChild.textContent = totalShipmentFeeRupiah;

                // change the class of the parent element of button
                (_parentButton$classLi = parentButton.classList).add.apply(_parentButton$classLi, removeCursorNotAllowed);
                (_parentButton$classLi2 = parentButton.classList).remove.apply(_parentButton$classLi2, addCursorPointer);

                // change the class of the button itself
                (_payButton$classList = payButton.classList).add.apply(_payButton$classList, removeDisableBtn);
                (_payButton$classList2 = payButton.classList).remove.apply(_payButton$classList2, addBackgroundBtn);
              }
              _context2.prev = 15;
              // disabled select element
              currEl.disabled = true;
              shipmentTitle = "shipment-".concat(index + 1);
              _context2.next = 20;
              return checkCost(currEl, originEl, destinationEl, weightEl);
            case 20:
              _yield$checkCost = _context2.sent;
              _yield$checkCost2 = _slicedToArray(_yield$checkCost, 1);
              getCost = _yield$checkCost2[0];
              // enable the select shipment element
              _removeClass = ["pointer-events-none", "bg-gray-200"];
              _addClass = ["cursor-pointer"];
              (_shipmentContainer$cl3 = shipmentContainer.classList).remove.apply(_shipmentContainer$cl3, _removeClass);
              (_shipmentContainer$cl4 = shipmentContainer.classList).add.apply(_shipmentContainer$cl4, _addClass);

              // modal shipment start
              shipmentModalData = shipmentModal({
                container: mainContainer,
                title: shipmentTitle,
                costData: getCost,
                cartDetail: {
                  cartId: orderDetailIdEl.value,
                  cartWeight: weightEl.value
                },
                buyerDetail: {
                  buyerAddress: buyerAddressEl.value
                }
              }); // init modal
              modalEL = document.getElementById("modal-".concat(shipmentTitle));
              modalOverlay = document.getElementById("modal-overlay-".concat(shipmentTitle));
              modalContent = document.getElementById("modal-content-".concat(shipmentTitle));
              initModal(shipmentContainer, modalEL, modalOverlay, modalContent);

              // start to selecting shipment
              modalBodyEl = document.querySelector(".modal-body-shipment-".concat(index + 1));
              shipmentListParentEl = modalBodyEl.children;
              _iterator = _createForOfIteratorHelper(shipmentListParentEl);
              _context2.prev = 35;
              _loop = /*#__PURE__*/_regeneratorRuntime().mark(function _loop() {
                var element;
                return _regeneratorRuntime().wrap(function _loop$(_context) {
                  while (1) switch (_context.prev = _context.next) {
                    case 0:
                      element = _step.value;
                      element.addEventListener("click", function (e) {
                        var _cartShippingsData;
                        // only get the LI element wherever the click is place on
                        var clickedLIEl = e.target.closest("li");
                        var rowNumberLI = Array.from(element.children).indexOf(clickedLIEl) + 1;
                        // is not selected row
                        var newArrChildren = Array.from(element.children);
                        // splice it
                        newArrChildren.splice(rowNumberLI - 1, 1);

                        // create a deep copy of shipmentModalData
                        var deepCopyOfShipmentModalData = JSON.parse(JSON.stringify(shipmentModalData));
                        var isChangeShipment = false;

                        // always reduce the total shipment fee with temp amount
                        // totalShipmentFee -= tempAmount;

                        // doing some filtering method
                        var filteringSelectedData = deepCopyOfShipmentModalData.map(function (data) {
                          // shipping estimate filter
                          data.shipping_estimate = data.shipping_estimate.filter(function (shipping_estimate) {
                            return shipping_estimate.row === rowNumberLI;
                          });

                          // shipping fee filter
                          data.shipping_fee = data.shipping_fee.filter(function (shipping_fee) {
                            return shipping_fee.row === rowNumberLI;
                          });

                          // shipping services filter
                          data.shipping_services = data.shipping_services.filter(function (shipping_service) {
                            return shipping_service.row === rowNumberLI;
                          });

                          // return data
                          return data;
                        });

                        // change the shipment container content to be selected shipment detail
                        // declare all data
                        var _filteringSelectedDat = filteringSelectedData[0],
                          shipping_estimate = _filteringSelectedDat.shipping_estimate,
                          shipping_fee = _filteringSelectedDat.shipping_fee,
                          shipping_services = _filteringSelectedDat.shipping_services;
                        var estimate_day = shipping_estimate[0].estimate_day;
                        var amount = shipping_fee[0].amount;
                        var service = shipping_services[0].service;
                        var lastFilteredData = [];

                        // insert the checklist element for giving the mark the element is selected
                        var markEl = "\n              <img src=\"../../assets/icons/check.png\" alt=\"checklist\" class=\"checklist-green w-[2.5rem] h-[2.5rem]\">\n            ";

                        // validate just only one selected element
                        if (clickedLIEl.lastElementChild.nodeName === "A") {
                          clickedLIEl.insertAdjacentHTML("beforeend", markEl);

                          // insert to tempAmount
                          tempAmount = amount;

                          // increase the value of shipment counter
                          shipmentCounter += 1;
                        }

                        // remove the mark if the element is not selected
                        newArrChildren.forEach(function (child, index) {
                          if (child.lastElementChild.nodeName === "IMG") {
                            child.removeChild(child.lastElementChild);
                            var _rowNumberLI = Array.from(element.children).indexOf(child) + 1;
                            shipmentCounter -= 1;
                            isChangeShipment = true;
                            var _deepCopyOfShipmentModalData = JSON.parse(JSON.stringify(shipmentModalData));
                            var lastData = _deepCopyOfShipmentModalData.map(function (data) {
                              // shipping estimate filter
                              data.shipping_estimate = data.shipping_estimate.filter(function (shipping_estimate) {
                                return shipping_estimate.row === _rowNumberLI;
                              });

                              // shipping fee filter
                              data.shipping_fee = data.shipping_fee.filter(function (shipping_fee) {
                                return shipping_fee.row === _rowNumberLI;
                              });

                              // shipping services filter
                              data.shipping_services = data.shipping_services.filter(function (shipping_service) {
                                return shipping_service.row === _rowNumberLI;
                              });

                              // return data
                              return data;
                            });
                            lastFilteredData = lastData;
                          }
                        });

                        // change the format from array to string
                        var estimateDayString = estimate_day.map(function (day) {
                          return day.split(" ").slice(0, 2).join(" ");
                        }).join(" - ");

                        // change the format into rupiah
                        var valueRupiahFormat = "Rp. ".concat(amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                        // selected shipment content element
                        var selectedShipmentEl = "\n              <div class=\"flex flex-col gap-1\">\n                  <span class=\"text-[1.2rem] font-bold\">".concat(service, " (").concat(valueRupiahFormat, ")</span>\n                  <p class=\"text-[#767676]\">Estimasi tiba ").concat(estimateDayString, "</p>\n              </div>\n            ");

                        // remove the first child element
                        shipmentContainerEl.removeChild(shipmentContainerEl.firstElementChild);

                        // insert to first child element with new element
                        shipmentContainerEl.insertAdjacentHTML("afterbegin", selectedShipmentEl);

                        // modal close
                        closeModal(modalEL, modalOverlay, modalContent);

                        // always removing before insert
                        lastShipmentFeeOrder.splice(index, 1);
                        lastCartShippingsData.splice(index, 1);

                        // inserting by index
                        lastShipmentFeeOrder.splice(index, 0, tempAmount);
                        lastCartShippingsData.splice(index, 0, filteringSelectedData);

                        // push the data to cart shippings data
                        (_cartShippingsData = cartShippingsData).push.apply(_cartShippingsData, _toConsumableArray(filteringSelectedData));

                        // only filter when last filtered data is more than one
                        if (lastFilteredData.length !== 0) {
                          // filtering the shipment
                          cartShippingsData = filteringShipment(cartShippingsData, lastFilteredData);
                        }

                        // totaling all lastShipmentFeeOrder values
                        totalShipmentFee = lastShipmentFeeOrder.length > 0 ? lastShipmentFeeOrder.reduce(function (acc, fee) {
                          return acc + fee;
                        }, 0) : 0;

                        // get grand total
                        var cartGrandTotal = parseInt(totalPriceEl.value) + parseInt(totalShipmentFee);

                        // change the format into rupiah
                        var totalShipmentFeeRupiah = "Rp. ".concat(totalShipmentFee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                        var cartGrandTotalRupiah = "Rp. ".concat(cartGrandTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                        // replace the text content last element child of total shipment
                        totalShipmentEl.lastElementChild.textContent = totalShipmentFeeRupiah;

                        // replace the text content of 'total tagihan'
                        subTotalEl.lastElementChild.textContent = cartGrandTotalRupiah;

                        // element of button and parent of button
                        var canPay = courierEl.length === shipmentCounter;

                        // if can pay is true
                        if (canPay) {
                          var _parentButton$classLi3, _parentButton$classLi4, _payButton$classList3, _payButton$classList4;
                          // change the class of the parent element of button
                          (_parentButton$classLi3 = parentButton.classList).remove.apply(_parentButton$classLi3, removeCursorNotAllowed);
                          (_parentButton$classLi4 = parentButton.classList).add.apply(_parentButton$classLi4, addCursorPointer);

                          // change the class of the button itself
                          (_payButton$classList3 = payButton.classList).remove.apply(_payButton$classList3, removeDisableBtn);
                          (_payButton$classList4 = payButton.classList).add.apply(_payButton$classList4, addBackgroundBtn);
                        }
                      });
                    case 2:
                    case "end":
                      return _context.stop();
                  }
                }, _loop);
              });
              _iterator.s();
            case 38:
              if ((_step = _iterator.n()).done) {
                _context2.next = 42;
                break;
              }
              return _context2.delegateYield(_loop(), "t0", 40);
            case 40:
              _context2.next = 38;
              break;
            case 42:
              _context2.next = 47;
              break;
            case 44:
              _context2.prev = 44;
              _context2.t1 = _context2["catch"](35);
              _iterator.e(_context2.t1);
            case 47:
              _context2.prev = 47;
              _iterator.f();
              return _context2.finish(47);
            case 50:
              _context2.next = 55;
              break;
            case 52:
              _context2.prev = 52;
              _context2.t2 = _context2["catch"](15);
              console.error(_context2.t2);
            case 55:
              _context2.prev = 55;
              // enable select element
              currEl.disabled = false;
              return _context2.finish(55);
            case 58:
            case "end":
              return _context2.stop();
          }
        }, _callee, null, [[15, 52, 55, 58], [35, 44, 47, 50]]);
      }));
      return function (_x5) {
        return _ref.apply(this, arguments);
      };
    }());
  });
  payButton.addEventListener("click", /*#__PURE__*/function () {
    var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2(e) {
      var _parentButton$classLi5, _parentButton$classLi6, _payButton$classList5, _payButton$classList6;
      var formData, currEl, dataOrder, cartGrandTotal, cartShippingsDataAsc;
      return _regeneratorRuntime().wrap(function _callee2$(_context3) {
        while (1) switch (_context3.prev = _context3.next) {
          case 0:
            // form data
            formData = new FormData(); // element itself and element target
            currEl = e.target;
            dataOrder = currEl.dataset.order;
            cartGrandTotal = parseInt(totalPriceEl.value) + parseInt(totalShipmentFee); // credentials
            // const _url = `/administration/cart/create_snaptoken`;
            // const _token = document
            //   .getElementsByTagName("meta")[3]
            //   .getAttribute("content");
            // ordering by order detail id for cart shippings data
            cartShippingsDataAsc = cartShippingsData.sort(function (a, b) {
              return a.order_detail_id - b.order_detail_id;
            }); // append the form
            formData.append("data_order", dataOrder);
            formData.append("grand_total", cartGrandTotal);
            formData.append("shipping_fees", lastShipmentFeeOrder);
            formData.append("shipping_data", JSON.stringify(cartShippingsDataAsc));

            // disabled the button while doing process
            // change the class of the parent element of button
            (_parentButton$classLi5 = parentButton.classList).add.apply(_parentButton$classLi5, removeCursorNotAllowed);
            (_parentButton$classLi6 = parentButton.classList).remove.apply(_parentButton$classLi6, addCursorPointer);

            // change the class of the button itself
            (_payButton$classList5 = payButton.classList).add.apply(_payButton$classList5, removeDisableBtn);
            (_payButton$classList6 = payButton.classList).remove.apply(_payButton$classList6, addBackgroundBtn);
            window.location.href = "/transaction/transaction-list";
            // try {
            //   // touch API
            //   const response = await fetch(_url, {
            //     method: "POST",
            //     mode: "cors",
            //     dataType: "JSON",
            //     cache: "no-cache",
            //     credentials: "same-origin",
            //     headers: {
            //       "X-CSRF-TOKEN": _token,
            //     },
            //     body: formData,
            //   });

            //   // parse JSON response into native js object
            //   if (!response.ok) {
            //     const textErr = await response.text();
            //     const textErrParse = JSON.parse(textErr);
            //     const [keyErr, msgErr] = Object.entries(textErrParse)[0];
            //     const error_message = textErrParse[keyErr];
            //     const error_detail = {
            //       status: response.status,
            //       message: error_message,
            //     };
            //     throw new Error(JSON.stringify(error_detail));
            //   }

            //   const { snap_token, order_id } = await response.json();

            //   // there token is exist
            //   if (snap_token) {
            //     // call snap pay midtrans
            //     snap.pay(snap_token, {
            //       onSuccess: async function (result) {
            //         const { payment_type, status_code, va_numbers } = result;
            //         const { bank } = va_numbers[0];

            //         // update the order when payment was succeed
            //         const urlUpdateSuccess = `/administration/cart/success-payment/${order_id}`;

            //         if (parseInt(status_code) === 200) {
            //           // form update
            //           let formUpdate = new FormData();

            //           // append it
            //           formUpdate.append("payment_type", `${bank}_${payment_type}`);
            //           // set _method url in form data
            //           formUpdate.append("_method", "PUT");

            //           // update the order
            //           const responseUpdate = await fetch(urlUpdateSuccess, {
            //             method: "POST",
            //             mode: "cors",
            //             dataType: "JSON",
            //             cache: "no-cache",
            //             credentials: "same-origin",
            //             headers: {
            //               "X-CSRF-TOKEN": _token,
            //             },
            //             body: formUpdate,
            //           });

            //           // using it later
            //           const { success_payment } = await responseUpdate.json();

            //           // redirect to transaction list
            //           window.location.href = "/transaction/transaction-list";
            //         }
            //       },
            //     });
            //   } else {
            //     throw new Error(
            //       "failed to genereate the token, please call the developer or try again!"
            //     );
            //   }
            // } catch (error) {
            //   console.error(error);
            // } finally {
            //   // make the button enable again
            //   // change the class of the parent element of button
            //   parentButton.classList.remove(...removeCursorNotAllowed);
            //   parentButton.classList.add(...addCursorPointer);

            //   // change the class of the button itself
            //   payButton.classList.remove(...removeDisableBtn);
            //   payButton.classList.add(...addBackgroundBtn);
            // }
          case 14:
          case "end":
            return _context3.stop();
        }
      }, _callee2);
    }));
    return function (_x6) {
      return _ref2.apply(this, arguments);
    };
  }());
});

/***/ }),

/***/ "./resources/js/pages/helper/popup.js":
/*!********************************************!*\
  !*** ./resources/js/pages/helper/popup.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   closeModal: () => (/* binding */ closeModal),
/* harmony export */   initModal: () => (/* binding */ initModal),
/* harmony export */   openModal: () => (/* binding */ openModal)
/* harmony export */ });


// visible class
var modalVisibleClass = 'bg-black/80 w-full h-screen fixed bottom-0 left-0';
var modalOverlayVisibleClass = 'absolute w-full h-full z-10';
var modalContentVisibleClass = 'absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-0 bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 py-4 z-50 transition-transform duration-300';
// invisible class
var modalInvisibleClass = 'bg-transparent invisible w-full h-screen fixed bottom-0 left-0 transition-all';
var modalOverlayInvisibleClass = 'hidden w-full h-full z-10';
var modalContentInvisibleClass = 'absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-[40rem] bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 pt-4 z-50 transition-transform duration-300';
function openModal(modal, modalOverlay, modalContent) {
  // remove class
  modalInvisibleClass.split(' ').forEach(function (cls) {
    return modal.classList.remove(cls);
  });
  modalOverlayInvisibleClass.split(' ').forEach(function (cls) {
    return modalOverlay.classList.remove(cls);
  });
  modalContentInvisibleClass.split(' ').forEach(function (cls) {
    return modalContent.classList.remove(cls);
  });

  // add class
  modalVisibleClass.split(' ').forEach(function (cls) {
    return modal.classList.add(cls);
  });
  modalOverlayVisibleClass.split(' ').forEach(function (cls) {
    return modalOverlay.classList.add(cls);
  });
  modalContentVisibleClass.split(' ').forEach(function (cls) {
    return modalContent.classList.add(cls);
  });
}
function closeModal(modal, modalOverlay, modalContent) {
  // remove class
  modalVisibleClass.split(' ').forEach(function (cls) {
    return modal.classList.remove(cls);
  });
  modalOverlayVisibleClass.split(' ').forEach(function (cls) {
    return modalOverlay.classList.remove(cls);
  });
  modalContentVisibleClass.split(' ').forEach(function (cls) {
    return modalContent.classList.remove(cls);
  });

  // add class
  modalInvisibleClass.split(' ').forEach(function (cls) {
    return modal.classList.add(cls);
  });
  modalOverlayInvisibleClass.split(' ').forEach(function (cls) {
    return modalOverlay.classList.add(cls);
  });
  modalContentInvisibleClass.split(' ').forEach(function (cls) {
    return modalContent.classList.add(cls);
  });
}
function initModal(element, modal, modalOverlay, modalContent) {
  // elements modal
  var modalDismiss = document.querySelector('[modal-dismiss="modal-close"]');

  // do open modal
  element.addEventListener('click', function () {
    openModal(modal, modalOverlay, modalContent);
  });
  modalOverlay.addEventListener('click', function () {
    closeModal(modal, modalOverlay, modalContent);
  });
  modalDismiss.addEventListener('click', function () {
    closeModal(modal, modalOverlay, modalContent);
  });
}

/***/ }),

/***/ "./resources/sass/styles.scss":
/*!************************************!*\
  !*** ./resources/sass/styles.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/pages/administration/product/shipment-payment": 0,
/******/ 			"css/app": 0,
/******/ 			"css/styles": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkrfl"] = self["webpackChunkrfl"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app","css/styles"], () => (__webpack_require__("./resources/js/pages/administration/product/shipment-payment.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/styles"], () => (__webpack_require__("./resources/sass/styles.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app","css/styles"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;