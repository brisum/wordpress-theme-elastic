<?php

if (session_id() == false) {
    ini_set('session.use_only_cookies', 'On');
    ini_set('session.use_trans_sid', 'Off');
    ini_set('session.cookie_httponly', 'On');

    session_set_cookie_params(0, '/');
    session_start();

    //vs session hijacking
    session_regenerate_id();
}

require_once __DIR__ . '/Theme/constant.php';
require_once __DIR__ . '/../vendor/brisum/wordpress-module-theme/src/constant.php';

$load = [
    // vendor
    THEME_DIR . 'vendor/brisum/wordpress-module-theme/src/init.php',
    THEME_DIR . 'vendor/brisum/wordpress-module-custom-field/src/init.php',
    THEME_DIR . 'vendor/brisum/wordpress-module-image-editor/src/init.php',
    THEME_DIR . 'vendor/brisum/wordpress-plugin-query-monitor/src/init.php',

    THEME_DIR . 'vendor/brisum/wordpress-module-post-type-page/src/init.php',
    THEME_DIR . 'vendor/brisum/wordpress-module-post-type-slider/src/init.php',

    // constants
    THEME_DIR . 'module/Resources/constant.php',

    // module
    THEME_DIR . 'module/CheckoutOneClick/init.php',
    THEME_DIR . 'module/Form/init.php',
    THEME_DIR . 'module/Mail/init.php',
    THEME_DIR . 'module/Menu/init.php',
    THEME_DIR . 'module/Product/init.php',
    THEME_DIR . 'module/Resources/init.php',
    THEME_DIR . 'module/Theme/init.php',
    THEME_DIR . 'module/ViewedProducts/init.php',
    THEME_DIR . 'module/Watermark/init.php',
    THEME_DIR . 'module/Woocommerce/init.php',
];

$loadAdmin = [
    // vendor
     THEME_DIR . 'vendor/brisum/wordpress-module-theme-options/src/init-admin.php'

    // module
];

foreach ($load as $file) {
    require_once $file;
}
if (is_admin()) {
    foreach ($loadAdmin as $file) {
        require_once $file;
    }
}

//if (class_exists('QueryMonitor')) {
//    require_once(THEME_DIR . 'vendor/brisum/wordpress-plugin-query-monitor/src/init.php');
//
//    if (current_user_can('administrator')) {
//        wp_get_current_user()->add_cap('view_query_monitor');
//    }
//}
