<?php

namespace Elastic\CheckoutOneClick;

use Brisum\Lib\Form\AbstractForm;
use WC_Data_Exception;
use WC_Geolocation;
use WC_Payment_Gateway;

class CheckoutOneClickForm extends AbstractForm
{
    /**
     * @return string
     */
    protected function getTemplate()
    {
        return 'Resources/template/form.tpl.php';
    }

    protected function init()
    {
        parent::init();
        $this->response['fields']['page_request'] = esc_attr($_SERVER['REQUEST_URI']);
    }

    /**
     * @return void
     */
    protected function validate()
    {
        if (null === $this->request) {
            return;
        }

        $request = isset($this->request['checkout1click']) ? $this->request['checkout1click'] : [];

        $this->response['fields']['product_id'] = intval($request['product_id']);

        $this->response['fields']['name'] = htmlentities($request['name']);
        if (empty($this->response['fields']['name'])) {
            $this->response['errors']['name'] = 'Введите имя';
        }

        $this->response['fields']['email'] = htmlentities($request['email']);
        if (empty($this->response['fields']['email'])) {
            $this->response['errors']['email'] = 'Введите email';
        }

        $this->response['fields']['phone'] = htmlentities($request['phone']);
        if (empty($this->response['fields']['phone'])) {
            $this->response['errors']['phone'] = 'Введите телефон';
        }

        $this->response['fields']['page_request'] = esc_attr(stripslashes($request['page_request']));
        $this->response['fields']['payment_method'] = esc_attr(stripslashes($request['payment_method']));
    }

    /**
     * @return void
     *
     * @throws WC_Data_Exception
     */
    protected function processSuccess()
    {
        $order = wc_create_order();

        $order->set_created_via('checkout 1 click');
        $order->set_customer_id(apply_filters('woocommerce_checkout_customer_id', get_current_user_id()));
        $order->set_currency(get_woocommerce_currency());
        $order->set_prices_include_tax('yes' === get_option('woocommerce_prices_include_tax'));
        $order->set_customer_ip_address(WC_Geolocation::get_ip_address());
        $order->set_customer_user_agent(wc_get_user_agent());
        $order->set_address([
            'first_name' => $this->response['fields']['name'],
            'last_name'  => '',
            'phone'      => $this->response['fields']['phone'],
            'email'      => $this->response['fields']['email'],
            'address_1'  => '',
            'address_2'  => '',
            'city'       => '',
            'state'      => '',
            'postcode'   => '',
            'country'    => ''
        ]);

        $paymentId = $this->response['fields']['payment_method'];
        $payments = WC()->payment_gateways()->payment_gateways();
        /** @var WC_Payment_Gateway $payment */
        $payment = isset($payments[$paymentId]) ? $payments[$paymentId] : null;
        $paymentTerm = null;
        if ($payment) {
            $paymentType = $this->response['fields']['payment_type'];
            $paymentTerm = intval($this->response['fields']['payment_term']);
            $paymentTermAmount = $paymentTerm;

            $order->set_payment_method($paymentId);
            // not save term in metadata because of order doesn't have ID yet.

//            if (
//                $payment instanceof WC_Payment_Gateway_PrivatBank_PayParts
//                || $payment instanceof WC_Payment_Gateway_PrivatBank_Instant_Credit
//            ) {
//                $paymentTermAmount += 1;
//            }

            $order->add_order_note(
                implode(', ', array_filter([
                    "Метод оплаты - " . $payment->get_option('title'),
                    $paymentType ? ('тип - ' . $payment->get_option("{$paymentType}_title")) : null,
                    $paymentTermAmount ? "количество платежей - {$paymentTermAmount}" : null,
                ])) . '.'
            );
        }

        if ($this->response['fields']['product_id']) {
            $order->add_product(wc_get_product($this->response['fields']['product_id']), 1);
        }
        $order->calculate_totals();

        $order->add_order_note("Заказ в 1 клик");
        $order->add_order_note("Заказ сделал с страницы " . HOME_URL . $this->response['fields']['page_request']);
        $order->set_status('on-hold');

        if ($order->save()) {
            $this->response['status'] = self::STATUS_SUCCESS;
            $this->response['msg'] = 'Спасибо. Ваш заказ был принят.<br/>Номер заказа: ' . $order->get_order_number() . '.';
//            if ($payment && WC_Payment_Gateway_PrivatBank_PayParts::ID == $payment->id) {
//                $payment->setPaymentTerm($order->get_id(), $paymentTerm);
//                $this->response['redirect'] = null; // $payment->get_return_url($order);
//            } elseif ($payment && WC_Payment_Gateway_PrivatBank_Instant_Credit::ID == $payment->id) {
//                $payment->setPaymentTerm($order->get_id(), $paymentTerm);
//                $this->response['redirect'] = $payment->get_return_url($order);
//            } else {
                $this->response['redirect'] = null;
//            }
        } else {
            $this->response['status'] = self::STATUS_ERROR;
            $this->response['msg'] = 'Возникла ошибка во время оформления заказа. Попробуйте, пожалуйста, позже.';
        }
        $this->response['fields'] = [];
    }

    /**
     * @return void
     */
    protected function processFail()
    {
        // TODO: Implement processFail() method.
    }
}
