webpackJsonp_name_([13],{

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0), __webpack_require__(2), __webpack_require__(4), __webpack_require__(1), __webpack_require__(3)], __WEBPACK_AMD_DEFINE_RESULT__ = (function ($, Widget, SourceLoader, BundleLoader, RequireInit) {
    var MenuMobileWidget = function MenuMobileWidget() {
        Widget.apply(this, arguments);
    };

    MenuMobileWidget.prototype = Object.create(Widget.prototype);
    MenuMobileWidget.prototype.constructor = MenuMobileWidget;

    MenuMobileWidget.prototype._init = function () {
        var self = this;

        SourceLoader.loadScripts(['/catalog/view/theme/hyla/third-party/off-canvas-menu/js/modernizr.custom.js?' + 1, '/catalog/view/theme/hyla/third-party/off-canvas-menu/js/jquery.dlmenu.custom.js?' + 1], function () {
            self.$element.dlmenu({
                animationClasses: {
                    classin: 'dl-animate-in-left',
                    classout: 'dl-animate-out-left'
                },
                isActive: function isActive($item, event) {
                    var isActive = !($(window).width() > 767 || $item.hasClass('toggle-item-show'));

                    return isActive;
                }
            });

            $('body').on('click', '#header .navbar-toggler', function () {
                console.log('open menu');
                self.$element.data('dlmenu').openMenu();
            });
        });
    };

    return MenuMobileWidget;
}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ })

});
//# sourceMappingURL=off-canvas-menu.widget.13.js.map?4c8db4e9d5a1244a1c22