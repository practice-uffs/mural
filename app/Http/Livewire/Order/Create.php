<?php

namespace App\Http\Livewire\Order;

use Illuminate\Database\Eloquent\Model;

class Create extends \App\Http\Livewire\Crud\Main
{
    public Model $service;

    protected function modelCreated(Model $model)
    {
    }

    protected function modelUpdated(Model $model)
    {
    }

    protected function addEulaAgreementFieldInfo(array & $modelCrudInfo) 
    {
        $eulaUrl = config('app.eula_url');

        $modelCrudInfo['fields']['eula'] = [
            'type' => 'checkbox',
            'label' => 'Aceite do Termo de Direitos Autorais',
            'placeholder' => 'Declaro que li e aceito os <a href="'.$eulaUrl.'" class="underline" target="_blank">Termos de Direitos Autoriais</a> do programa em relação à produção do conteúdo da minha solicitação.',
            'validation' => 'required|accepted',
        ];

        return $modelCrudInfo;
    }

    /**
     * 
     * 
     * @param array $modelCrudInfo
     * 
     * @return array
     */
    protected function prepareModelCrudInfo(array $modelCrudInfo) :array
    {
        if (empty($this->service->poll)) {
            // Não há campos extras para uma solicitação desse tipo de serviço,
            // então não precisamos fazer nada de em relação a isso.
        
            // Vamos apenas colocar o campo obrigatório de aceitar os nossos termos de 
            // direitos autorais
            $this->addEulaAgreementFieldInfo($modelCrudInfo);
            return $modelCrudInfo;
        }

        // Obtem as informações de campos extra que esse pedido deve conter
        // de acordo com as especificações do serviço.
        $poll = $this->service->poll;

        foreach($poll['fields'] as $index => $field) {
            // Como os campos extra não tem um nome (só indice), vamos criar
            // nomes no estilo "poll_0", "poll_1", etc, para cada um dos campos
            // extras. Na hora de salvar, buscamos por eles em particular
            // e guardamos em um campo separado do banco.
            $key = 'poll_' . $index;

            // Vamos colocar como label do campo o próprio texto usado para
            // criar essa pergunta.
            $modelCrudInfo['fields'][$key] = $poll['fields'][$index];
            $modelCrudInfo['fields'][$key]['label'] = $field['text'] ?? '';
            
            // Qualquer campo adicional é obrigatório
            $modelCrudInfo['fields'][$key]['validation'] = 'required';

            // Se o campo customizado possuir alguma marcação de tipo, usamos ela
            // como o tipo do campo do formulário a ser gerado.
            if (isset($field['data']['type'])) {
                $modelCrudInfo['fields'][$key]['type'] = $field['data']['type'];
            }
        }

        $this->addEulaAgreementFieldInfo($modelCrudInfo);
        return $modelCrudInfo;
    }

    /**
     * 
     * 
     * @param array $data
     * 
     * @return array
     */
    protected function prepareModelData(array $data) :array
    {
        if (empty($data['data'])) {
            return $data;
        }

        // Se existem campos extra para essa solicitacão, eles estarão
        // descritos dentro do campo 'data' como uma poll.
        $poll = $data['data'];

        foreach($poll['fields'] as $index => $field) {
            // Como os campos extra não tem um nome (só indice), então eles estão
            // nomeados no estilo "poll_0", "poll_1", etc, para cada um dos campos
            // extras. Temos que restaurar cada um deles agora como se fossem campos
            // do próprio modelo ($data).
            $key = 'poll_' . $index;

            // Vamos colocar no modelo o valor do campo da pergunta respondido pelo usuário.
            $data[$key] = @$poll['fields'][$index]['answer'];
        }

        return $data;
    }

    /**
     * @param array $values
     * 
     * @return [type]
     */
    protected function prepareValuesForCreate(array $values) {
        $ajustedValues = parent::prepareValuesForCreate($values);

        if (empty($this->service->poll)) {
            // Não há campos extras para uma solicitação desse tipo de serviços,
            // então não precisamos fazer nada de especial na criação do pedido.
            return $ajustedValues;
        }

        // Se chegamos aqui, é porque temos campos extra para esse pedido.
        // Vamos pegar o valor de cada um deles e colocar dentro do proprio
        // questionario usado para renderizar os campos extra.
        $poll = $this->service->poll;

        foreach($poll['fields'] as $index => $field) {
            $key = 'poll_' . $index;
            $poll['fields'][$index]['answer'] = $ajustedValues[$key];
        }

        $ajustedValues['data'] = $poll;
        return $ajustedValues;
    }

    /**
     * @param array $values
     * @param Model $item
     * 
     * @return [type]
     */
    protected function prepareValuesForUpdate(array $values, Model $item) {
        $ajustedValues = parent::prepareValuesForUpdate($values, $item);

        if (empty($values['data'])) {
            // Não há campos extras para essa solicitação, então não
            // precisamos fazer nada de especial na criação do pedido.
            return $ajustedValues;
        }

        // Se chegamos aqui, é porque temos campos extra para esse pedido.
        // Vamos pegar o valor de cada um deles e colocar dentro do proprio
        // questionario usado para renderizar os campos extra.
        $poll = $ajustedValues['data'];

        foreach($poll['fields'] as $index => $field) {
            $key = 'poll_' . $index;
            $poll['fields'][$index]['answer'] = $ajustedValues[$key];
        }

        $ajustedValues['data'] = $poll;

        return $ajustedValues;
    }
}
