<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Order extends Component
{
    public $data, $title, $description, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = \App\Model\Order::all();
        return view('livewire.order');
    }

    private function resetInput()
    {
        $this->title = null;
        $this->description = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|min:5',
            'description' => 'required'
        ]);
        \App\Model\Order::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = \App\Model\Order::findOrFail($id);
        $this->selected_id = $id;
        $this->title = $record->title;
        $this->description = $record->description;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'title' => 'required|min:5',
            'description' => 'required'
        ]);
        if ($this->selected_id) {
            $record = \App\Model\Order::find($this->selected_id);
            $record->update([
                'title' => $this->title,
                'description' => $this->description
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = \App\Model\Order::where('id', $id);
            $record->delete();
        }
    }
}
