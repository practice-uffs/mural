<?php

namespace App\Http\Livewire\Admin;

use CCUFFS\Text\PollFromText;
use Illuminate\Database\Eloquent\Model;

class Service extends \App\Http\Livewire\Crud\Main
{
    public $poll_view = '';
    
    /**
     * 
     * 
     * @param array $data
     * 
     * @return array
     */
    protected function prepareModelData(array $data) :array
    {
        if (empty($data['poll'])) {
            return $data;
        }

        // Se existem campos extra para esse serviço, eles estarão
        // descritos como um texto (uma listagem de perguntas linha a linha).
        // Vamos pegar esse tal texto e colocar no campo "poll" do serviço
        // para que o usuário possa editar o texto.
        $data['poll'] = $data['poll']['user_description'];

        // Colocamos no campo de visualização do questionário o "render"
        // do texto de perguntas do usuário.
        $this->poll_view = ''; // TODO: colocar o campo aqui.

        return $data;
    }

    /**
     * @param array $values
     * 
     * @return [type]
     */
    protected function prepareValuesForCreate(array $values) {
        $result = parent::prepareValuesForCreate($values);
        $poll = $values['poll']  ?? '';
        $result['poll'] = [
            'user_description' => $poll,
            'fields' => PollFromText::make($poll)
        ];
        return $result;
    }

    /**
     * @param array $values
     * @param Model $item
     * 
     * @return [type]
     */
    protected function prepareValuesForUpdate(array $values, Model $item) {
        $result = parent::prepareValuesForUpdate($values, $item);
        $poll = $values['poll'] ?? '';
        $result['poll'] = [
            'user_description' => $poll,
            'fields' => PollFromText::make($poll)
        ];
        return $result;
    }

    public function resetInput()
    {
        parent::resetInput();
        $this->poll_view = '';
    }

    public function updated($field, $value)
    {
        if ($field == 'data.poll') {
            // TODO: colocar um pouco de carinho aqui quando PollFromText::makeHtml() existir :D
            try {
                $poll = PollFromText::make($value);
                $this->poll_view = '';

                foreach($poll as $question) {
                    $type = $question['type'];
                    $this->poll_view .= $question['text'] . '<br />';

                    if (isset($question['data']['type'])) {
                        $type = $question['data']['type'];
                    }

                    switch($type) {
                        case 'input':
                        case 'file':
                            $this->poll_view .= '<input type="'.$type.'" class="py-1 mb-2">'; break;
                        case 'select':
                            $this->poll_view .= '<select class="py-1 mb-2">';
                            foreach($question['options'] as $value) { $this->poll_view .= "<option>$value</option>";}
                            $this->poll_view .= '</select>';
                            break;
                    }
                    $this->poll_view .= '<br />';
                }
            } catch (\Exception $e) {
                // Tivemos algum problema no parse do texto. Vamos deixar ele como estava.
                return;
            }
        }
    }
}
