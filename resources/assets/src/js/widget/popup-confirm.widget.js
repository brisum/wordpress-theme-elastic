define([
    'jquery',
    'lib-widget',
    'lib-require-init',
    'PopupConfirm'
],
function(
    $,
    Widget,
    RequireInit,
    PopupConfirm
) {
    class PopupConfirmWidget extends Widget {
        _init() {
            super._init();

            let $body = $('body'),
                popup = new PopupConfirm();

            $body.on('loading.popup-confirm', function (event, args) {
                if (args && args.hasOwnProperty('loading') && args['loading']) {
                    popup.loading(true);
                } else {
                    popup.loading(false);
                }
            });

            $body.on('name.popup-confirm', function (event, args) {
                if (args && args.hasOwnProperty('name') && args['name']) {
                    popup.name(args['name']);
                } else {
                    popup.name('');
                }
            });

            $body.on('show.popup-confirm', function (event, args) {
                if (args && args.hasOwnProperty('content')) {
                    popup.content(args.content);
                }

                popup.show();
            });
        }
    }

    return PopupConfirmWidget;
});
