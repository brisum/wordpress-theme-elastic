<?php

namespace Elastic\Term;

use WP_Error;
use WP_Post;
use WP_Term;

class TermService
{
    /**
     * @param WP_Post $post
     * @param $taxonomy
     * @return null|WP_Term
     */
    public function getLowestTerm(WP_Post $post, $taxonomy)
    {
        /** @var WP_Term[] $terms */
        $terms = wp_get_post_terms($post->ID, $taxonomy);
        $lowestTerm = null;

        if ($terms instanceof WP_Error) {
            return null;
        }

        foreach ($terms as $termKey => $term) {
            if (0 === $term->parent) {
                $lowestTerm = $term;
                unset($terms[$termKey]);
            }
        }
        while ($terms) {
            $isUpdated = false;

            foreach ($terms as $termKey => $term) {
                if ($lowestTerm->term_id === $term->parent) {
                    $lowestTerm = $term;
                    unset($terms[$termKey]);
                    $isUpdated = true;
                }
            }

            if (!$isUpdated) {
                break;
            }
        }

        return $lowestTerm;
    }
}
