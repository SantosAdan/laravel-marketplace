<?php

use Marketplace\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'Usuário Teste',
            'email'         => 'user@user.com',
            'password'      => bcrypt(123456),
            'photo_url'     => 'users/default-avatar.png',
            'street'        => 'Rua Teste',
            'street_number' => 123,
            'district'      => 'Bairro Fantasma',
            'city'          => 'Cidade X',
            'state'         => 'MG',
            'zipcode'       => 11222333456
        ]);
    }
}
