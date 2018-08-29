<?php

use Brisum\Lib\ObjectManager;

$objectManager = ObjectManager::getInstance();

$objectManager->create('Elastic\Theme\Plugin\RewriteRule');

$objectManager->create('Brisum\Wordpress\Theme\Plugin\Attachment');
$objectManager->create('Brisum\Wordpress\Theme\Plugin\EmojiDisable');
$objectManager->create('Brisum\Wordpress\Theme\Plugin\WpHeadClean');
$objectManager->create('Brisum\Wordpress\Theme\Plugin\XmlrpcDeny');
