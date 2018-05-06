<?php

!is_admin() && add_action( 'wp_enqueue_scripts', 'load_theme_scripts', 100);
function load_theme_scripts() {
    $assets = json_decode(file_get_contents(THEME_DIR . 'resources/assets/dist/assets.json'), true);

    if (empty($assets)) {
        return;
    }

    wp_enqueue_style('theme', $assets['style']['css'], [], THEME_VERSION);

	wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');

    wp_register_script('jquery', THEME_URI . '/resources/assets/dist/jquery.js', false, THEME_VERSION, true);
	wp_enqueue_script('jquery');

    wp_enqueue_script('theme', $assets['main']['js'], ['jquery'], THEME_VERSION, true);
    wp_localize_script(
        'theme',
        'Theme',
        [
            'THEME_VERSION' => THEME_VERSION,
            'url' => [
                'adminAjax' => admin_url('admin-ajax.php'),
                'theme' => THEME_URI
            ]
        ]
    );

    $wp_scripts = wp_scripts();
    foreach ($wp_scripts->queue as $queue) {
        if (isset($wp_scripts->registered[$queue])) {
            $wp_scripts->registered[$queue]->extra['group'] = 1;
        } else {
            wp_deregister_script($queue);
        }
    }
}