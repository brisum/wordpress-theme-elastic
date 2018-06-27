<?php

namespace Elastic\Form\Contact;

use Brisum\Lib\Form\AbstractForm;
use Brisum\Lib\ObjectManager;

class ContactForm extends AbstractForm
{
    /**
     * @return string
     */
    protected function getTemplate()
    {
        return $this->args['template'];
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

        $this->response['fields']['contact_name'] = htmlentities($this->request['contact_name']);
        if (empty($this->response['fields']['contact_name'])) {
            $this->response['errors']['contact_name'] = 'Введите имя';
        }

        $this->response['fields']['contact_email'] = htmlentities($this->request['contact_email']);
        if (empty($this->response['fields']['contact_email'])) {
            $this->response['errors']['contact_email'] = 'Введите email';
        }

        $this->response['fields']['contact_phone'] = htmlentities($this->request['contact_phone']);
        if (empty($this->response['fields']['contact_phone'])) {
            $this->response['errors']['contact_phone'] = 'Введите телефон';
        }

        $this->response['fields']['contact_message'] = htmlentities($this->request['contact_message']);
        if (empty($this->response['fields']['contact_message'])) {
            $this->response['errors']['contact_message'] = 'Введите вопрос';
        }

        $this->response['fields']['page_request'] = esc_attr(stripslashes($this->request['page_request']));
    }

    /**
     * @return void
     */
    protected function processSuccess()
    {
        $siteTitle = get_bloginfo('name');
        $emailNotifyList = array_map('trim', explode(',', get_option('theme_email_notify')));
        $emailFrom = trim(get_option('theme_email_send_from'));
        /** @var \Brisum\Lib\View $view */
        $view = ObjectManager::getInstance()->create(
            'Brisum\Lib\View',
            ['dirTemplate' => dirname(__FILE__)]
        );

        // Notify Admin
        $message = $view->content('Resources/template/email/admin-notify.tpl', $this->response['fields']);
        $headers = implode("\r\n", [
            "From: {$siteTitle} <{$emailFrom}>",
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8'
        ]);
        $isSend = true;

        foreach($emailNotifyList as $emailNotify) {
            $isSend &= wp_mail($emailNotify, "{$siteTitle}, Форма \"Обратная связь\"", $message, $headers);
        }

        // Notify Customer
        if (is_email($this->response['fields']['contact_email'])) {
            $message = $view->content(
                'Resources/template/email/customer-notify.tpl',
                array_merge($this->response['fields'], ['site_title' => $siteTitle])
            );
            $headers = implode("\r\n", [
                "From: {$siteTitle} <{$emailFrom}>",
                'MIME-Version: 1.0',
                'Content-type: text/plain; charset=utf-8'
            ]);
            $isSend &= wp_mail($this->response['fields']['contact_email'], "{$siteTitle}, Форма \"Обратная связь\"", $message, $headers);
        }

        if ($isSend) {
            $this->response['status'] = self::STATUS_SUCCESS;
            $this->response['msg'] = 'Сообщение успешно отправлено.';
        } else {
            $this->response['status'] = self::STATUS_ERROR;
            $this->response['msg'] = 'Не удалось отправить данные. Попробуйте, пожалуйста, позже.';
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
