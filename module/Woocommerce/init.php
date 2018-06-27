<?php

use Elastic\Product\PostType\Product;

add_filter('woocommerce_currency_symbols', 'theme_woocommerce_currency_symbols');
function theme_woocommerce_currency_symbols($symbols)
{
    $symbols['UAH'] = 'грн';

    return $symbols;
}

add_filter('woocommerce_price_trim_zeros', 'theme_woocommerce_price_trim_zeros');
function theme_woocommerce_price_trim_zeros($isTrimZero)
{
    return true;
}

add_filter('woocommerce_get_price_html', 'theme_woocommerce_get_price_html', 10, 2);
function theme_woocommerce_get_price_html($price, WC_Product $product)
{
    $post = get_post($product->get_id());
    $ptProduct = Product::create($post);
    $measurement = $ptProduct->getMeasurement();

    if ($measurement) {
        $price = str_replace('грн', "грн/{$measurement}", $price);
    }

    return $price;
}
