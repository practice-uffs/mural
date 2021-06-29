<?php

namespace App\Http\Livewire\Order;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Show extends Component
{
    public Model $order;

    public function render()
    {
        return view('livewire.order.show');
    }
}
