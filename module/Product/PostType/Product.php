<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\PostType\PostType;
use WP_Post;

class Product extends PostType
{
	const POST_TYPE = 'product';

    /**
     * @param WP_Post $post
     * @return self
     */
	public static function create($post)
    {
        return parent::create($post);
    }

    /**
     * @return string|null
     */
    public function getThumbnail()
    {
        $imageIds = $this->getPostMeta()->get('_product_image_gallery/0');
        $thumbnail = null;

        if ($imageIds) {
            $imageIds = array_filter(array_map('intval', explode(',', $imageIds)));
        } else {
            $imageIds = [];
        }

        if ($imageIds) {
            $imageId = reset($imageIds);
            $thumbnail = $imageId ? wp_get_attachment_image_src($imageId, 'woocommerce_thumbnail')[0] : null;
        }

        return $thumbnail;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        $imageIds = $this->getPostMeta()->get('_product_image_gallery/0');
        $images = [];

        if ($imageIds) {
            $imageIds = array_filter(array_map('intval', explode(',', $imageIds)));
        } else {
            $imageIds = [];
        }

        foreach ($imageIds as $imageId) {
            $images[] = [
                'thumbnail' => wp_get_attachment_image_src($imageId, 'woocommerce_thumbnail')[0],
                'preview' => wp_get_attachment_image_src($imageId, 'woocommerce_single')[0],
                'full' => wp_get_attachment_image_src($imageId, 'full')[0]
            ];
        }

        return $images;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        $properties = [];

        for ($i = 1, $amount = 10; $i <= $amount; $i++) {
            $property = $this->getPostMeta()->get("property_{$i}/0");
            $property = unserialize($property);

            if (!empty($property['description'])) {
                $properties[] = $property;
            }
        }

        return $properties;
    }

    /**
     * @return array
     */
    public function getVideoList()
    {
        $videoList = [];

        for ($i = 1, $amount = 3; $i <= $amount; $i++) {
            $video = $this->getPostMeta()->get("video_{$i}/0");

            if ($video) {
                $videoList[] = $video;
            }
        }

        return $videoList;
    }

    public function getMeasurement()
    {
        $measurement = $this->getPostMeta()->get("measurement/0");

        return $measurement ? $measurement : null;
    }
}
