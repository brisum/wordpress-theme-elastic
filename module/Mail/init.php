<?php

if (!IS_ENV_PRODUCTION) {
    add_action('phpmailer_init', 'mail_dev_phpmail_init');
    function mail_dev_phpmail_init($phpmailer) {
        /** @var PHPMailer $phpmailer */
        $phpmailer->isSMTP();
        $phpmailer->Username = 'developer@dsrv.in';
        $phpmailer->Password = 'U70UlHSxz1a9';
        $phpmailer->Host = 'mail.adm.tools';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 25;

        return $phpmailer;
    }
}
