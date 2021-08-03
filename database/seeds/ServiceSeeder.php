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
            'eval_days' => 3,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />',
            'color' => 'red-400',            
        ]);

        Service::create([
            'img_url' => 'audio_conversation.png',
            'name' => 'Áudio Expositivo Longo',
            'description' => 'Pode ser feito em 2 modelos: Áudios com até 3 pessoas e uma trilha musical, gravado de forma corrida, com edição simples (apenas cortes necessários), como podcasts simples',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />',
            'color' => 'red-400',
        ]);

        Service::create([
            'img_url' => 'podcast.png',
            'name' => 'Áudio Institucional Promocional',
            'description' => 'Áudio curto com efeitos sonoros e até duas pessoas, para instruções e/ou procedimentos institucionais.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 1,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />',
            'color' => 'red-400',
        ]);

        Service::create([
            'img_url' => 'video_influencer.png',
            'name' => 'Vídeo Aula Simples',
            'description' => 'Vídeo com apenas o interlocutor em plano principal. Há a possibilidade de serem incluídos outros materiais ao longo do vídeo, como outros vídeos, textos e imagens. Vídeo e materiais enviados pelo solicitante.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'draw.png',
            'name' => 'Hand Drawn Vídeo',
            'description' => 'Animação ilustrando a explicação da fala do narrador ou o próprio narrador escrevendo em tempo real, com ou sem segundo vídeo ao lado mostrando o narrador. Os vídeos e/ou instruções devem ser enviadas pelo solicitante. https://www.youtube.com/watch?v=kcft5B1c-JE&feature=youtu.be',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => false,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'img_composition.png',
            'name' => 'Composição de Imagens',
            'description' => 'Vídeo compilado de imagens sobre o tema e com uma narração explicativa. Pode incluir vídeo mostrando o narrador. As imagens e a narração devem ser enviadas pelo solicitante',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'call.png',
            'name' => 'Vídeo com Slides',
            'description' => 'Vídeo dos slides no plano principal com a narração explicativa. Pode incluir vídeo mostrando o narrador. Os vídeos e materiais devem ser enviados pelo solicitante. https://www.youtube.com/watch?v=KxjHA3gxcAM',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'slides.png',
            'name' => 'Vídeo com Slides em Estúdio',
            'description' => 'Vídeo do narrador no estúdio aparecendo por completo e os slides sendo projetados ao lado dele. O vídeo será gravado no estúdio do PRACTICE e os slides devem ser enviados pelo solicitante.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'tutorial.png',
            'name' => 'Vídeo Tutorial',
            'description' => 'Vídeo explicativo ensinando passo a passo da utilização de uma ferramenta e/ou software. Pode haver segundo vídeo com a imagem do narrador ou apenas o vídeo tutorial. Os vídeos devem ser enviados pelo solicitante.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'vid_composition.png',
            'name' => 'Composição de Vídeos',
            'description' => 'Compilação de diversos vídeos e com uma narração explicativa, com a possibilidade de ter a imagem do narrador ao lado. Os vídeos devem ser enviados pelo solicitante. ',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'animating.png',
            'name' => 'Animação Curta Explicativa',
            'description' => 'Uma vídeo animado de curta duração sobre algum tema de explicação rápida com uma narração. A narração e as instruções devem ser enviadas pelo solicitante.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'online_ad.png',
            'name' => 'Vídeo Curto Promocional',
            'description' => 'Vídeo comercial para divulgação de eventos, pode ser feito apenas mostrando o apresentador ou podem conter outros elementos como pequenas animações. O vídeo pode ser enviado pelo solicitante ou gravado no estúdio do PRACTICE.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'alert.png',
            'name' => 'Vídeo de aviso',
            'description' => 'Um vídeo curto para avisar/alertar/lembrar sobre algum ocorrido e/ou informação importante acerca da universidade. O vídeo de aviso pode conter efeitos sonoros e transições rápidas, que deixam o anúncio mais dinâmico. O vídeo pode ser enviado pelo solicitante ou gravado no estúdio do PRACTICE.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 2,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-400',
        ]);

        Service::create([
            'img_url' => 'cartilha.png',
            'name' => 'Cartilha',
            'description' => 'Uma cartilha reúne informações elementares ou instruções sobre um determinado tema em um formato dinâmico. O texto é curto e direto e normalmente são utilizadas muitas imagens, figuras e gráficos para auxiliar na apresentação do tema.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 3,
            'is_available' => false,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />',
            'color' => 'pink-300',
        ]);

        Service::create([
            'img_url' => 'manual.png',
            'name' => 'Manual',
            'description' => 'Um manual apresenta instruções para realização de algo (tarefa, montagem de produto, estabelecimento de rotina, etc). O texto tem uma ordem de passos que deve ser seguido para que se obtenha sucesso na atividade que o texto orienta.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 3,
            'is_available' => false,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />',
            'color' => 'pink-300',
        ]);

        Service::create([
            'img_url' => 'panfleto.png',
            'name' => 'Panfleto',
            'description' => 'O panfleto é um meio de divulgação de algo. O texto é sucinto e direto e tem por objetivo apresentar o básico sobre o tema para o leitor.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 3,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'color' => 'pink-300',
        ]);

        Service::create([
            'img_url' => 'cartaz.png',
            'name' => 'Cartaz',
            'description' => 'Divulgar algo ou alguém, escrito de forma resumida e direta. Utiliza de linguagem simples e direta e recursos visuais (design e imagens) para chamar atenção do leitor.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 4,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'color' => 'green-400',
        ]);

        Service::create([
            'img_url' => 'pack_simples.png',
            'name' => 'Identidade Visual (simples)',
            'description' => 'O pacote de identidade visual contém elementos a serem utilizados para trazer uma estética visual ao seu conteúdo. Este pacote contém: símbolo, logotipo e paleta de cores.',
            'work_days' => 15,
            'eval_days' => 3,
            'category_id' => 4,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'color' => 'green-400',
        ]);

        Service::create([
            'img_url' => 'pack_completo.png',
            'name' => 'Identidade Visual (complexa)',
            'description' => 'O pacote de identidade visual complexa contém elementos a serem utilizados para trazer uma estética visual ao seu conteúdo. Este pacote contém: símbolo, logotipo, paleta de cores, marca d’água e padronagem',
            'work_days' => 15,
            'eval_days' => 3,
            'category_id' => 4,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'color' => 'green-400',
        ]);

        Service::create([
            'img_url' => 'event.png',
            'name' => 'Evento virtual',
            'description' => 'Suporte para a realização de eventos virtuais em geral, como lives e semanas acadêmicas.',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 5,
            'is_available' => true,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />',
            'color' => 'blue-600',
        ]);

        Service::create([
            'img_url' => 'estudio.png',
            'name' => 'Gravação em estúdio',
            'description' => 'Você precisa produzir vídeos com uma estrutura peculiar ou com recursos muito específicos? O serviço de estúdo do programa pode te ajudar. Com uma infra-estutura preparada para isso!',
            'work_days' => 7,
            'eval_days' => 3,
            'category_id' => 6,
            'is_available' => false,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />',
            'color' => 'purple-500',
        ]);

        Service::create([
            'img_url' => 'mobile.png',
            'name' => 'App móvel (simples)',
            'description' => 'Criação de aplicativo para smartphone cujo objetivo é divulgar informações a facilitar o contato dos usuários com a entidade.',
            'work_days' => 90,
            'eval_days' => 3,
            'category_id' => 7,
            'is_available' => false,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />',
            'color' => 'indigo-400',
        ]);

        Service::create([
            'img_url' => 'site.png',
            'name' => 'Site (simples)',
            'description' => 'Gostaria de um site para divulgar um evento, curso, projeto, enfim? Nós podemos criar ele e passar a administração para você.',
            'work_days' => 30,
            'eval_days' => 3,
            'category_id' => 7,
            'is_available' => false,
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />',
            'color' => 'indigo-400',
        ]);         
    }
}
