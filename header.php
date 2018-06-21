<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
        ================================================== -->
    <link rel="shortcut icon" href="<?php echo THEME_URI; ?>/resources/assets/src/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?php echo THEME_URI; ?>/resources/assets/src/img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo THEME_URI; ?>/resources/assets/src/img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo THEME_URI; ?>/resources/assets/src/img/favicon/favicon-128.png" sizes="128x128" />

    <!-- Stylesheet
        ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TR54H2G');</script>
    <!-- End Google Tag Manager -->

<!--    <meta property="og:image" content="https://teen-levelup.com/wp-content/themes/teen-levelup/assets/src/img/intro-bg5.jpg" />-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<?php

use Brisum\Lib\ObjectManager;
use Elastic\Menu\MenuService;

$objectManager = ObjectManager::getInstance();
/** @var MenuService $menuService */
$menuService = $objectManager->get('Elastic\Menu\MenuService');

?>

<header>
    <div class="header-top clearfix">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php $menuService->theTopMenu(); ?>

                    <?php get_search_form(true); ?>
                </div>
            </nav>
        </div>
    </div>
    <div class="header-bottom clearfix">
        <div class="container">
            <a class="navbar-brand logo" href="<?php echo !is_front_page() ? home_url('/') : '#' ?>">
                <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/logo.svg?<?php echo THEME_VERSION; ?>"
                     alt="">
            </a>

            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse2" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse2">
                    <?php $menuService->theNavBar(); ?>
                </div>
            </nav>
        </div>
    </div>
</header>

