<?php get_header(); ?>

<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\ProductCategoryService;

$objectManager = ObjectManager::getInstance();
/** @var ProductCategoryService $productCategoryService */
$productCategoryService = $objectManager->get('Elastic\Product\ProductCategoryService');
$gridCategories = $productCategoryService->getTopCategories();

the_post();
global $post;

?>

<div style="overflow: hidden; max-width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-5 short-content">
                <h1><?php the_title(); ?></h1>
                <p>
                    <?php echo get_post_meta($post->ID, 'short_content', 1); ?>
                </p>
                <div class="catalog-wrapper">
                    <a href="/product/" class="btn btn-primary">
                        Каталог
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-7">
                <div class="slick-wrapper">
                    <?php $objectManager->create('Elastic\Theme\VisualComponent\MainSlider')->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center">Товары</h2>

    <div class="row product-category-grid">
        <div class="col-12">
            <?php get_template_part('template-parts/product/product-category-grid'); ?>
        </div>
    </div>
</div>

<div class="about_us">
    <div class="container">
        <h3 class="text-center">О нас</h3>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="about-item">
                    <span class="icon store"></span>
                    Располагает собственным складом продукции упаковочно запаечного оборудования,
                    и мы сразу сможем Вам дать четкий ответ по наличию и по времени поставки оборудования
                    которое Вас заинтересовало.
                    Большинство оборудования мы изготавливаем сами,
                    как серийные так и под заказ под ваши потребности!
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="about-item">
                    <span class="icon world-cooperation"></span>
                    Тесно сотрудничает с мировыми производителями оборудования
                    и сможет предложить только лучшее из лучших оборудование на мировом рынке упаковки,
                    а также вспомогательного оборудования для вашего производства.
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="about-item">
                    <span class="icon task"></span>
                    Если Вы не смогли найти или подобрать интересующее Вас оборудование это не беда,
                    дай те нам техническое задание и мы сможем его найти.
                    А если нету, мы для Вас его сделаем и скажем на когда оно будет готово.
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="about-item">
                    <span class="icon delivery"></span>
                    Уверенно поставляем упаковочное запаечное оборудование крупным фирмам
                    которые занимаются упаковкой во всех сферах деятельности что связано
                    с упаковкой какого либо продукта.
                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>