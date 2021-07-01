<?php

use Illuminate\Database\Seeder;
use App\Model\Idea;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 40; $i++) {
            Idea::create([
                'title' => 'Alguma ideia ' . $i,
                'description' => 'Alguma coisa nessa ideia maravilhosa ' . $i,
                'user_id' => 1
            ]);
        }
    }
}
