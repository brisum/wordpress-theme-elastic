webpackJsonp_name_([8],{

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0), __webpack_require__(2), __webpack_require__(4), __webpack_require__(1), __webpack_require__(3), __webpack_require__(57)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($, Widget, SourceLoader, BundleLoader, RequireInit, ViewedProducts) {
    var ViewedProductsWidget = function (_Widget) {
        _inherits(ViewedProductsWidget, _Widget);

        function ViewedProductsWidget() {
            _classCallCheck(this, ViewedProductsWidget);

            return _possibleConstructorReturn(this, (ViewedProductsWidget.__proto__ || Object.getPrototypeOf(ViewedProductsWidget)).apply(this, arguments));
        }

        _createClass(ViewedProductsWidget, [{
            key: '_init',
            value: function _init() {
                var self = this,
                    productId = parseInt(self.$element.attr('data-product')),
                    viewedProducts = new ViewedProducts(),
                    viewedProductIds = viewedProducts.get();

                if (viewedProductIds.length) {
                    SourceLoader.loadStylesheets([Theme.url.theme + '/resources/assets/dist/slick_style.css?' + Theme.THEME_VERSION]);
                    BundleLoader.load([__webpack_require__(5)], function () {
                        $.ajax({
                            type: 'get',
                            url: '/?post_type=product&tpl-part=template-parts/product/viewed-products',
                            data: { 'post__in': viewedProductIds.join(',') },
                            success: function success(response) {
                                self.$element.html(response);
                                self.$element.removeClass('d-none');

                                new RequireInit(self.$element);
                            }
                        });
                    });
                }
                if (productId) {
                    viewedProducts.add(productId);
                }
            }
        }]);

        return ViewedProductsWidget;
    }(Widget);

    return ViewedProductsWidget;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ }),

/***/ 57:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ViewedProducts = function () {
    function ViewedProducts() {
        _classCallCheck(this, ViewedProducts);

        this.maxViewedProducts = 30;
    }

    _createClass(ViewedProducts, [{
        key: 'add',
        value: function add(productId) {
            var self = this,
                viewedProducts = self.get();

            if (-1 !== $.inArray(productId, viewedProducts)) {
                var productIdIndex = viewedProducts.indexOf(productId);
                viewedProducts[productIdIndex] = 0;
            }
            viewedProducts = viewedProducts.filter(function (value) {
                return 0 < value;
            });
            viewedProducts = viewedProducts.slice(0, self.maxViewedProducts - 1);

            viewedProducts.unshift(productId);
            $.cookie('viewed-product', viewedProducts.join(','), { expires: 7, path: '/' });
        }
    }, {
        key: 'get',
        value: function get() {
            var viewedProducts = $.cookie('viewed-product');

            viewedProducts = viewedProducts ? viewedProducts.split(',') : [];
            $.each(viewedProducts, function (i, val) {
                viewedProducts[i] = parseInt(val);
            });
            viewedProducts = $.unique(viewedProducts);
            viewedProducts = viewedProducts.filter(function (value) {
                return 0 < value;
            });
            viewedProducts = viewedProducts.slice(0, self.maxViewedProducts);

            return viewedProducts;
        }
    }]);

    return ViewedProducts;
}();

module.exports = ViewedProducts;

/***/ })

});
//# sourceMappingURL=viewed-products.widget.8.js.map?87e327816a2d9c46d2ae