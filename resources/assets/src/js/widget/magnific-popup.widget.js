define(['jquery', 'lib-widget', 'lib-source-loader', 'lib-bundle-loader', 'lib-require-init'],
function($,        Widget,       SourceLoader,        BundleLoader,        RequireInit) {
    class MagnificPopupWidget extends Widget {
        _init() {
            super._init();

            let self = this;

            SourceLoader.loadStylesheets([
                Theme.url.theme + '/resources/assets/dist/magnific_popup_style.css?' + Theme.THEME_VERSION,
            ]);
            BundleLoader.load(
                [
                    require('bundle-loader?&name=magnific_popup!magnific_popup')
                ],
                function () {

                    self.$element.magnificPopup($.extend(
                        {},
                        MagnificPopupWidget.defaults,
                        { type: self.options.type}
                    ));

                    self.$element.on('click', function (e) {
                        e.stopPropagation();

                        return false;
                    });
                }
            );
        }
    }

    MagnificPopupWidget.defaults = {
        iframe: {
            markup: '<div class="mfp-iframe-scaler">'+
                '<div class="mfp-close"></div>'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

            patterns: {
                youtube: {
                    index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                    id: null, // String that splits URL in a two parts, second part should be %id%
                    // Or null - full URL will be returned
                    // Or a function that should return %id%, for example:
                    // id: function(url) { return 'parsed id'; }

                    src: '%id%&autoplay=1' // URL that will be set as a source for iframe.
                }
            },
        }
    };

    return MagnificPopupWidget;
});
