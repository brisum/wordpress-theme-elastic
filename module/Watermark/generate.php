<?php

header("X-Robots-Tag: noindex,nofollow");

//die();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './../../../../../wp-load.php';
include_once( ABSPATH . 'wp-admin/includes/image.php' );
echo '<pre>';

if (!session_id()) {
    session_start();
}

//if (!isset($_GET['post'])) {
//    die('end');
//}

global $wpdb;
//$post = empty($_GET['post']) ? null : intval($_GET['post']);
$posts =$wpdb->get_results("select * from {$wpdb->posts} where post_type = 'product' and ID > 147 ORDER BY ID ASC");

foreach ($posts as $post) {
    $product = \Elastic\Product\PostType\Product::create($post);
    $attachmentIds = $product->getPostMeta()->get('_product_image_gallery/0');

    if ($attachmentIds) {
        $attachmentIds = explode(',', $attachmentIds);
        foreach ($attachmentIds as $attachmentId) {
            $fullSizePath = get_attached_file($attachmentId);
            $metadata = wp_generate_attachment_metadata($attachmentId, $fullSizePath);

            echo "{$post->ID}:{$fullSizePath}\n";
        }
    }
}


//$post = $wpdb->get_row("select * from {$wpdb->posts} where post_type = 'product' and ID > {$post->ID} ORDER BY ID ASC limit 1");
//if ($post) {
//    header("Location: /wp-content/themes/elastic/module/Watermark/generate.php?post={$post->ID}");
//}
