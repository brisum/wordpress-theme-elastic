<ul class="product-sidebar-menu">
    <?php foreach ($list as $item) : ?>
        <li>
            <a href="<?php echo $item['href']; ?>">
                <?php echo $item['title']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
