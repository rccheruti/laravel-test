<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


use App\Traits\HttpResponses;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    use HttpResponses;

    // Lista todos os produtos com paginação
    public function index(): JsonResponse
    {
        $produtos = Produtos::paginate();

        if (count($produtos) > 0) {
            return $this->response('Listagem de produtos', 200, [$produtos]);
        } else {
            return $this->response('Sem produtos cadastrados', 200);
        }

    }

    // Lista um produto específico pelo ID
    public function show(int $id): JsonResponse
    {
        $produtos = Produtos::find($id);

        if ($produtos) {
            return $this->response('Produto encontrado!', 200, [$produtos]);
        } else {
            return $this->response('Produto não encontrado ou não cadastrado!', 200);
        }
    }

    // Salva um novo produto
    public function store(Request $request): JsonResponse
    {

        $request->validate([
                'nome' => 'required|string|unique:produtos',
                'descricao' => 'required',
                'preco' => 'required',
                'quantidade' => 'required'
            ]);

        $produtos = new Produtos
        ([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade
        ]);

        $produtos->save();        

        return $this->response('Produto cadastrado com sucesso!', 201, [$produtos]);
    }

    // Atualiza qualquer campo válido do produto pelo seu ID
    public function update(Request $request, int $id): JsonResponse
    {
        $produtos = Produtos::find($id);
        $produtos->update($request->all());
        $produtos->save();
        return $this->response('Produto atualizado com sucesso!', 200, ['Produtos' => $produtos]);
    }

    // Deleta um produto pelo seu ID
    public function destroy(int $id): JsonResponse
    {
        Produtos::destroy($id);

        return $this->response('Produto excluído com sucesso!', 200, ['ID do produto excluído:' => $id]);
    }

}
