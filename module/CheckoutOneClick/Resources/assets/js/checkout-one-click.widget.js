define([
    'jquery',
    'lib-widget',
    'lib-bundle-loader'
],
function(
    $,
    Widget,
    BundleLoader
) {
    class CheckoutOneClickWidget extends Widget {
        constructor($element, options) {
            super($element, options);
        }

        _init() {
            super._init();

            let self = this;

            $('body').on('found_variation', 'form.cart.variations_form', function (event, variation) {
                self.$element.val(variation.id);
            });

            $('body').on('reset_data', 'form.cart.variations_form', function (event, args) {
                let productId = $(this).find('input[name="product_id"]').val();
                self.$element.val(productId);
            });

            BundleLoader.load(
                [
                    require('bundle-loader?&name=Popup!Popup')
                ],
                function (
                    Popup
                ) {
                    self.$element.on('click', function () {
                        let $form = self.$element.closest('form.cart.variations_form'),
                            $variationId = $form.find('.variations_button .variation_id');
                        if (0 !== $variationId.length && '' === $variationId.val()) {
                            self.$element.attr('title', 'Выберите опции')
                                .tooltip({placement: 'top', trigger: 'manual'})
                                .tooltip('show');

                            setTimeout(function () {
                                self.$element.tooltip('hide');
                            }, 2000);
                            self.$element.one('hidden.bs.tooltip', function () {
                                self.$element.removeAttr('title');
                            });
                            return false;
                        }

                        let productId = self.$element.val(),
                            paymentMethod = self.$element.attr('data-payment-method'),
                            paymentType = self.$element.attr('data-payment-type'),
                            paymentTerm = self.$element.attr('data-payment-term'),
                            popup = new Popup(),
                            $context = popup.getContext();

                        popup.loading(true);
                        popup.name('checkout-one-click');
                        popup.show();
                        $.ajax({
                            type: 'post',
                            url: Theme.url.adminAjax,
                            data: {
                                action: 'checkout-one-click'
                            },
                            success: function (response) {
                                popup.content(response);
                                $context.find('input[name="checkout1click[product_id]"]').val(productId);
                                $context.find('input[name="checkout1click[payment_method]"]').val(paymentMethod);
                                $context.find('input[name="checkout1click[payment_type]"]').val(paymentType);
                                $context.find('input[name="checkout1click[payment_term]"]').val(paymentTerm);
                                $context.find('input[name="checkout1click[page_request]"]').val(location.href);

                                new Brisum.AstuteForm(
                                    $context.find('#checkout-one-click'),
                                    {
                                        afterSend: function () {
                                            $context.find('#checkout-one-click input[name="checkout1click[page_request]"]')
                                                .val(location.href);
                                        }
                                    }
                                );

                                popup.loading(false);
                            }
                        });

                        return false;
                    });
                }
            );
        }
    }

    return CheckoutOneClickWidget;
});
