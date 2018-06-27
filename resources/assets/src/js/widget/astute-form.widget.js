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
    class AstuteFormWidget extends Widget {
        _init() {
            super._init();

            // allow only form
            if ('form' !== this.$element[0].nodeName.toLowerCase()) {
                return;
            }

            let self = this;

            self.$element.on('submit', function () {
                let $form = self.$element,
                    formName = $form.attr('name');

                $form.addClass('loading');
                $form.trigger('request.astute-form');
                $.ajax({
                    url: $form.attr('action'),
                    method:  $form.attr('method'),
                    data: $form.serialize(),
                    success: function (response) {
                        let $response = $('<div></div>').html(response),
                            $responseForm = $response.find('form[name="' + formName + '"]');

                        $form.html($responseForm.html());
                        new RequireInit($form);

                        $form.removeClass('loading');

                        $form.trigger('response.success.astute-form');
                    },
                    error: function (jqXHR) {
                        $form.html(jqXHR.responseText);
                        $form.removeClass('loading');

                        $form.trigger('response.error.astute-form');
                    }
                });

                return false;
            });
        }
    }

    return AstuteFormWidget;
});
