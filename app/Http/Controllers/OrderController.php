<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('order.list');
    }

    /**
     * Show page to place a new order
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Service $service)
    {
        return view('order.create', [
            'service' => $service
        ]);
    }

    /**
     * Show a particular order
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Order $order)
    {
        return view('order.show', [
            'order' => $order
        ]);
    }    
}
