<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $marcasSelecionadas = [];
    public $categoriasSelecionadas = [];
    
    protected $queryString = [
        'search' => ['except' => ''],
        'marcasSelecionadas' => ['except' => []],
        'categoriasSelecionadas' => ['except' => []],
    ];
    
    // Adicionando este método para forçar a atualização quando algum modelo mudar
    public function updated($field)
    {
        $this->resetPage();
    }
    
    public function aplicarFiltros()
    {
        // Este método não precisa fazer nada, apenas força o Livewire a re-renderizar
        $this->resetPage();
    }

    public function mount()
    {
        // Inicialização, se necessário
    }

    public function render()
    {
        $marcas = Marca::orderBy('nome')->get();
        $categorias = Categoria::orderBy('nome')->get();
        
        $query = Produto::with(['marca', 'categorias']);
        
        if ($this->search) {
            $query->where('nome', 'like', '%' . $this->search . '%');
        }
        
        if (!empty($this->marcasSelecionadas)) {
            $query->whereIn('marca_id', $this->marcasSelecionadas);
        }
        
        if (!empty($this->categoriasSelecionadas)) {
            $query->whereHas('categorias', function ($q) {
                $q->whereIn('categorias.id', $this->categoriasSelecionadas);
            });
        }
        
        $produtos = $query->paginate(10);
        
        return view('livewire.produto-search', [
            'produtos' => $produtos,
            'todasMarcas' => $marcas,
            'todasCategorias' => $categorias
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'marcasSelecionadas', 'categoriasSelecionadas']);
        $this->resetPage();
    }
}