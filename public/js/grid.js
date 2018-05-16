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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(47);


/***/ }),

/***/ 47:
/***/ (function(module, exports) {

var prev_page_url;
var next_page_url;
var cardsContainer = $('.card-columns');
var showCards = function showCards(response) {

    cardsContainer.empty();

    $.each(response.data, function (i, user) {
        cardsContainer.append('<div class="card card-user text-white bg-info mb-3"><div class="card-header p-2 pl-3">' + user.position + '</div> <div class="card-body p-2 pl-3"><h5 class="card-subtitle my-1">' + user.name + '</h5><p class="card-text">salary: $' + user.salary + '<br>from ' + user.employment_date + '</p></div></div>');
    });

    if (response.prev_page_url === null) {
        $('#prev').removeClass('page-item').addClass('page-item disabled');
    } else {
        $('#prev').removeClass('page-item disabled').addClass('page-item');
    }

    if (response.next_page_url === null) {
        $('#next').removeClass('page-item').addClass('page-item disabled');
    } else {
        $('#next').removeClass('page-item disabled').addClass('page-item');
    }

    prev_page_url = response.prev_page_url;
    next_page_url = response.next_page_url;
};

$(function () {

    // Show cards with default sorting
    $.ajax({
        type: "GET",
        url: "ajax/users?sort=position&order=asc",
        success: showCards
    });

    // Show cards after changing sorting
    $('select').change(function () {
        var sort_params = $('option:selected').attr('value');
        $.ajax({
            type: "GET",
            url: "ajax/users?" + sort_params,
            success: showCards
        });
    });

    // Pagination next
    $('#next a').click(function () {
        var sort_params = $('option:selected').attr('value');
        $.ajax({
            type: "GET",
            url: next_page_url + "&" + sort_params,
            success: showCards
        });
    });

    // Pagination previous
    $('#prev a').click(function () {
        var sort_params = $('option:selected').attr('value');
        $.ajax({
            type: "GET",
            url: prev_page_url + "&" + sort_params,
            success: showCards
        });
    });

    // Search
    $('#search-input').click(function () {
        $(this).attr('placeholder', 'Enter position, name, salary or employment date');
    });

    $('#search-input').focusout(function () {
        $(this).attr('placeholder', 'Search...');
    });
});

/***/ })

/******/ });