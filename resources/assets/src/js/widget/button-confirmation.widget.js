define(['jquery', 'lib-widget', 'PopupConfirm'],
function($,        Widget,      PopupConfirm) {
    class FormConfirmationWidget extends Widget {
        _init() {
            super._init();

            // allow only button
            if ('button' !== this.$element[0].nodeName.toLowerCase()) {
                return;
            }

            let self = this,
                popup = new PopupConfirm(),
                $popup = popup.$element;

            self.$element.on('click.confirm', function () {
                if (self.$element.attr('data-confirmed')) {
                    setTimeout(function () {
                        self.$element.removeAttr('data-confirmed');
                    }, 1000);
                    return true;
                }

                popup.content(self.options.confirmation);
                popup.show(self.options.confirmation);

                $popup.one('click', 'button.confirm', function () {
                    self.$element.attr('data-confirmed', true);
                    self.$element.trigger('click');
                    popup.hide();
                });

                $popup.one('hidden.bs.modal', function () {
                    $popup.off('click.confirm');
                });

                return false;
            });
        }
    }

    return FormConfirmationWidget;
});
