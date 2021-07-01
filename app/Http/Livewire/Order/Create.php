<?php

namespace App\Http\Livewire\Order;

use Illuminate\Database\Eloquent\Model;

class Create extends \App\Http\Livewire\Crud\Main
{
    public Model $service;

    /**
     * 
     * 
     * @param array $modelCrudInfo
     * 
     * @return array
     */
    protected function prepareModelCrudInfo(array $modelCrudInfo) :array
    {
        return $modelCrudInfo;
        $poll = $this->service->poll;

        // TODO: melhor documentar ajuste de poll para os campos esperados pelo crud-comp.
        foreach($poll['fields'] as $index => $field) {
            $key = 'poll_' . $index;
            $poll['fields'][$key]['label'] = $field['text'] ?? '';
        }

        $modelCrudInfo['fields'] = array_merge($modelCrudInfo['fields'], $poll['fields']);

        return $modelCrudInfo;
    }

    /**
     * @param array $values
     * 
     * @return [type]
     */
    protected function prepareValuesForCreate(array $values) {
        return parent::prepareValuesForCreate($values);
        $result = parent::prepareValuesForCreate($values);
        $poll = $values['data'];

        foreach($poll['fields'] as $index => $field) {
            $key = 'poll_' . $index;
            $poll['fields'][$index]['answer'] = $values['text'];
        }

        return $values;
    }
}
