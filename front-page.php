<?php get_header(); ?>

<?php

use Brisum\Lib\Form\AbstractForm;
use Brisum\Lib\ObjectManager;
use Elastic\Product\ProductCategoryService;
use Elastic\Theme\ThemeService;

$objectManager = ObjectManager::getInstance();
/** @var ThemeService $themeService */
$themeService = $objectManager->get('Elastic\Theme\ThemeService');
/** @var ProductCategoryService $productCategoryService */
$productCategoryService = $objectManager->get('Elastic\Product\ProductCategoryService');
$gridCategories = $productCategoryService->getTopCategories();
/** @var AbstractForm $contactForm */
$contactForm = $objectManager->get('Elastic\Form\Contact\ContactForm');

the_post();
global $post;

$mapSettings = [
    'center' => [
        'x' => 30.5480,
        'y' => 50.3735
    ],
    'zoom' => 17,
    'scrollwheel' => false,
    'zoomControl' => true,
    'mapTypeControl' => false,
    'scaleControl' => false,
    'streetViewControl' => false,
    'rotateControl' => false,
    'fullscreenControl' => false,
    'styles' => [
        [
            "featureType" => "all",
            "stylers" => [
                ["saturation" => 0],
                ["hue" => "#e7ecf0"]
            ]
        ],
        [
            "featureType" => "road",
            "stylers" => [
                ["saturation" => -70]
            ]
        ],
        [
            "featureType" => "transit",
            "stylers" => [
                ["visibility" => "off"]
            ]
        ],
        [
            "featureType" => "poi",
            "stylers" => [
                ["visibility" => "off"]
            ]
        ],
        [
            "featureType" => "water",
            "stylers" => [
                ["visibility" => "simplified"],
                ["saturation" => -60]
            ]
        ]
    ]
];

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

<div class="product-categories">
    <div class="container">
        <h2 class="text-center">Товары</h2>

        <div class="row product-category-grid">
            <div class="col-12">
                <?php get_template_part('template-parts/product/product-category-grid'); ?>
            </div>
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

<div class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-5 contact-form">
                <?php echo $contactForm->content(); ?>
            </div>
            <div class="col-xs-12 col-md-7 contact-map">
                <div id="contact-map"
                     data-require-init="GoogleMapWidget"
                     data-key="AIzaSyDuz68DDNdiAru9vKwIef_De9lVhRwRsvg"
                     data-settings='<?php echo json_encode($mapSettings); ?>'>
                    <ul class="locations" style="display: none">
                        <li data-x="30.5480238"
                            data-y="50.3728194"
                            data-info-state="open">
                            <?php echo $themeService->getAddress(); ?>
                        </li>
                    </ul>
                    <div class="google-map-viewport" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>