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
    class PopupContentWidget extends Widget {
        _init() {
            super._init();

            let self = this,
                popup = new Popup();

            self.$element.on('click', function () {
                popup.loading(true);
                popup.show();

                $.ajax({
                    url: self.$element.attr('data-action'),
                    method:  'get',
                    success: function (response) {
                        if (self.$element.attr('data-name')) {
                            popup.name(self.$element.attr('data-name'));
                        }
                        popup.content(response);
                        popup.loading(false);

                        new RequireInit(popup.getContext());
                    },
                    error: function (jqXHR) {
                        popup.content(jqXHR.responseText);
                    }
                });
                return false;
            });
        }
    }

    return PopupContentWidget;
});
