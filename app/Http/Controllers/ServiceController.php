<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Service;

class ServiceController extends Controller
{
    /**
     * Show available services.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = [];
        $services = Service::where('is_active', true)->get();

        foreach(Category::where('is_active', true)->get() as $category) {
            $items[] = [
                'category' => $category,
                'services' => $services->filter(function($service) use ($category) {
                    return $service->category_id == $category->id;
                })
            ];
        }

        return view('services', [
            'items' => $items
        ]);
    }
}
