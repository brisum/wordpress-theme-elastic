define(['jquery', 'lib-widget', 'PopupConfirm'],
function($,        Widget,      PopupConfirm) {
    class FormConfirmationWidget extends Widget {
        _init() {
            super._init();

            // allow only form
            if ('form' !== this.$element[0].nodeName.toLowerCase()) {
                return;
            }

            let self = this,
                popup = new PopupConfirm(),
                $popup = popup.$element;

            self.$element.on('submit', function () {
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
                    self.$element.trigger('submit');
                    popup.hide();
                });

                $popup.one('hidden.bs.modal', function () {
                    $popup.off('click', 'button.confirm');
                });

                return false;
            });
        }
    }

    return FormConfirmationWidget;
});
