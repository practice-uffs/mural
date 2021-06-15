<?php

namespace App\Http\Livewire\Order;

use App\Model\Order;
use Livewire\Component;

class Collection extends Component
{
    public $items;
    public $data = [];
    public $selected_id;
    public $show_change_modal = false;

    public $fields = [
        'title' => 'hi',
        'description' => 'ds'
    ];

    protected $rules = [
        'data.title' => 'required|min:5',
        'data.description' => 'required'
    ];

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

        Order::create([
            'title' => $this->data['title'],
            'description' => $this->data['description']
        ]);

        $this->resetInput();
    }

    public function showChangeModal($value)
    {
        $this->show_change_modal = $value;
    }

    public function edit($id)
    {
        $record = Order::findOrFail($id);

        $this->selected_id = $id;
        $this->data['title'] = $record->title;
        $this->data['description'] = $record->description;
        
        $this->showChangeModal(true);
    }

    public function update($id)
    {
        $this->validate();

        if ($this->selected_id) {
            $record = Order::find($this->selected_id);
            $record->update([
                'title' => $this->data['title'],
                'description' => $this->data['description']
            ]);

            $this->resetInput();
            $this->showChangeModal(false);
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Order::where('id', $id);
            $record->delete();
        }
    }
}
