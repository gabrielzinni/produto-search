<div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>Filtros de Busca</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="search" class="form-label">Nome do Produto</label>
                    <input 
                        wire:model.defer="search" 
                        type="text" 
                        class="form-control" 
                        id="search" 
                        placeholder="Digite o nome do produto"
                    >
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Categorias</label>
                    <div class="border p-2 rounded" style="max-height: 200px; overflow-y: auto;">
                        @foreach($todasCategorias as $categoria)
                            <div class="form-check">
                                <input 
                                    wire:model.defer="categoriasSelecionadas" 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    value="{{ $categoria->id }}" 
                                    id="categoria-{{ $categoria->id }}"
                                >
                                <label class="form-check-label" for="categoria-{{ $categoria->id }}">
                                    {{ $categoria->nome }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Marcas</label>
                    <div class="border p-2 rounded" style="max-height: 200px; overflow-y: auto;">
                        @foreach($todasMarcas as $marca)
                            <div class="form-check">
                                <input 
                                    wire:model.defer="marcasSelecionadas" 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    value="{{ $marca->id }}" 
                                    id="marca-{{ $marca->id }}"
                                >
                                <label class="form-check-label" for="marca-{{ $marca->id }}">
                                    {{ $marca->nome }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <button wire:click="aplicarFiltros" class="btn btn-primary me-2">
                        Aplicar Filtros
                    </button>
                    <button wire:click="resetFilters" class="btn btn-secondary">
                        Limpar Filtros
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Produtos</h4>
            <div>
                <span class="badge bg-primary">{{ $produtos->total() }} produto(s) encontrado(s)</span>
            </div>
        </div>
        <div class="card-body">
            @if($produtos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Categorias</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->marca->nome }}</td>
                                    <td>
                                        @foreach($produto->categorias as $categoria)
                                            <span class="badge bg-secondary">{{ $categoria->nome }}</span>
                                        @endforeach
                                    </td>
                                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3">
                    {{ $produtos->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    Nenhum produto encontrado com os filtros selecionados.
                </div>
            @endif
        </div>
    </div>
</div>