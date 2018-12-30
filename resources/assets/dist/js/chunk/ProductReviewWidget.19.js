webpackJsonp_name_([19],{

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

var _jquery = __webpack_require__(0);

var _jquery2 = _interopRequireDefault(_jquery);

var _libWidget = __webpack_require__(2);

var _libWidget2 = _interopRequireDefault(_libWidget);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ProductReviewWidget = function (_Widget) {
    _inherits(ProductReviewWidget, _Widget);

    function ProductReviewWidget() {
        _classCallCheck(this, ProductReviewWidget);

        return _possibleConstructorReturn(this, (ProductReviewWidget.__proto__ || Object.getPrototypeOf(ProductReviewWidget)).apply(this, arguments));
    }

    _createClass(ProductReviewWidget, [{
        key: '_init',
        value: function _init() {
            _get(ProductReviewWidget.prototype.__proto__ || Object.getPrototypeOf(ProductReviewWidget.prototype), '_init', this).call(this);

            var self = this,
                productId = self.$element.attr('data-product-id'),
                $review = (0, _jquery2.default)('#review');

            $review.load('index.php?route=product/product/review&product_id=' + productId);
            $review.on('click', '.pagination a', function () {
                $review.fadeOut('slow');
                $review.load(this.href);
                $review.fadeIn('slow');

                return false;
            });

            (0, _jquery2.default)('#button-review').on('click', function () {
                _jquery2.default.ajax({
                    url: 'index.php?route=product/product/write&product_id=' + productId,
                    type: 'post',
                    dataType: 'json',
                    data: 'name=' + encodeURIComponent((0, _jquery2.default)('input[name=\'name\']').val()) + '&text=' + encodeURIComponent((0, _jquery2.default)('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent((0, _jquery2.default)('input[name=\'rating\']:checked').val() ? (0, _jquery2.default)('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent((0, _jquery2.default)('input[name=\'captcha\']').val()),
                    beforeSend: function beforeSend() {
                        (0, _jquery2.default)('.success, .warning').remove();
                        (0, _jquery2.default)('#button-review').attr('disabled', true);
                        (0, _jquery2.default)('#button-review').before('<div class="attention"><img src="catalog/view/theme/hyla/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
                    },
                    complete: function complete() {
                        (0, _jquery2.default)('#button-review').attr('disabled', false);
                        (0, _jquery2.default)('.attention').remove();
                    },
                    success: function success(data) {
                        if (data['error']) {
                            (0, _jquery2.default)('#button-review').before('<div class="warning">' + data['error'] + '</div>');
                        }

                        if (data['success']) {
                            (0, _jquery2.default)('#button-review').before('<div class="success">' + data['success'] + '</div>');

                            (0, _jquery2.default)('input[name=\'name\']').val('');
                            (0, _jquery2.default)('textarea[name=\'text\']').val('');
                            (0, _jquery2.default)('input[name=\'rating\']:checked').attr('checked', '');
                            (0, _jquery2.default)('input[name=\'captcha\']').val('');
                        }
                    }
                });
            });
        }
    }]);

    return ProductReviewWidget;
}(_libWidget2.default);

exports.default = ProductReviewWidget;

/***/ })

});
//# sourceMappingURL=ProductReviewWidget.19.js.map?378323dc377b830d20b6