<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert([
            'nome'  => 'Mobilidade urbana',
        ]);
        Categoria::insert([
            'nome'  => 'Serviço de saúde',
        ]);
        Categoria::insert([
            'nome'  => 'Acessibilidade virtual',
        ]);
        Categoria::insert([
            'nome'  => 'Educação',
        ]);
        Categoria::insert([
            'nome'  => 'Segurança',
        ]);
        Categoria::insert([
            'nome'  => 'Outros',
        ]);
    }
}
