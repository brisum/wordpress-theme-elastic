<?php

namespace Grown\CheckoutOneClick\Test\Functional\Context;

use Behat\Behat\Context\Context;
use Grown\Test\Functional\Context\AbstractContext;

class ProductPageContext extends AbstractContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When press "Checkout 1 click" button on product page
     */
    public function pressCheckoutOneClickButtonOnProductPage()
    {
        $this->minkContext->getSession()->getPage()
            ->find('css', 'form.cart')
            ->findButton("Купить в 1 клик")
            ->click();
    }
}
