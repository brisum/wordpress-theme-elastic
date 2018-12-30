webpackJsonp_name_([18],{

/***/ 64:
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

var RatingWidget = function (_Widget) {
  _inherits(RatingWidget, _Widget);

  function RatingWidget() {
    _classCallCheck(this, RatingWidget);

    return _possibleConstructorReturn(this, (RatingWidget.__proto__ || Object.getPrototypeOf(RatingWidget)).apply(this, arguments));
  }

  _createClass(RatingWidget, [{
    key: '_init',
    value: function _init() {
      _get(RatingWidget.prototype.__proto__ || Object.getPrototypeOf(RatingWidget.prototype), '_init', this).call(this);

      var self = this,
          $infoFrom = self.$element.find('.rating-value-info .from');

      self.$element.on('click', 'input', function () {
        var val = (0, _jquery2.default)(this).val();

        self.$element.attr('data-value', val);
        $infoFrom.html(val);
      });

      self.$element.on('mouseover', 'label', function () {
        var val = (0, _jquery2.default)(this).find('input').val();

        self.$element.attr('data-hover', val);
        $infoFrom.html(val);
      });

      self.$element.on('mouseout', 'label', function () {
        self.$element.attr('data-hover', 0);
        $infoFrom.html(self.$element.attr('data-value'));
      });
    }
  }]);

  return RatingWidget;
}(_libWidget2.default);

exports.default = RatingWidget;

/***/ })

});
//# sourceMappingURL=RatingWidget.18.js.map?e60892c3086f8e638abd