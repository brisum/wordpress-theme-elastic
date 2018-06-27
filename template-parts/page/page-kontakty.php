<?php

use Brisum\Lib\Form\AbstractForm;
use Brisum\Lib\ObjectManager;
use Elastic\Theme\ThemeService;

global $post;
$objectManager = ObjectManager::getInstance();
/** @var ThemeService $themeService */
$themeService = $objectManager->get('Elastic\Theme\ThemeService');
/** @var AbstractForm $contactForm */
$contactForm = $objectManager->get('Elastic\Form\Contact\ContactForm');

?>

<h1>
    <?php the_title(); ?>
</h1>

<div class="content">
    <?php the_content(); ?>

    <div class="info">
        <p class="address">
            Адрес: <?php echo $themeService->getAddress(); ?>
        </p>
        <p class="phone">
            Телефон: <?php echo implode(', ', $themeService->getPhones()); ?>
        </p>
        <p class="email">
            Email: <?php echo $themeService->getEmail(); ?>
        </p>
    </div>

    <div class="map">
        <a class="dg-widget-link"
           href="http://2gis.ua/kiev/firm/70000001029964675/center/30.545061,50.375293/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть
            на карте Києва</a>
        <div class="dg-widget-link">
            <a href="http://2gis.ua/kiev/center/30.545061,50.375293/zoom/16/routeTab/rsType/bus/to/30.545061,50.375293╎Упаковка Топ, компания?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти
                проезд до Упаковка Топ, компания</a></div>
        <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
        <script charset="utf-8">new DGWidgetLoader({
                "width": '100%',
                "height": 500,
                "borderColor": "#a3a3a3",
                "pos": {"lat": 50.376000, "lon": 30.545061, "zoom": 16},
                "opt": {"city": "kiev"},
                "org": [{"id": "70000001029964675"}]
            });</script>
        <noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в
            настройках вашего браузера.
        </noscript>
    </div>

    <div class="contact-form">
        <?php echo $contactForm->content(); ?>
    </div>
</div>
