<?php

use Brisum\Lib\Form\AbstractForm;
use Brisum\Lib\ObjectManager;

add_action('wp', 'theme_form_wp', 1);
function theme_form_wp(){
    $objectManager = ObjectManager::getInstance();

    /** @var AbstractForm $questionForm */
    $questionForm = $objectManager->get('Elastic\Form\Question\QuestionForm');
    if ($questionForm->parseRequest()) {
        wp_redirect($_SERVER['REQUEST_URI']) && die();
    }
    $objectManager->get('Elastic\Form\Question\QuestionFormPopup');

    /** @var AbstractForm $contactForm */
    $contactForm = $objectManager->get('Elastic\Form\Contact\ContactForm');
    if ($contactForm->parseRequest()) {
        wp_redirect($_SERVER['REQUEST_URI']) && die();
    }
}
