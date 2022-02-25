<?php

use App\Models\Location;
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
        Location::create(['name' => 'Cerro Largo (campus)', 'slug' => 'CL']);
        Location::create(['name' => 'Chapecó (campus)', 'slug' => 'CH']);
        Location::create(['name' => 'Erechim (campus)', 'slug' => 'ER']);
        Location::create(['name' => 'Laranjeiras do Sul (campus)', 'slug' => 'LS']);
        Location::create(['name' => 'Passo Fundo (campus)', 'slug' => 'PF']);
        Location::create(['name' => 'Realeza (campus)', 'slug' => 'RE']);
        Location::create(['name' => 'Reitoria', 'slug' => 'reitoria']);
    }
}
