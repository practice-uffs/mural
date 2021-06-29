<?php

use App\Model\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'img_url' => 'Recording.png',
            'name' => 'Áudio Promocional Simples',
            'description' => 'Apenas uma faixa de áudio com objetivo de anunciar e/ou divulgar algo, apenas uma chamada. Podem ainda ser adicionados pequenos efeitos e trilhas.',
            'work_days' => 7,
            'category_id' => 1,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'audio_conversation.png',
            'name' => 'Áudio Expositivo Longo',
            'description' => 'Pode ser feito em 2 modelos: Áudios com até 3 pessoas e uma trilha musical, gravado de forma corrida, com edição simples (apenas cortes necessários), como podcasts simples',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'podcast.png',
            'name' => 'Áudio Institucional Promocional',
            'description' => 'Áudio curto com efeitos sonoros e até duas pessoas, para instruções e/ou procedimentos institucionais.',
            'work_days' => 7,
            'category_id' => 1,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'video_influencer.png',
            'name' => 'Vídeo Aula Simples',
            'description' => 'Vídeo com apenas o interlocutor em plano principal. Há a possibilidade de serem incluídos outros materiais ao longo do vídeo, como outros vídeos, textos e imagens. Vídeo e materiais enviados pelo solicitante.',
            'work_days' => 7,
            'category_id' => 6,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'draw.png',
            'name' => 'Hand Drawn Vídeo',
            'description' => 'Animação ilustrando a explicação da fala do narrador ou o próprio narrador escrevendo em tempo real, com ou sem segundo vídeo ao lado mostrando o narrador. Os vídeos e/ou instruções devem ser enviadas pelo solicitante. https://www.youtube.com/watch?v=kcft5B1c-JE&feature=youtu.be',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'img_composition.png',
            'name' => 'Composição de Imagens',
            'description' => 'Vídeo compilado de imagens sobre o tema e com uma narração explicativa. Pode incluir vídeo mostrando o narrador. As imagens e a narração devem ser enviadas pelo solicitante',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'call.png',
            'name' => 'Vídeo com Slides',
            'description' => 'Vídeo dos slides no plano principal com a narração explicativa. Pode incluir vídeo mostrando o narrador. Os vídeos e materiais devem ser enviados pelo solicitante. https://www.youtube.com/watch?v=KxjHA3gxcAM',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'slides.png',
            'name' => 'Vídeo com Slides em Estúdio',
            'description' => 'Vídeo do narrador no estúdio aparecendo por completo e os slides sendo projetados ao lado dele. O vídeo será gravado no estúdio do PRACTICE e os slides devem ser enviados pelo solicitante.',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'tutorial.png',
            'name' => 'Vídeo Tutorial',
            'description' => 'Vídeo explicativo ensinando passo a passo da utilização de uma ferramenta e/ou software. Pode haver segundo vídeo com a imagem do narrador ou apenas o vídeo tutorial. Os vídeos devem ser enviados pelo solicitante.',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'vid_composition.png',
            'name' => 'Composição de Vídeos',
            'description' => 'Compilação de diversos vídeos e com uma narração explicativa, com a possibilidade de ter a imagem do narrador ao lado. Os vídeos devem ser enviados pelo solicitante. ',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'animating.png',
            'name' => 'Animação Curta Explicativa',
            'description' => 'Uma vídeo animado de curta duração sobre algum tema de explicação rápida com uma narração. A narração e as instruções devem ser enviadas pelo solicitante.',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'online_ad.png',
            'name' => 'Vídeo Curto Promocional',
            'description' => 'Vídeo comercial para divulgação de eventos, pode ser feito apenas mostrando o apresentador ou podem conter outros elementos como pequenas animações. O vídeo pode ser enviado pelo solicitante ou gravado no estúdio do PRACTICE.',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'alert.png',
            'name' => 'Vídeo de aviso',
            'description' => 'Um vídeo curto para avisar/alertar/lembrar sobre algum ocorrido e/ou informação importante acerca da universidade. O vídeo de aviso pode conter efeitos sonoros e transições rápidas, que deixam o anúncio mais dinâmico. O vídeo pode ser enviado pelo solicitante ou gravado no estúdio do PRACTICE.',
            'work_days' => 7,
            'category_id' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'cartilha.png',
            'name' => 'Cartilha',
            'description' => 'Uma cartilha reúne informações elementares ou instruções sobre um determinado tema em um formato dinâmico. O texto é curto e direto e normalmente são utilizadas muitas imagens, figuras e gráficos para auxiliar na apresentação do tema.',
            'work_days' => 7,
            'category_id' => 3,
            'is_available' => false,
        ]);

        Service::create([
            'img_url' => 'manual.png',
            'name' => 'Manual',
            'description' => 'Um manual apresenta instruções para realização de algo (tarefa, montagem de produto, estabelecimento de rotina, etc). O texto tem uma ordem de passos que deve ser seguido para que se obtenha sucesso na atividade que o texto orienta.',
            'work_days' => 7,
            'category_id' => 3,
            'is_available' => false,
        ]);

        Service::create([
            'img_url' => 'panfleto.png',
            'name' => 'Panfleto',
            'description' => 'O panfleto é um meio de divulgação de algo. O texto é sucinto e direto e tem por objetivo apresentar o básico sobre o tema para o leitor.',
            'work_days' => 7,
            'category_id' => 3,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'cartaz.png',
            'name' => 'Cartaz',
            'description' => 'O cartaz tem por objetivo divulgar algo ou alguém, escrito de forma resumida e direta. Devem ser apresentadas em um cartaz apenas as informações fundamentais do que se pretende divulgar (nome, apresentador e data, se for um evento, por exemplo). Utiliza de linguagem simples e direta e recursos visuais (design e imagens) para chamar atenção do leitor.',
            'work_days' => 7,
            'category_id' => 3,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'pack_simples.png',
            'name' => 'Identidade Visual Simples',
            'description' => 'Está precisando tornar seu conteúdo mais atraente? O pacote de identidade visual contem elementos a serem utilizados para trazer uma estética visual ao seu conteúdo, este pacote contém: símbolo, logotipo e paleta de cores;',
            'work_days' => 15,
            'category_id' => 4,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'pack_completo.png',
            'name' => 'Identidade Visual Completa',
            'description' => 'Está precisando tornar seu conteúdo mais atraente? O pacote de identidade visual contem elementos a serem utilizados para trazer uma estética visual ao seu conteúdo, este pacote contém: símbolo, logotipo, paleta de cores, marca d’água e padronagem',
            'work_days' => 15,
            'category_id' => 4,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'event.png',
            'name' => 'Evento virtual',
            'description' => 'Suporte para a realização de semanas acadêmicas e eventos virtuais em geral?',
            'work_days' => 7,
            'category_id' => 5,
            'is_available' => true,
        ]);

        Service::create([
            'img_url' => 'estudio.png',
            'name' => 'Gravação em estúdio',
            'description' => 'Você precisa produzir vídeos com uma estrutura peculiar ou com recursos muito específicos? O serviço de estúdo do programa pode te ajudar. Com uma infra-estutura preparada para isso!',
            'work_days' => 7,
            'category_id' => 6,
            'is_available' => false,
        ]);

    }
}
