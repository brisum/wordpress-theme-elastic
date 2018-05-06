<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\Breadcrumbs\BreadcrumbsInterface;
use Brisum\Wordpress\Breadcrumbs\CrumbsInterface;

class Breadcrumbs implements CrumbsInterface
{
	public function __construct(BreadcrumbsInterface $breadcrumbs)
	{
		$breadcrumbs->registerPostType('faq', $this);
	}

	public function generate() {
		return [
			[
				'name' => "FAQ",
				'link' => null
			]
		];
	}
}
