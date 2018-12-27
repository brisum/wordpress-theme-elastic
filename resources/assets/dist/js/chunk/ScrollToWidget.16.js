webpackJsonp_name_([16],{

/***/ 61:
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

var ScrollToWidget = function (_Widget) {
  _inherits(ScrollToWidget, _Widget);

  function ScrollToWidget() {
    _classCallCheck(this, ScrollToWidget);

    return _possibleConstructorReturn(this, (ScrollToWidget.__proto__ || Object.getPrototypeOf(ScrollToWidget)).apply(this, arguments));
  }

  _createClass(ScrollToWidget, [{
    key: '_init',
    value: function _init() {
      _get(ScrollToWidget.prototype.__proto__ || Object.getPrototypeOf(ScrollToWidget.prototype), '_init', this).call(this);

      var self = this;

      self.$element.on('click', function () {
        var scrollTo = self.$element.attr('data-scroll-to'),
            $target = (0, _jquery2.default)(scrollTo);

        if (!$target.length) {
          return false;
        }

        var targetTop = $target.offset().top,
            path = Math.abs($target.offset().top - (0, _jquery2.default)(window).scrollTop()),
            speed = Math.min(700, path);

        (0, _jquery2.default)('html, body').animate({ scrollTop: targetTop - self.options.gap }, speed);
        return false;
      });
    }
  }]);

  return ScrollToWidget;
}(_libWidget2.default);

ScrollToWidget.defaults.gap = 20;

exports.default = ScrollToWidget;

/***/ })

});
//# sourceMappingURL=ScrollToWidget.16.js.map?7f37784d07f7789a975a