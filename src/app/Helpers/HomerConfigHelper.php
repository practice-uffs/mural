<?php

namespace App\Helpers;

class HomerConfigHelper
{
    private static $itemsSectionCreated = false;

    public static $config = array(
        'title' => 'PRACTICE',
        'subtitle' => 'Web Feedback',

        'header' => TRUE,
        'footer' => false,

        'theme' => 'default',

        'colors' => array(
            'light' => array(
                'highlight-primary' => '#007c9d',
                'highlight-secondary' => '#00506f',
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
                'highlight-primary' => '#00506f',
                'highlight-secondary' => '#007c9d',
                'highlight-hover' => '#00506f',
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
            'title' => 'Sobre',
            'content' => 'Essa página contém todas as ideias, críticas e afins que os membros da comunidade acadêmica tem e gostariam de socializar com todos, inclusive a equipe PRACTICE.',
        ),

        'links' => array(
            array(
                'name' => 'Nova Ideia',
                'icon' => 'far fa-lightbulb',
                'url' => '/items/create',
            ),
            array(
                'name' => 'Solicitar Serviço',
                'icon' => 'fas fa-concierge-bell',
                'url' => '/services/create',
            ),
        ),

        'services' => array()
    );

    private static function createItemsSection()
    {
        if (! SELF::$itemsSectionCreated) {
            array_push(SELF::$config['services'], array(
                'name' => 'Ideias e Sugestões Criadas',
                'icon' => 'fas fa-clipboard-list',
                'items' => array()
            ));

            SELF::$itemsSectionCreated = true;
        }
    }

    /**
     * Add a list of items to the items section
     * @param array $items [description]
     * @return array        [description]
     */
    public static function addItems($items)
    {
        SELF::createItemsSection();

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
        SELF::createItemsSection();

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
