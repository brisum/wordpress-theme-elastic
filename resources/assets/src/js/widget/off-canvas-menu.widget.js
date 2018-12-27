define(['jquery', 'lib-widget', 'lib-source-loader', 'lib-bundle-loader', 'lib-require-init'],
function($,        Widget,       SourceLoader,        BundleLoader,        RequireInit) {
    var MenuMobileWidget = function () {
        Widget.apply(this, arguments);
    };

    MenuMobileWidget.prototype = Object.create(Widget.prototype);
    MenuMobileWidget.prototype.constructor = MenuMobileWidget;

    MenuMobileWidget.prototype._init = function () {
        var self = this;

        SourceLoader.loadScripts(
            [
                '/catalog/view/theme/hyla/third-party/off-canvas-menu/js/modernizr.custom.js?' + 1,
                '/catalog/view/theme/hyla/third-party/off-canvas-menu/js/jquery.dlmenu.custom.js?' + 1
            ], function () {
                self.$element.dlmenu({
                    animationClasses: {
                        classin: 'dl-animate-in-left',
                        classout: 'dl-animate-out-left'
                    },
                    isActive: function ($item, event) {
                    var isActive = !(
                        $(window).width() > 767
                        || $item.hasClass('toggle-item-show')
                    );

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
});
