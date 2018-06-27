<?php

namespace Elastic\Theme;

class ThemeService
{
    /**
     * @return array
     */
    public function getPhones()
    {
        return array_map('trim', explode(",", get_option('theme_phones')));
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return trim(get_option('theme_email'));
    }

    public function getAddress()
    {
        return trim(get_option('theme_address'));
    }
}
