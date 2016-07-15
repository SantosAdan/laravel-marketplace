<?php

use Marketplace\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'         => 'Eletrônicos',
            'description' => 'Produtos eletrônicos.'
        ]);

        Category::create([
            'name'         => 'Esportes',
            'description' => 'Produtos esportivos.'
        ]);

        Category::create([
            'name'         => 'Vestuário',
            'description' => 'Produtos de vestuário.'
        ]);

        Category::create([
            'name'         => 'Computadores & Smartphones',
            'description' => 'Computadores, notebooks, smartphones e seus periféricos.'
        ]);

        Category::create([
            'name'         => 'Arte & Artesanato',
            'description' => 'Produtos de artesanato.'
        ]);

        Category::create([
            'name'         => 'Brinquedos',
            'description' => 'Brinquedos.'
        ]);

        Category::create([
            'name'         => 'Livros, Revistas & Quadrinhos',
            'description' => 'Livros, revistas, quadrinhos, jornais...'
        ]);

        Category::create([
            'name'         => 'Colecionáveis',
            'description' => 'Produtos colecionáveis.'
        ]);

        Category::create([
            'name'         => 'Outros',
            'description' => 'Produtos diversos.'
        ]);
    }
}
