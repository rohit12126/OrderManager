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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/orders.js":
/*!**************************************!*\
  !*** ./resources/js/pages/orders.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  initDatatable({
    order: [[3, "desc"]],
    ajax: {
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: $('.datatable').data('url'),
      method: 'POST',
      data: function data(d) {
        return $.extend({}, d, {
          "orderBy": $('select[name="order"]').val()
        });
      }
    },
    columns: [{
      data: 'name',
      orderable: false,
      name: 'customer.name'
    }, {
      data: 'total_amount',
      orderable: false,
      searchable: false
    }, {
      data: 'status',
      orderable: false,
      searchable: false
    }, {
      data: 'created_at',
      visible: false,
      searchable: false
    }, {
      data: 'customer',
      visible: false,
      orderable: false,
      searchable: false,
      name: 'customer.id'
    }, {
      data: 'id',
      visible: false,
      orderable: false,
      searchable: false
    }]
  });
  initOrderByFilter();
  orderDetails();
});

var initOrderByFilter = function initOrderByFilter() {
  $('.dataTables_filter').addClass('float-left');
  $('.dataTables_filter').parent().removeClass('col-md-6').addClass('col-md-12');
  var arr = [{
    val: "",
    text: 'Order Date'
  }, {
    val: 'latest',
    text: 'Recent Orders',
    selected: true
  }, {
    val: 'oldest',
    text: 'Oldest Orders'
  }];
  var in_stock_field = $('<select/>', {
    "class": 'custom-select',
    name: 'order'
  });
  $(arr).each(function () {
    var optionH = $("<option>").attr('value', this.val).text(this.text);
    if (typeof this.selected != 'undefined' && this.selected) optionH.attr('selected', 'selected');
    in_stock_field.append(optionH);
  });
  var label = $('<label />', {
    "class": 'ml-4'
  }).html('Order By: ').append(in_stock_field);
  $('.dataTables_filter').append(label);
  $(document).on('change', 'select[name="order"]', function () {
    dbtable.draw();
  });
};

var orderDetails = function orderDetails() {
  $('.datatable tbody').on('click', 'tr', function () {
    var data = dbtable.row(this).data();
    window.open('/order/' + data.id + '/items');
  });
};

/***/ }),

/***/ 3:
/*!********************************************!*\
  !*** multi ./resources/js/pages/orders.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/OrderManager/resources/js/pages/orders.js */"./resources/js/pages/orders.js");


/***/ })

/******/ });