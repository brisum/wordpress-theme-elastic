<?php

use Elastic\Product\PostType\Product;
use Elastic\Watermark\Watermark;

add_filter('wp_generate_attachment_metadata', 'watermark_wp_generate_attachment_metadata', 10, 2);
function watermark_wp_generate_attachment_metadata($metadata, $attachmentId)
{
    global $wpdb;
//    $postType = $wpdb->get_var($wpdb->prepare(
//        "SELECT p.post_type
//         FROM {$wpdb->posts} p
//         INNER JOIN {$wpdb->posts} a ON p.ID = a.post_parent
//         WHERE a.ID = '%d'",
//         $attachmentId
//    ));
//
//    if (Product::POST_TYPE != $postType) {
//        return $metadata;
//    }

    $sizes = [
        'woocommerce_thumbnail',
        'woocommerce_single'
    ];
    $watermark = new Watermark();
    $fullSizePath = get_attached_file($attachmentId);
    $imageDir = dirname($fullSizePath);
    foreach ($metadata['sizes'] as $size => $sizeMetaData) {
        if (!in_array($size, $sizes)) {
            continue;
        }

        $image = $imageDir . '/' . $sizeMetaData['file'];
        $watermark->placeToCenter(
            $image,
            ABSPATH . '/wp-content/themes/elastic/module/Watermark/Resources/assets/img/watermark2.png'
        );
    }

    return $metadata;
}
