<?php

namespace Elastic\Product\Plugin;

class Filter
{
    public function __construct()
    {
        add_filter('post_type_link', [$this, 'filterPostTypeLink'], 10, 3);
    }

    public function filterPostTypeLink($post_link, $post, $leavename)
    {
        if ('product' == $post->post_type && !$leavename) {
            return sprintf('%s/%s/', home_url(), $post->post_name);
        }

        return $post_link;
    }
}
