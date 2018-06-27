define([
    'jquery',
    'lib-widget',
    'lib-require-init',
    'Popup'
],
function(
    $,
    Widget,
    RequireInit,
    Popup
) {
    class PopupWidget extends Widget {
        _init() {
            super._init();

            let $body = $('body'),
                popup = new Popup();

            $body.on('loading.popup', function (event, args) {
                if (args && args.hasOwnProperty('loading') && args['loading']) {
                    popup.loading(true);
                } else {
                    popup.loading(false);
                }
            });

            $body.on('name.popup', function (event, args) {
                if (args && args.hasOwnProperty('name') && args['name']) {
                    popup.name(args['name']);
                } else {
                    popup.name('');
                }
            });

            $body.on('show.popup', function (event, args) {
                if (args && args.hasOwnProperty('content')) {
                    popup.content(args.content);
                }

                popup.show();
            });
        }
    }

    return PopupWidget;
});
