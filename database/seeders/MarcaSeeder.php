<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [
            'Apple',
            'Samsung',
            'Sony',
            'Dell',
            'HP',
            'Asus',
            'Lenovo',
            'LG',
            'Philips',
            'Xiaomi'
        ];

        foreach ($marcas as $marca) {
            Marca::create(['nome' => $marca]);
        }
    }
}
