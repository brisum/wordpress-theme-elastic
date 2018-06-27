<?php

namespace Grown\CheckoutOneClick\Test\Functional\Context;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Exception;
use Grown\Test\Functional\Context\AbstractContext;
use Grown\Theme\Test\Functional\Context\CustomerContext;

class CheckoutOneClickPopupContext extends AbstractContext implements Context
{
    /**
     * @When fill form on CheckoutOneClick popup
     */
    public function fillFormOnCheckoutOneClickPopup()
    {
        $this->themeContext->waitForPopup();

        $customer = $this->sharedContext->getStorage()->get(CustomerContext::CUSTOMER);
        $popup = $this->minkContext->getSession()->getPage()->find('css', '#popup[data-name="checkout-one-click"]');

        if (isset($customer['name'])) {
            $popup->find('css', 'input[name="checkout1click[name]"]')
                ->setValue($customer['name']);
        }

        if (isset($customer['phone'])) {
            $popup->find('css', 'input[name="checkout1click[phone]"]')
                ->setValue($customer['phone']);
        }

        if (isset($customer['email'])) {
            $popup->find('css', 'input[name="checkout1click[email]"]')
                ->setValue($customer['email']);
        }
    }

    /**
     * @When press "Submit" button on CheckoutOneClick popup
     */
    public function pressButtonOnCheckoutOneClickPopup()
    {
        $this->minkContext->getSession()->getPage()
            ->find('css', "form#checkout-one-click")
            ->findButton("Отправить заказ")
            ->click();
    }

    /**
     * @When get order ID from success message on CheckoutOneClick popup
     * @throws Exception
     */
    public function getOrderIdFromSuccessMessageOnCheckoutOneClickPopup()
    {
        $page = $this->minkContext->getSession()->getPage();

        $isWaitUntil = $page->waitFor(
            30,
            function (DocumentElement $page) {
                $message = $page->find('css', '#popup[data-name="checkout-one-click"]')
                            ->find('css', ".alert.alert-success");
                return $message && $message->isVisible();
            }
        );
        if (!$isWaitUntil) {
            throw new Exception("Popup doesn't have success message.");
        }

        $message = $page->find('css', '#popup[data-name="checkout-one-click"]')
            ->find('css', ".alert.alert-success")->getText();
        preg_match('/Номер заказа: ([0-9]+)\./', $message, $match);
        if (empty($match[1])) {
            throw new Exception("Success message doesn't have order ID.");
        }

        $this->sharedContext->getStorage()->set("buffer/orderId", $match[1]);
    }
}
