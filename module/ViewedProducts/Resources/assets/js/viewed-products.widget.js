define(
[
    'jquery',
    'lib-widget',
    'lib-source-loader',
    'lib-bundle-loader',
    'lib-require-init',
    './ViewedProducts'
],
function(
    $,
    Widget,
    SourceLoader,
    BundleLoader,
    RequireInit,
    ViewedProducts
) {
    class ViewedProductsWidget extends Widget {
        _init () {
            let self= this,
                productId = parseInt(self.$element.attr('data-product')),
                viewedProducts = new ViewedProducts(),
                viewedProductIds = viewedProducts.get();

            if (viewedProductIds.length) {
                SourceLoader.loadStylesheets([
                    Theme.url.theme + '/resources/assets/dist/slick_style.css?' + Theme.THEME_VERSION,
                ]);
                BundleLoader.load(
                    [
                        require('bundle-loader?&name=slick!slick')
                    ],
                    function () {
                        $.ajax({
                            type: 'get',
                            url: '/?post_type=product&tpl-part=template-parts/product/viewed-products',
                            data: {'post__in': viewedProductIds.join(',')},
                            success: function(response) {
                                self.$element.html(response);
                                self.$element.removeClass('d-none');

                                new RequireInit(self.$element);
                            }
                        });
                    }
                );
            }
            if (productId) {
                viewedProducts.add(productId);
            }
        };
    }

    return ViewedProductsWidget;
});
