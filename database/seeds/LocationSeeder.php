<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Campus Cerro Largo',
        ]);

        DB::table('locations')->insert([
            'name' => 'Campus Chapecó',
        ]);

        DB::table('locations')->insert([
            'name' => 'Campus Erechim',
        ]);

        DB::table('locations')->insert([
            'name' => 'Campus Laranjeiras do Sul',
        ]);

        DB::table('locations')->insert([
            'name' => 'Campus Passo Fundo',
        ]);

        DB::table('locations')->insert([
            'name' => 'Campus Realeza',
        ]);
    }
}
