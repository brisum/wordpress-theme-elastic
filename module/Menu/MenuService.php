<?php

namespace Elastic\Menu;

use Brisum\Lib\ObjectManager;

class MenuService
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * MenuService constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function theTopMenu()
    {
        $menu = wp_nav_menu([
            'theme_location'  => 'top_menu',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => false,
            'fallback_cb'     => '',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav mr-auto">%3$s</ul>',
            'depth'           => 0,
            'walker'          => $this->objectManager->get('Brisum\Wordpress\Menu\WalkerBootstrap')
        ]);

        ?>

        <?php echo str_replace('menu-item', 'nav-item menu-item', $menu); ?>

        <?php
    }

    /**
     * return @void
     */
    public function theNavBar()
    {
        $menu = wp_nav_menu([
            'theme_location'  => 'navbar_menu',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'list-group',
            'menu_id'         => '',
            'echo'            => false,
            'fallback_cb'     => '',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav mr-auto">%3$s</ul>',
            'depth'           => 0,
            'walker'          => $this->objectManager->get('Brisum\Wordpress\Menu\WalkerBootstrap')
        ]);

        ?>

        <?php echo str_replace('menu-item', 'nav-item menu-item', $menu); ?>

        <?php
    }
}
