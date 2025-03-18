<?php
namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        // Obter todas as marcas e categorias
        $marcas = Marca::all();
        $categorias = Categoria::all();
        
        // Criar produtos de exemplo
        $produtos = [
            [
                'nome' => 'iPhone 15 Pro',
                'descricao' => 'Smartphone avançado com câmera de alta resolução',
                'preco' => 6999.99,
                'marca_id' => $marcas->where('nome', 'Apple')->first()->id,
                'categorias' => ['Smartphones', 'Acessórios']
            ],
            [
                'nome' => 'Galaxy S23',
                'descricao' => 'Smartphone com tela AMOLED e processador potente',
                'preco' => 4999.99,
                'marca_id' => $marcas->where('nome', 'Samsung')->first()->id,
                'categorias' => ['Smartphones']
            ],
            [
                'nome' => 'MacBook Pro 16',
                'descricao' => 'Notebook para profissionais com chip M2',
                'preco' => 18999.99,
                'marca_id' => $marcas->where('nome', 'Apple')->first()->id,
                'categorias' => ['Notebooks']
            ],
            [
                'nome' => 'Dell XPS 13',
                'descricao' => 'Notebook leve e potente para trabalho',
                'preco' => 9999.99,
                'marca_id' => $marcas->where('nome', 'Dell')->first()->id,
                'categorias' => ['Notebooks', 'Acessórios']
            ],
            [
                'nome' => 'iPad Pro',
                'descricao' => 'Tablet com tela Liquid Retina',
                'preco' => 8599.99,
                'marca_id' => $marcas->where('nome', 'Apple')->first()->id,
                'categorias' => ['Tablets']
            ],
            [
                'nome' => 'Sony Bravia XR',
                'descricao' => 'Smart TV 4K com tecnologia OLED',
                'preco' => 12999.99,
                'marca_id' => $marcas->where('nome', 'Sony')->first()->id,
                'categorias' => ['Televisores', 'Smart Home']
            ],
            [
                'nome' => 'Monitor LG UltraWide',
                'descricao' => 'Monitor de 34 polegadas para produtividade',
                'preco' => 3299.99,
                'marca_id' => $marcas->where('nome', 'LG')->first()->id,
                'categorias' => ['Monitores']
            ],
            [
                'nome' => 'AirPods Pro',
                'descricao' => 'Fones de ouvido sem fio com cancelamento de ruído',
                'preco' => 1899.99,
                'marca_id' => $marcas->where('nome', 'Apple')->first()->id,
                'categorias' => ['Áudio', 'Acessórios']
            ],
            [
                'nome' => 'Xiaomi Redmi Note 12',
                'descricao' => 'Smartphone com ótimo custo-benefício',
                'preco' => 2399.99,
                'marca_id' => $marcas->where('nome', 'Xiaomi')->first()->id,
                'categorias' => ['Smartphones']
            ],
            [
                'nome' => 'Sony WH-1000XM4',
                'descricao' => 'Headphone premium com áudio de alta definição',
                'preco' => 2599.99,
                'marca_id' => $marcas->where('nome', 'Sony')->first()->id,
                'categorias' => ['Áudio', 'Acessórios']
            ]
        ];
        
        // Inserir cada produto e suas categorias
        foreach ($produtos as $produtoData) {
            $categoriasNomes = $produtoData['categorias'];
            unset($produtoData['categorias']);
            
            $produto = Produto::create($produtoData);
            
            // Associar categorias
            $categoriaIds = $categorias->whereIn('nome', $categoriasNomes)->pluck('id')->toArray();
            $produto->categorias()->attach($categoriaIds);
        }
    }
}