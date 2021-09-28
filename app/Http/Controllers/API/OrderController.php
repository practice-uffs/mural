<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Orion\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $model = Order::class;
}
