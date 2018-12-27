webpackJsonp_name_([14],{

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0), __webpack_require__(2), __webpack_require__(3)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($, Widget, RequireInit) {
    var DivTableWidget = function (_Widget) {
        _inherits(DivTableWidget, _Widget);

        function DivTableWidget() {
            _classCallCheck(this, DivTableWidget);

            return _possibleConstructorReturn(this, (DivTableWidget.__proto__ || Object.getPrototypeOf(DivTableWidget)).apply(this, arguments));
        }

        _createClass(DivTableWidget, [{
            key: '_init',
            value: function _init() {
                _get(DivTableWidget.prototype.__proto__ || Object.getPrototypeOf(DivTableWidget.prototype), '_init', this).call(this);

                var self = this;

                this.$element.on('click', '.div-td.tcol-toggle', function () {
                    var $tr = $(this).closest('.div-tr');

                    if ($tr.hasClass('collapse')) {
                        $tr.removeClass('collapse');
                        $tr.find('.secondary-columns').slideUp();
                    } else {
                        if (!$tr.find('.secondary-columns').length) {
                            self.createSecondaryColumnsBlock($tr);
                        }
                        $tr.addClass('collapse');
                        $tr.find('.secondary-columns').slideDown();
                    }
                });
            }
        }, {
            key: 'createSecondaryColumnsBlock',
            value: function createSecondaryColumnsBlock($tr) {
                if ($tr.find('.secondary-columns').length) {
                    $tr.find('.secondary-columns').remove();
                }

                var $secondaryColumns = $('<div class="secondary-columns"></div>');

                $tr.find('.tcol-secondary').each(function (i, element) {
                    $secondaryColumns.append($(element).clone());
                });
                $tr.append($('<div class="clearfix tcol-secondary-separator"></div>'));
                $tr.append($secondaryColumns);

                new RequireInit($tr.find('.secondary-columns'));
            }
        }]);

        return DivTableWidget;
    }(Widget);

    return DivTableWidget;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ })

});
//# sourceMappingURL=div-table.widget.14.js.map?83b4cf01a8985785ed5a