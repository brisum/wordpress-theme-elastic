<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\Breadcrumbs\BreadcrumbsInterface;
use Brisum\Wordpress\Breadcrumbs\CrumbsInterface;
use Elastic\Product\ProductCategoryService;
use Elastic\Term\TermService;
use WP_Term;

class Breadcrumbs implements CrumbsInterface
{
    protected $termService;
    /**
     * Breadcrumbs constructor.
     * @param BreadcrumbsInterface $breadcrumbs
     * @param TermService $termService
     */
	public function __construct(
	    BreadcrumbsInterface $breadcrumbs,
        TermService $termService
    ) {
		$breadcrumbs->registerPostType(Product::POST_TYPE, $this);
		$this->termService = $termService;
	}

    /**
     * @return array
     */
	public function generate()
    {
        if (is_single()) {
            return $this->generateSingle();
        }
        return $this->generateArchive();
	}

    /**
     * @return array
     */
	protected function generateSingle()
    {
        global $post;
        $term = $this->termService->getLowestTerm($post, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
        $breadcrumbs = [
            [
                'name' => "Товары",
                'link' => HOME_URL . '/product/'
            ]
        ];

        if ($term) {
            foreach ($this->generateTerm($term) as $crumb) {
                $breadcrumbs[] = $crumb;
            }
        }

        return $breadcrumbs;
    }

    /**
     * @return array
     */
    protected function generateArchive()
    {
        $category = get_query_var(ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
        $term = $category ? get_term_by('slug', $category, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY) : null;
        $breadcrumbs = [
            [
                'name' => "Товары",
                'link' => $term ? (HOME_URL . '/product/') : null
            ]
        ];

        if ($term) {
            foreach ($this->generateTerm($term) as $termCrumb) {
                $breadcrumbs[] = $termCrumb;
            }
        }

        return $breadcrumbs;
    }

    /**
     * @param WP_Term $term
     * @return array
     */
	protected function generateTerm(WP_Term $term)
    {
        $breadcrumbs = [];

        while ($term) {
            $breadcrumbs[] = [
                'name' => $term->name,
                'link' => get_term_link($term, $term->taxonomy)
            ];

            $term = $term->parent ? get_term($term->parent, $term->taxonomy) : null;
        }

        return array_reverse($breadcrumbs);
    }
}
