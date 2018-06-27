webpackJsonp_name_([16],{

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0), __webpack_require__(2), __webpack_require__(1)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($, Widget, BundleLoader) {
    var CheckoutOneClickWidget = function (_Widget) {
        _inherits(CheckoutOneClickWidget, _Widget);

        function CheckoutOneClickWidget($element, options) {
            _classCallCheck(this, CheckoutOneClickWidget);

            return _possibleConstructorReturn(this, (CheckoutOneClickWidget.__proto__ || Object.getPrototypeOf(CheckoutOneClickWidget)).call(this, $element, options));
        }

        _createClass(CheckoutOneClickWidget, [{
            key: '_init',
            value: function _init() {
                _get(CheckoutOneClickWidget.prototype.__proto__ || Object.getPrototypeOf(CheckoutOneClickWidget.prototype), '_init', this).call(this);

                var self = this;

                $('body').on('found_variation', 'form.cart.variations_form', function (event, variation) {
                    self.$element.val(variation.id);
                });

                $('body').on('reset_data', 'form.cart.variations_form', function (event, args) {
                    var productId = $(this).find('input[name="product_id"]').val();
                    self.$element.val(productId);
                });

                BundleLoader.load([__webpack_require__(7)], function (Popup) {
                    self.$element.on('click', function () {
                        var $form = self.$element.closest('form.cart.variations_form'),
                            $variationId = $form.find('.variations_button .variation_id');
                        if (0 !== $variationId.length && '' === $variationId.val()) {
                            self.$element.attr('title', 'Выберите опции').tooltip({ placement: 'top', trigger: 'manual' }).tooltip('show');

                            setTimeout(function () {
                                self.$element.tooltip('hide');
                            }, 2000);
                            self.$element.one('hidden.bs.tooltip', function () {
                                self.$element.removeAttr('title');
                            });
                            return false;
                        }

                        var productId = self.$element.val(),
                            paymentMethod = self.$element.attr('data-payment-method'),
                            paymentType = self.$element.attr('data-payment-type'),
                            paymentTerm = self.$element.attr('data-payment-term'),
                            popup = new Popup(),
                            $context = popup.getContext();

                        popup.loading(true);
                        popup.name('checkout-one-click');
                        popup.show();
                        $.ajax({
                            type: 'post',
                            url: Theme.url.adminAjax,
                            data: {
                                action: 'checkout-one-click'
                            },
                            success: function success(response) {
                                popup.content(response);
                                $context.find('input[name="checkout1click[product_id]"]').val(productId);
                                $context.find('input[name="checkout1click[payment_method]"]').val(paymentMethod);
                                $context.find('input[name="checkout1click[payment_type]"]').val(paymentType);
                                $context.find('input[name="checkout1click[payment_term]"]').val(paymentTerm);
                                $context.find('input[name="checkout1click[page_request]"]').val(location.href);

                                new Brisum.AstuteForm($context.find('#checkout-one-click'), {
                                    afterSend: function afterSend() {
                                        $context.find('#checkout-one-click input[name="checkout1click[page_request]"]').val(location.href);
                                    }
                                });

                                popup.loading(false);
                            }
                        });

                        return false;
                    });
                });
            }
        }]);

        return CheckoutOneClickWidget;
    }(Widget);

    return CheckoutOneClickWidget;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ })

});
//# sourceMappingURL=checkout-one-click.widget.16.js.map?2b05184e60ef968890f6