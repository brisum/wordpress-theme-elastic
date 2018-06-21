<?php

add_action('admin_enqueue_scripts', 'module_assets_admin_enqueue_scripts', 100);
function module_assets_admin_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('suggest');
    wp_enqueue_script(
        'theme-admin',
        THEME_URI . '/assets/dist/admin_main.js',
        ['jquery'],
        THEME_VERSION,
        true
    );
    wp_localize_script(
        'jquery',
        'Theme',
        [
            'THEME_VERSION' => THEME_VERSION,
            'currency' => 'руб.',
            'url' => [
                'theme' => THEME_URI,
                'adminAjax' => admin_url('admin-ajax.php'),
                'actionInventorySynchronizationImageSave' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-file-save',
                'actionInventorySynchronizationCommand' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-command',
                'actionInventorySynchronizationConsoleCommand' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-console-command',
                'actionInventorySynchronizationNewTerms' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-new-terms',
                'actionInventorySynchronizationNewTermsSave' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-new-terms-save',
                'actionInventorySynchronizationPendingProducts' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-pending-products',
                'actionInventorySynchronizationPublish' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-publish',
                'actionInventorySynchronizationPendingClear' => WP_ADMIN_AJAX_URL . '?action=inventory-synchronization-pending-clear',
            ]
        ]
    );

    wp_enqueue_style('theme-admin-foundation', THEME_URI .'/assets/dist/admin_style.css', [], THEME_VERSION);
    wp_enqueue_style('theme-admin-style', THEME_URI .'/css/admin/style.css', [], THEME_VERSION);
}
