# Sistema de Busca de Produtos com Laravel e Livewire

Este projeto implementa um mecanismo de busca com filtros combinados para produtos, utilizando Laravel e Livewire. O sistema permite buscar produtos por nome, marca e categoria, com suporte para seleção múltipla de marcas e categorias.

## Funcionalidades

- Busca por nome de produto (texto livre)
- Filtro por categorias (seleção múltipla)
- Filtro por marcas (seleção múltipla)
- Combinação de filtros (AND)
- Persistência dos parâmetros de busca (URL Query String)
- Botão para aplicar os filtros selecionados
- Botão para limpar todos os filtros com um clique

## Requisitos

- Docker e Docker Compose
- Git

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/produto-search.git
cd produto-search
```

2. Inicie os contêineres Docker:

```bash
docker-compose up -d
```

3. Acesse o contêiner da aplicação:

```bash
docker exec -it produto-search-app bash
```

4. Instale as dependências do Composer:

```bash
composer install
```

5. Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

6. Configure o arquivo .env:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=produto_search
DB_USERNAME=sail
DB_PASSWORD=password
```

7. Gere a chave da aplicação:

```bash
php artisan key:generate
```

8. Execute as migrations e seeders para criar e popular o banco de dados:

```bash
php artisan migrate --seed
```

## Uso

Após a instalação, acesse o sistema pelo navegador em:

```
http://localhost:8000
```

### Filtros

- **Nome do Produto**: Digite o texto no campo de busca para filtrar produtos por nome.
- **Categorias**: Selecione uma ou mais categorias para filtrar produtos.
- **Marcas**: Selecione uma ou mais marcas para filtrar produtos.
- **Aplicar Filtros**: Clique para aplicar todos os filtros selecionados.
- **Limpar Filtros**: Clique para resetar todos os filtros aplicados.

## Estrutura do Projeto

- **Modelos**: Produto, Marca e Categoria com seus respectivos relacionamentos.
- **Migrações**: Tabelas para produtos, marcas, categorias e tabela de relacionamento.
- **Factories e Seeders**: Geração de dados de teste para facilitar o desenvolvimento.
- **Componente Livewire**: Implementação da lógica de busca e filtros.
- **Testes**: Verificação da funcionalidade de busca e filtros.

## Docker

O ambiente Docker consiste em:

- PHP 8.2 com Laravel
- MySQL 8.0
- Nginx

### Arquivos principais:

- **docker-compose.yml**: Configuração dos serviços
- **.docker/Dockerfile**: Configuração do contêiner PHP
- **.docker/nginx/app.conf**: Configuração do servidor web

## Testes

Para executar os testes automatizados:

```bash
php artisan test
```

Os testes cobrem:

- Renderização do componente
- Busca por nome de produto
- Filtro por marca
- Filtro por categoria
- Combinação de filtros
- Funcionalidade de limpeza de filtros
- Persistência dos parâmetros via Query String

## Possíveis Problemas

Se encontrar problemas com o Docker:

1. Verifique se o Docker está em execução
2. Verifique se as portas 8000 e 3306 estão disponíveis
3. Tente parar e reiniciar os contêineres:
```bash
docker-compose down
docker-compose up -d
```

Se encontrar problemas com o banco de dados:
1. Verifique as credenciais no arquivo .env
2. Tente recriar o banco de dados:
```bash
php artisan migrate:fresh --seed
```

## Desenvolvimento

Para contribuir com o projeto:

1. Faça um fork do repositório
2. Crie uma branch para sua feature: `git checkout -b feature/nova-funcionalidade`
3. Faça commit das alterações: `git commit -m 'Adiciona nova funcionalidade'`
4. Envie para o repositório remoto: `git push origin feature/nova-funcionalidade`
5. Crie um Pull Request
