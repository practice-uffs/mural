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
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->get();

        $items[] = [
            'category' => [
                'name' => 'Populares',
                'description' => 'Esses serviços são solicitados frequentemente pela comunidade acadêmica. Organizamos eles no mesmo lugar para facilitar o seu acesso.',
                'slug' => 'popular',
                'color' => 'pink-300',
            ],
            'services' => $services->filter(function($service) {
                return $service->order < 0;
            })
        ];

        foreach(Category::where('is_active', true)->get() as $category) {
            $items[] = [
                'category' => $category,
                'services' => $services->filter(function($service) use ($category) {
                    return $service->category_id == $category->id;
                })
            ];
        }

        return view('services', [
            'items' => $items,
            'categories' => Category::all()
        ]);
    }
}
