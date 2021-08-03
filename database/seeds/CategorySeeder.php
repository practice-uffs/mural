<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Áudio',
            'slug' => 'audio',
            'description' => 'Faixas de áudio com objetivo de anunciar e/ou divulgar algo, fazer uma chamada ou áudios com a possibilidade de inserir trilha e efeitos sonoros mais elaborados, além da composição de diferentes áudios, como entrevistas e/ou leitura de livros.',            
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />',
            'color' => 'red-500',
        ]);
        
        Category::create([
            'name' => 'Vídeo',
            'slug' => 'video',
            'description' => 'Videoaula simples, com apenas o interlocutor em plano principal; Vídeo Tutorial explicativo, ensinando passo a passo da utilização de uma ferramenta e/ou software, entre outros',            
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />',
            'color' => 'yellow-500',
        ]);

        Category::create([
            'name' => 'Texto',
            'slug' => 'texto',
            'description' => 'Quer melhorar seus conteúdos? Os serviços de texto incluem a produção de cartilhas, manuais, panfletos e cartazes.',
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />',
            'color' => 'pink-400',
        ]);

        Category::create([
            'name' => 'Imagem',
            'slug' => 'imagem',
            'description' => 'Precisando de design ou identidade visual? Podemos providenciar através dos nossos pacotes de criação de logotipo, símbolo, paletas de cores, marca d’água e padronagem.',            
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'color' => 'green-400',
        ]);

        Category::create([
            'name' => 'Evento',
            'slug' => 'evento',
            'description' => 'Auxílio para a realização de eventos virtuais com live e interação do público? Fornecemos as ferramentas e suporte para que isso seja possível.',
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />',
            'color' => 'blue-500',
        ]);

        Category::create([
            'name' => 'Estúdio',
            'slug' => 'estudio',
            'description' => 'Temos um estúdio equipado com uma infraestrutura para te ajudar na realização das suas produções audiovisuais.',            
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />',
            'color' => 'purple-600',
        ]);

        Category::create([
            'name' => 'Software',
            'slug' => 'software',
            'description' => 'Podemos ajudar na criação de softwares acadêmicos, como aplicativos para celular ou sites, tanto para divulgar informações quanto para permitir uma melhor interação.',
            'icon_svg_path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
            'color' => 'indigo-500',
        ]);        
    }
}
