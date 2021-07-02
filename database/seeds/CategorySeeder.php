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
        // TODO: categories for feedback (Ideia, Sugestão, Crítica, Reclamação)
        Category::create(['name' => 'Áudio', 'slug' => 'audio']);
        Category::create(['name' => 'Vídeo', 'slug' => 'video']);
        Category::create(['name' => 'Texto', 'slug' => 'texto']);
        Category::create(['name' => 'Imagem', 'slug' => 'imagem']);
        Category::create(['name' => 'Evento', 'slug' => 'evento']);
        Category::create(['name' => 'Estúdio', 'slug' => 'estudio']);
    }
}
