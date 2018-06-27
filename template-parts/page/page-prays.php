<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\PriceList;

global $post;
$objectManager = ObjectManager::getInstance();
$content = get_the_content();
/** @var PriceList $priceList */
$priceList = $objectManager->create('Elastic\Product\PriceList');

?>

<h1>
    <?php the_title(); ?>
</h1>

<?php if ($content) : ?>
<div class="content">
    <?php the_content(); ?>
</div>
<?php endif; ?>

<div class="div-table price-list">
    <div class="div-tbody">
        <?php foreach($priceList->getData() as $categoryPriceList) : ?>
            <?php if (empty($categoryPriceList['products'])) { continue; } ?>

            <div class="div-tr category">
                <div class="div-td tcol-10 title">
                    <?php echo $categoryPriceList['category']; ?>
                </div>
                <div class="div-td tcol-2 price">
                    &nbsp;
                </div>
            </div>

            <?php foreach($categoryPriceList['products'] as $productInfo) : ?>
                <div class="div-tr product">
                    <div class="div-td tcol-10 title">
                        <a href="<?php echo $productInfo['href']; ?>">
                            <?php echo $productInfo['title']; ?>
                        </a>
                    </div>
                    <div class="div-td tcol-2 price">
                        <?php echo $productInfo['price']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
