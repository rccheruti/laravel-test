<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutosController;

Route::prefix('v1')->group(function () {
    // Rota que passa por auth ou não, como não foi solicitado não implementei a autenticação
    Route::middleware('guest')->group(function () {
        // Rota de listagem com paginação
        Route::get('produtos/listar',[ProdutosController::class, 'index']);
        // Rota de listagem por ID
        Route::get('produtos/listar/{id}',[ProdutosController::class, 'show']);
        // Rota de cadastro
        Route::post('produtos/cadastrar/',[ProdutosController::class,'store']);
        // Rota de atualização do produto via ID
        Route::patch('produtos/atualizar/{id}',[ProdutosController::class,'update']);
        // Rota para deletar o produto via ID
        Route::delete('produtos/deletar/{id}',[ProdutosController::class,'destroy']);
    });
});