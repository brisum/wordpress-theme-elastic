<?php

namespace Elastic\ViewedProducts\Plugin;

class Action {
    public function __construct()
    {
        add_action('viewed_products', [$this, 'viewedProducts'], 30);
    }

    public function viewedProducts()
    {
        global $product;
        $productId = is_single() && $product ? $product->get_id() : null;
        ?>
            <div class="viewed-products d-none"
                 data-product="<?php echo $productId; ?>"
                 data-require-init="viewed-products.widget">
            </div>
        <?php
    }
}
