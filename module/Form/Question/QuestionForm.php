<?php

namespace Elastic\Form\Question;

use Brisum\Lib\Form\AbstractForm;
use Brisum\Lib\ObjectManager;

class QuestionForm extends AbstractForm
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

        $this->response['fields']['question_name'] = htmlentities($this->request['question_name']);
        if (empty($this->response['fields']['question_name'])) {
            $this->response['errors']['question_name'] = 'Введите имя';
        }

        $this->response['fields']['question_phone'] = htmlentities($this->request['question_phone']);
        if (empty($this->response['fields']['question_phone'])) {
            $this->response['errors']['question_phone'] = 'Введите телефон';
        }

        $this->response['fields']['question_email'] = htmlentities($this->request['question_email']);
        if (empty($this->response['fields']['question_email'])) {
            $this->response['errors']['question_email'] = 'Введите email';
        }

        $this->response['fields']['question_message'] = htmlentities($this->request['question_message']);
        if (empty($this->response['fields']['question_message'])) {
            $this->response['errors']['question_message'] = 'Введите вопрос';
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
            $isSend &= wp_mail($emailNotify, "{$siteTitle}, Форма \"Задать вопрос\"", $message, $headers);
        }

        // Notify Customer
        if (is_email($this->response['fields']['question_email'])) {
            $message = $view->content(
                'Resources/template/email/customer-notify.tpl',
                array_merge($this->response['fields'], ['site_title' => $siteTitle])
            );
            $headers = implode("\r\n", [
                "From: {$siteTitle} <{$emailFrom}>",
                'MIME-Version: 1.0',
                'Content-type: text/plain; charset=utf-8'
            ]);
            $isSend &= wp_mail($this->response['fields']['question_email'], "{$siteTitle}, Форма \"Задать вопрос\"", $message, $headers);
        }

        if ($isSend) {
            $this->response['status'] = self::STATUS_SUCCESS;
            $this->response['msg'] = 'Вопрос успешно отправлен.';
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
