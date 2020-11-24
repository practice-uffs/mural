<?php

use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specifications')->insert([
            'img' => 'Recording.png',
            'title' => 'Áudio Promocional Simples',
            'description' => 'Apenas uma faixa de áudio com objetivo de anunciar e/ou divulgar algo, apenas uma chamada. Podem ainda ser adicionados pequenos efeitos e trilhas.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 5,
        ]);

        DB::table('specifications')->insert([
            'img' => 'audio_conversation.png',
            'title' => 'Áudio Expositivo Longo',
            'description' => 'Pode ser feito em 2 modelos: Áudios com até 3 pessoas e uma trilha musical, gravado de forma corrida, com edição simples (apenas cortes necessários), como podcasts simples',
            'deadline' => 7,
            'example' => '',
            'category_id' => 5,
        ]);

        DB::table('specifications')->insert([
            'img' => 'podcast.png',
            'title' => 'Áudio Institucional Promocional',
            'description' => 'Áudio curto com efeitos sonoros e até duas pessoas, para instruções e/ou procedimentos institucionais.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 5,
        ]);

        DB::table('specifications')->insert([
            'img' => 'video_influencer.png',
            'title' => 'Vídeo Aula Simples',
            'description' => 'Vídeo com apenas o interlocutor em plano principal. Há a possibilidade de serem incluídos outros materiais ao longo do vídeo, como outros vídeos, textos e imagens. Vídeo e materiais enviados pelo solicitante.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'draw.png',
            'title' => 'Hand Drawn Vídeo',
            'description' => 'Animação ilustrando a explicação da fala do narrador ou o próprio narrador escrevendo em tempo real, com ou sem segundo vídeo ao lado mostrando o narrador. Os vídeos e/ou instruções devem ser enviadas pelo solicitante.',
            'deadline' => 7,
            'example' => 'https://www.youtube.com/watch?v=kcft5B1c-JE&feature=youtu.be',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'img_composition.png',
            'title' => 'Composição de Imagens',
            'description' => 'Vídeo compilado de imagens sobre o tema e com uma narração explicativa. Pode incluir vídeo mostrando o narrador. As imagens e a narração devem ser enviadas pelo solicitante',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'call.png',
            'title' => 'Vídeo com Slides',
            'description' => 'Vídeo dos slides no plano principal com a narração explicativa. Pode incluir vídeo mostrando o narrador. Os vídeos e materiais devem ser enviados pelo solicitante.',
            'deadline' => 7,
            'example' => 'https://www.youtube.com/watch?v=KxjHA3gxcAM',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'slides.png',
            'title' => 'Vídeo com Slides em Estúdio',
            'description' => 'Vídeo do narrador no estúdio aparecendo por completo e os slides sendo projetados ao lado dele. O vídeo será gravado no estúdio do PRACTICE e os slides devem ser enviados pelo solicitante.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'tutorial.png',
            'title' => 'Vídeo Tutorial',
            'description' => 'Vídeo explicativo ensinando passo a passo da utilização de uma ferramenta e/ou software. Pode haver segundo vídeo com a imagem do narrador ou apenas o vídeo tutorial. Os vídeos devem ser enviados pelo solicitante.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'vid_composition.png',
            'title' => 'Composição de Vídeos',
            'description' => 'Compilação de diversos vídeos e com uma narração explicativa, com a possibilidade de ter a imagem do narrador ao lado. Os vídeos devem ser enviados pelo solicitante. ',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'animating.png',
            'title' => 'Animação Curta Explicativa',
            'description' => 'Uma vídeo animado de curta duração sobre algum tema de explicação rápida com uma narração. A narração e as instruções devem ser enviadas pelo solicitante.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'online_ad.png',
            'title' => 'Vídeo Curto Promocional',
            'description' => 'Vídeo comercial para divulgação de eventos, pode ser feito apenas mostrando o apresentador ou podem conter outros elementos como pequenas animações. O vídeo pode ser enviado pelo solicitante ou gravado no estúdio do PRACTICE.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'alert.png',
            'title' => 'Vídeo de aviso',
            'description' => 'Um vídeo curto para avisar/alertar/lembrar sobre algum ocorrido e/ou informação importante acerca da universidade. O vídeo de aviso pode conter efeitos sonoros e transições rápidas, que deixam o anúncio mais dinâmico. O vídeo pode ser enviado pelo solicitante ou gravado no estúdio do PRACTICE.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'img' => 'cartilha.png',
            'title' => 'Cartilha',
            'description' => 'Uma cartilha reúne informações elementares ou instruções sobre um determinado tema em um formato dinâmico. O texto é curto e direto e normalmente são utilizadas muitas imagens, figuras e gráficos para auxiliar na apresentação do tema.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'img' => 'manual.png',
            'title' => 'Manual',
            'description' => 'Um manual apresenta instruções para realização de algo (tarefa, montagem de produto, estabelecimento de rotina, etc). O texto tem uma ordem de passos que deve ser seguido para que se obtenha sucesso na atividade que o texto orienta.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'img' => 'panfleto.png',
            'title' => 'Panfleto',
            'description' => 'O panfleto é um meio de divulgação de algo. O texto é sucinto e direto e tem por objetivo apresentar o básico sobre o tema para o leitor.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'img' => 'cartaz.png',
            'title' => 'Cartaz',
            'description' => 'O cartaz tem por objetivo divulgar algo ou alguém, escrito de forma resumida e direta. Devem ser apresentadas em um cartaz apenas as informações fundamentais do que se pretende divulgar (nome, apresentador e data, se for um evento, por exemplo). Utiliza de linguagem simples e direta e recursos visuais (design e imagens) para chamar atenção do leitor.',
            'deadline' => 7,
            'example' => '',
            'category_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'img' => 'pack_simples.png',
            'title' => 'Identidade Visual Simples',
            'description' => 'Está precisando tornar seu conteúdo mais atraente? O pacote de identidade visual contem elementos a serem utilizados para trazer uma estética visual ao seu conteúdo, este pacote contém: símbolo, logotipo e paleta de cores;',
            'deadline' => 15,
            'example' => '',
            'category_id' => 8,
        ]);

        DB::table('specifications')->insert([
            'img' => 'pack_completo.png',
            'title' => 'Identidade Visual Completa',
            'description' => 'Está precisando tornar seu conteúdo mais atraente? O pacote de identidade visual contem elementos a serem utilizados para trazer uma estética visual ao seu conteúdo, este pacote contém: símbolo, logotipo, paleta de cores, marca d’água e padronagem',
            'deadline' => 15,
            'example' => '',
            'category_id' => 8,
        ]);

        DB::table('specifications')->insert([
            'img' => 'event.png',
            'title' => 'Evento virtual',
            'description' => 'Suporte para a realização de semanas acadêmicas e eventos virtuais em geral?',
            'deadline' => 7,
            'example' => '',
            'category_id' => 9,
        ]);

        DB::table('specifications')->insert([
            'img' => 'estudio.png',
            'title' => 'Gravação em estúdio',
            'description' => 'Você precisa produzir vídeos com uma estrutura peculiar ou com recursos muito específicos? O serviço de estúdo do programa pode te ajudar. Com uma infra-estutura preparada para isso!',
            'deadline' => 7,
            'example' => '',
            'category_id' => 10,
        ]);

    }
}
