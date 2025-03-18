<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Smartphones',
            'Notebooks',
            'Tablets',
            'Monitores',
            'Televisores',
            'Periféricos',
            'Áudio',
            'Câmeras',
            'Acessórios',
            'Smart Home'
        ];

        foreach ($categorias as $categoria) {
            Categoria::create(['nome' => $categoria]);
        }
    }
}

