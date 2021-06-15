<?php

namespace App\Http\Livewire\Order;

use App\Model\Order;
use Livewire\Component;

class Collection extends Component
{
    public $items;
    public $data = [];
    public $fields = []; // see __constructor
    public $show_change_modal = false;

    public function fields()
    {
        return [
            'title' => [
                'label' => 'Título',
                'placeholder' => 'titleplace',
                'validation' => 'required|min:5'
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'descriptionplace'
            ],
        ];
    }

    public function __construct()
    {
        $this->fields = $this->createPublicFieldsProperty();
    }

    protected function rules()
    {
        $rules = [];

        foreach ($this->fields() as $key => $info) {
            if (isset($info['validation'])) {
                $key = 'data.' . $key;
                $rules[$key] = $info['validation'];
            }
        }

        return $rules;
    }

    protected function createPublicFieldsProperty()
    {
        if (count($this->fields()) == 0) {
            return;
        }

        $fields = [];

        foreach($this->fields() as $expectedKey => $info) {
            $key = 'data.' . $expectedKey;
            $fields[$key] = $info;
        }

        return $fields;
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
