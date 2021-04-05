<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Item;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categories for feedback
        DB::table('categories')->insert([
            'name' => 'Ideia',
            'item_type' => Item::TYPE_FEEDBACK
        ]);

        DB::table('categories')->insert([
            'name' => 'Sugestão',
            'item_type' => Item::TYPE_FEEDBACK
        ]);

        DB::table('categories')->insert([
            'name' => 'Crítica',
            'item_type' => Item::TYPE_FEEDBACK
        ]);

        DB::table('categories')->insert([
            'name' => 'Reclamação',
            'item_type' => Item::TYPE_FEEDBACK
        ]);

        // categories for service
        DB::table('categories')->insert([
            'name' => 'Áudio',
            'item_type' => Item::TYPE_SERVICE
        ]);

        DB::table('categories')->insert([
            'name' => 'Vídeo',
            'item_type' => Item::TYPE_SERVICE
        ]);

        DB::table('categories')->insert([
            'name' => 'Texto',
            'item_type' => Item::TYPE_SERVICE
        ]);

        DB::table('categories')->insert([
            'name' => 'Imagem',
            'item_type' => Item::TYPE_SERVICE
        ]);

        DB::table('categories')->insert([
            'name' => 'Evento',
            'item_type' => Item::TYPE_SERVICE
        ]);

        DB::table('categories')->insert([
            'name' => 'Estúdio',
            'item_type' => Item::TYPE_SERVICE
        ]);
    }
}
