'use strict';

class ViewedProducts {
    constructor() {
        this.maxViewedProducts = 30;
    }

    add(productId) {
        let self = this,
            viewedProducts = self.get();


        if (-1 !== $.inArray(productId, viewedProducts)) {
            var productIdIndex = viewedProducts.indexOf(productId);
            viewedProducts[productIdIndex] = 0;
        }
        viewedProducts = viewedProducts.filter(function (value) {
            return 0 < value;
        });
        viewedProducts = viewedProducts.slice(0, self.maxViewedProducts - 1);

        viewedProducts.unshift(productId);
        $.cookie('viewed-product', viewedProducts.join(','), {expires: 7, path: '/'});
    }

    get() {
        let viewedProducts = $.cookie('viewed-product');

        viewedProducts = viewedProducts ? viewedProducts.split(',') : [];
        $.each(viewedProducts, function (i, val) {
            viewedProducts[i] = parseInt(val);
        });
        viewedProducts = $.unique(viewedProducts);
        viewedProducts = viewedProducts.filter(function (value) {
            return 0 < value;
        });
        viewedProducts = viewedProducts.slice(0, self.maxViewedProducts);

        return viewedProducts;
    }
}

module.exports = ViewedProducts;
