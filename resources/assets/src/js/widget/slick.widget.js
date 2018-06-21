define(['jquery', 'lib-widget', 'lib-source-loader', 'lib-bundle-loader', 'lib-require-init'],
function($,        Widget,       SourceLoader,        BundleLoader,        RequireInit) {
    class SlickWidget extends Widget {
        _init() {
            super._init();

            let self = this;

            SourceLoader.loadStylesheets([
                Theme.url.theme + '/resources/assets/dist/slick_style.css?' + Theme.THEME_VERSION,
            ]);
            BundleLoader.load(
                [
                    require('bundle-loader?&name=slick!slick')
                ],
                function () {
                    let slickSettings = self.$element.data('slick') ? undefined : SlickWidget.defaults.slick;
                    self.$element.slick(slickSettings);
                }
            );
        }
    }
    SlickWidget.defaults = {
        slick: {
            dots: false,
            infinite: false,
            arrows: false,
            draggable: true,
            speed: 300,
            autoplaySpeed: 6000,
            slidesToShow: 1,
            slidesToScroll: 1,
        }
    };

    return SlickWidget;
});
