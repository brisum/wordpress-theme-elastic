webpackJsonp_name_([15],{

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

/***/ })

});
//# sourceMappingURL=PopupBootstrap.15.js.map?0f44653f9c7c509deded