<?php

namespace App\Http\Livewire\Order;

use App\Model\Order;
use Livewire\Component;

class Collection extends Component
{
    public $items;
    public $data = [];
    public $show_change_modal = false;

    public $fields = [
        'title' => 'hi',
        'description' => 'ds'
    ];

    public function rules()
    {
        return [
            'data.title' => 'required|min:5',
            'data.description' => 'required'
        ];
    }

    public function render()
    {
        $this->items = Order::all();
        return view('livewire.order.collection');
    }

    public function resetInput()
    {
        array_splice($this->data, 0);
    }

    public function store()
    {
        $this->validate();

        $values = collect($this->data)->toArray();
        unset($values['id']);

        Order::create($this->data);

        $this->resetInput();
    }

    public function showChangeModal($value)
    {
        $this->show_change_modal = $value;
    }

    public function edit($id)
    {
        $this->data = Order::findOrFail($id)->toArray();
        $this->showChangeModal(true);
    }

    public function update($id = '')
    {
        $this->validate();

        $id = empty($id) ? @$this->data['id'] : $id;

        if (!$id) {
            // TODO: fail?
            return;
        }

        $id = $this->data['id'];
        $item = Order::findOrFail($id);
        $item->update($this->data);

        $this->resetInput();
        $this->showChangeModal(false);
    }

    public function destroy($id)
    {
        if (!$id) {
            return;
        }

        $item = Order::findOrFail($id);
        $item->delete();        
    }
}
