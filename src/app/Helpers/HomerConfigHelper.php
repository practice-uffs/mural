<?php

namespace App\Helpers;

class HomerConfigHelper
{
    public static $config = array(
        'title' => 'PRACTICE',
        'subtitle' => 'Web Feedback',
        'logo' => 'imgs/practice-logo.png',

        'header' => TRUE,
        'footer' => false,

        'theme' => 'default',

        'colors' => array(
            'light' => array(
                'highlight-primary' => '#007c9d',
                'highlight-secondary' => '#51abce',
                'highlight-hover' => '#007c9d',
                'background' => '#f5f5f5',
                'card-background' => '#ffffff',
                'text' => '#363636',
                'text-header' => '#ffffff',
                'text-title' => '#303030',
                'text-subtitle' => '#424242',
                'card-shadow' => 'rgba(0, 0, 0, 0.1)',
                'link-hover' => '#363636',
            ),

            'dark' => array(
                'highlight-primary' => '#007c9d',
                'highlight-secondary' => '#51abce',
                'highlight-hover' => '#007c9d',
                'background' => '#131313',
                'card-background' => '#2b2b2b',
                'text' => '#eaeaea',
                'text-header' => '#ffffff',
                'text-title' => '#fafafa',
                'text-subtitle' => '#f5f5f5',
                'card-shadow' => 'rgba(0, 0, 0, 0.4)',
                'link-hover' => '#ffdd57',
            ),
        ),

        'message' => array(
            'style' => 'is-dark',
            'title' => 'Lorem Ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ),

        'links' => array(
            array(
                'name' => 'Criar Item',
                'icon' => 'fas fa-plus-square',
                'url' => '/items/create',
            ),

            array(
                'name' => 'Wiki',
                'icon' => 'fas fa-book',
                'url' => 'https://www.wikipedia.org/',
            ),
        ),

        'services' => array(
            array(
                'name' => 'Application',
                'icon' => 'fas fa-cloud',
                'items' => array()
            )
        )
    );

    /**
     * Add a list of items to the items section
     * @param array $items [description]
     * @return array        [description]
     */
    public static function addItems($items)
    {
        foreach ($items as $item) {
            array_push(SELF::$config['services'][0]['items'], $item);
        }
    }

    /**
     * Add a single item to the items section
     * @param array $item [description]
     */
    public static function addItem($item)
    {
        array_push(SELF::$config['services'][0]['items'], $item);
    }

    /**
     * [getConfig description]
     * @return array        [description]
     */
    public static function getConfig()
    {
        return SELF::$config;
    }
}
