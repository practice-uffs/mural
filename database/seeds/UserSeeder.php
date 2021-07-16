<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Equipe Practice',
            'email' => 'practice@uffs.edu.br',
            'password' => 'dd',
            'username' => 'practice',
            'uid' => 'practice',
            'cpf' => '000',
            'type' => User::NORMAL
        ]);
    }
}