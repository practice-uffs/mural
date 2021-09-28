<?php

use Illuminate\Database\Seeder;
use App\Models\Idea;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idea::create(['title' => 'Informação via Telegram', 'description' => 'Gostaria de poder consultar informações sobre a UFFS a partir de um conversa no Telegram.', 'user_id' => 1]);
        Idea::create(['title' => 'Escanear documentos pelo celular', 'description' => 'Existir um aplicativo que permita escanear documentos através do celular de uma forma fácil e rápida.', 'user_id' => 1]);
        Idea::create(['title' => 'Assistente de e-mail', 'description' => 'Um bot que monitore a conta de e-mail da coordenação de curso e responda as perguntas mais frequentes.', 'user_id' => 1]);
        Idea::create(['title' => 'Rastreio de objetos emprestados', 'description' => 'Ao retirar um material na Secretaria Acadêmica, o servidor precisa anotar o número do patrimônio em um carderno. Seria mais fácil (e eficiente) se apenas uma foto fosse tirada do objeto e o sistema descobrisse o que é ele e quem está retirando.', 'user_id' => 1]);
        Idea::create(['title' => 'Relatório de usuários', 'description' => 'Ao fazer um relatório de usuários, seria útil ter um bot que mostrasse todos os usuários da UFFS, com suas informações mais importantes, como nome, coordenação de curso, coordenação de biblioteca, coordenação de secretaria, etc.', 'user_id' => 1]);
        Idea::create(['title' => 'Relatório de bibliotecas', 'description' => 'Algo que mostrasse todas as bibliotecas da UFFS, com suas informações mais importantes, como endereço, coordenação, etc.', 'user_id' => 1]);
        Idea::create(['title' => 'Monitoramento de ônibus', 'description' => 'Monitorar a câmera de segurança da UFFS e identificar quando um ônibus entra no campus.', 'user_id' => 1]);
        Idea::create(['title' => 'Horário de ônibus no Telegram', 'description' => 'Obter os horários de ônibus das linhas da UFFS através de um conversa no Telegram.', 'user_id' => 1]);
        Idea::create(['title' => 'Enquetes a partir de texto', 'description' => 'Um sistema onde eu possa escrever perguntas e o resultado é um formulário online (tipo o Google Forms).', 'user_id' => 1]);
        Idea::create(['title' => 'Informação sobre a UFFS', 'description' => 'Informações sobre a UFFS, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre o campus', 'description' => 'Informações sobre o campus, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre o curso', 'description' => 'Informações sobre o curso, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre o coordenador', 'description' => 'Informações sobre o coordenador, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre os alunos', 'description' => 'Informações sobre os alunos, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre os docentes', 'description' => 'Informações sobre os docentes, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre os funcionários', 'description' => 'Informações sobre os funcionários, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre os serviços', 'description' => 'Informações sobre os serviços, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre os horários', 'description' => 'Informações sobre os horários, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Informação sobre os horários das linhas', 'description' => 'Informações sobre os horários das linhas, como endereço, horários, etc.', 'user_id' => 2]);
        Idea::create(['title' => 'Avaliação de notas', 'description' => 'Uma ferramenta que permita que os alunos sejam avaliados de acordo com a sua nota no trabalho.', 'user_id' => 1]);
        Idea::create(['title' => 'Avaliação de trabalhos', 'description' => 'Uma ferramenta que permita que os alunos sejam avaliados de acordo com a sua nota no trabalho.', 'user_id' => 1]);
        Idea::create(['title' => 'Ferramenta para fazer lives', 'description' => 'Uma alternativa para softwares pagos para criação de eventos online onde eu apenas acesse uma página, clique em um botão e esteja transmitindo um evento ao vivo para o Youtube.', 'user_id' => 1]);
        Idea::create(['title' => 'Cadastro de pessoas', 'description' => 'Uma ferramenta para cadastrar pessoas que irão ao evento. Será possível cadastrar pessoas que já estão no evento, ou pessoas que irão apenas para verificar se estão presentes.', 'user_id' => 1]);
        Idea::create(['title' => 'Assistente virtual', 'description' => 'Uma assistente virtual da UFFS que tenha conhecimento de vários processos e documentos e possa responder perguntas de uma forma intuitiva.', 'user_id' => 1]);
    }
}
