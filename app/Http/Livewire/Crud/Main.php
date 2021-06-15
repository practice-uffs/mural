<?php

namespace App\Http\Livewire\Crud;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Main extends Component
{
    public Collection $items;
    public array $data = [];
    public array $fields = []; // see __constructor
    public array $editing = [];
    
    public bool $show_create_panel = true;
    public bool $show_list = true;

    public string $model = ''; // Ex. '\App\Model\Order'

    public function fields()
    {
        return [
            'title' => [
                'label' => 'Título',
                'placeholder' => 'titleplace',
                'validation' => 'required|min:5',
                'column' => true
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'descriptionplace',
                'column' => true
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
            $fields[$key]['property'] = $expectedKey;
        }

        return $fields;
    }

    public function render()
    {
        $this->items = $this->model::all();
        return view('livewire.crud.main');
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

        $this->model::create($this->data);

        $this->resetInput();
    }

    public function showCreatePanel($value)
    {
        $this->show_create_panel = $value;
    }

    public function hideInlineEdit()
    {
        $this->editing = null;
    }

    public function showInlineEdit($id)
    {
        $this->editing = $id;
    }

    public function cancel()
    {
        $this->resetInput();
        $this->hideInlineEdit();
    }

    public function edit($id)
    {
        $this->data = $this->model::findOrFail($id)->toArray();
        $this->showInlineEdit($id);
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
        $item = $this->model::findOrFail($id);
        $item->update($this->data);

        $this->resetInput();
        $this->hideInlineEdit();
    }

    public function destroy($id)
    {
        if (!$id) {
            return;
        }

        $item = $this->model::findOrFail($id);
        $item->delete();        
    }
}
