<?php

namespace Elastic\CheckoutOneClick\Plugin;

use Brisum\Lib\ObjectManager;

class Action
{
    public function __construct()
    {
        add_action('wp_ajax_checkout-one-click', [$this, 'ajaxCheckoutOneClick']);
        add_action('wp_ajax_nopriv_checkout-one-click', [$this, 'ajaxCheckoutOneClick']);
    }

    public function ajaxCheckoutOneClick()
    {
        echo ObjectManager::getInstance()->get('Elastic\CheckoutOneClick\CheckoutOneClickForm')->content();

        die();
    }
}
