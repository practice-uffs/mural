<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
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
        $orders = auth()->user()->orders()
                                ->with('service.category')
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('order.list', [
            'orders' => $orders
        ]);
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
        $order->load([
            'service',
            'service.category',
            'user',
            'comments',
            'comments.user'
        ]);

        return view('order.show', [
            'order' => $order
        ]);
    }    
}
