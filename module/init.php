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

    // module
];

$loadAdmin = [
    // vendor

    // module
    // THEME_DIR . 'module/ThemeOptions/init-admin.php'
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
