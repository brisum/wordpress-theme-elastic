webpackJsonp_name_([1],{

/***/ 26:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0), __webpack_require__(2), __webpack_require__(3), __webpack_require__(1), __webpack_require__(4)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($, Widget, SourceLoader, BundleLoader, RequireInit) {
    var SlickWidget = function (_Widget) {
        _inherits(SlickWidget, _Widget);

        function SlickWidget() {
            _classCallCheck(this, SlickWidget);

            return _possibleConstructorReturn(this, (SlickWidget.__proto__ || Object.getPrototypeOf(SlickWidget)).apply(this, arguments));
        }

        _createClass(SlickWidget, [{
            key: '_init',
            value: function _init() {
                _get(SlickWidget.prototype.__proto__ || Object.getPrototypeOf(SlickWidget.prototype), '_init', this).call(this);

                var self = this;

                SourceLoader.loadStylesheets([Theme.url.theme + '/resources/assets/dist/slick_style.css?' + Theme.THEME_VERSION]);
                BundleLoader.load([__webpack_require__(5)], function () {
                    var slickSettings = self.$element.data('slick') ? undefined : SlickWidget.defaults.slick;
                    self.$element.slick(slickSettings);
                });
            }
        }]);

        return SlickWidget;
    }(Widget);

    SlickWidget.defaults = {
        slick: {
            dots: false,
            infinite: false,
            arrows: false,
            draggable: true,
            speed: 300,
            autoplaySpeed: 6000,
            slidesToShow: 1,
            slidesToScroll: 1
        }
    };

    return SlickWidget;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ })

});
//# sourceMappingURL=slick.widget.1.js.map?255c8bd1634694765649