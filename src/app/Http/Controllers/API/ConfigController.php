<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

use App\Helpers\HomerConfigHelper;

use App\Item;


class ConfigController extends Controller
{
    /**
     * Generates homer configuration file
     * @return string
     */
    public function homerConfig()
    {
        $items = Item::whereNull('parent_id') -> get();
        
        $itemsToShow = array();

        foreach ($items as $item) {
            $newItem = array(
                'name' => $item -> title,
                'subtitle' => $item -> description,
                'url' => '/items/' . $item -> id,
            );

            HomerConfigHelper::addItem($newItem);
        }

        $config = HomerConfigHelper::getConfig();

        return Yaml::dump($config);
    }
}
