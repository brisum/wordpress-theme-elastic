webpackJsonp_name_([7,15],{

/***/ 40:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var PopupBootstrap = function () {
    function PopupBootstrap($element) {
        _classCallCheck(this, PopupBootstrap);

        var self = this;

        self.$element = $element;

        if (self.$element.data('bs.modal')) {
            return;
        }

        self.$element.modal({
            show: false
        });

        self.$element.on('hidden.bs.modal', function () {
            self.loading(false);
            self.name('');
            self.content('');
        });
    }

    _createClass(PopupBootstrap, [{
        key: 'getContext',
        value: function getContext() {
            return this.$element.find('.modal-content .modal-body');
        }
    }, {
        key: 'loading',
        value: function loading(isLoading) {
            if (isLoading) {
                this.$element.addClass('loading');
            } else {
                this.$element.removeClass('loading');
            }
        }
    }, {
        key: 'show',
        value: function show() {
            this.$element.modal('show');
        }
    }, {
        key: 'hide',
        value: function hide() {
            this.$element.modal('hide');
        }
    }, {
        key: 'name',
        value: function name(_name) {
            this.$element.attr('data-name', _name);
        }
    }, {
        key: 'content',
        value: function content(_content) {
            this.getContext().html(_content);
        }
    }]);

    return PopupBootstrap;
}();

module.exports = PopupBootstrap;

/***/ }),

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _PopupBootstrap2 = __webpack_require__(40);

var _PopupBootstrap3 = _interopRequireDefault(_PopupBootstrap2);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Popup = function (_PopupBootstrap) {
    _inherits(Popup, _PopupBootstrap);

    function Popup() {
        _classCallCheck(this, Popup);

        return _possibleConstructorReturn(this, (Popup.__proto__ || Object.getPrototypeOf(Popup)).call(this, $('#popup')));
    }

    return Popup;
}(_PopupBootstrap3.default);

module.exports = Popup;

/***/ })

});
//# sourceMappingURL=Popup.7.js.map?cc663234e72787fa575c