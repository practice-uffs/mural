<?php

namespace App\Helpers;

class HomerConfigHelper
{
    public static $config = array(
        'title' => 'Demo dashboard',
        'subtitle' => 'Homer',
        'logo' => 'logo.png',

        'header' => TRUE,

        'theme' => 'default',

        'colors' => array(
            'light' => array(
                'highlight-primary' => '#3367d6',
                'highlight-secondary' => '#4285f4',
                'highlight-hover' => '#5a95f5',
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
                'highlight-primary' => '#3367d6',
                'highlight-secondary' => '#4285f4',
                'highlight-hover' => '#5a95f5',
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
            'title' => '👋 Demo !',
            'content' => 'This is a dummy homepage demo. <br/> Find more information on <a href="https://github.com/bastienwirtz/homer">github.com/bastienwirtz/homer</a>',
        ),

        'links' => array(
            array(
                'name' => 'Contribute',
                'icon' => 'fab fa-github',
                'url' => 'https://github.com/bastienwirtz/homer',
                'target' => '_blank',
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
