<?php

namespace App\Http\Livewire\Order;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Status extends Component
{
    public Model $order;

    public function render()
    {
        return view('livewire.order.status');
    }
}
