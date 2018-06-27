<?php

function elastic_product_category_sidebar_branch(array $list)
{
    $out = '';

    foreach ($list as $item) {
        $out .= sprintf(
            '<li class="%s"><a href="%s">%s</a>',
            implode(' ', $item['classes']),
            $item['href'],
            $item['title']
        );

        if (!empty($item['child'])) {
            $out .= '<ul>';
            $out .= elastic_product_category_sidebar_branch($item['child']);
            $out .= '</ul>';
        }

        $out .= sprintf('</li>');
    }

    return $out;
}

?>

<ul class="product-sidebar-menu">
    <?php echo elastic_product_category_sidebar_branch($list); ?>
</ul>
