<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MovimentacaoEstoqueController;
use App\Http\Controllers\ProducaoController;
use App\Http\Controllers\ProducaoResultadoController;
use App\Http\Controllers\TipoMovimentacaoEstoqueController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComposicaoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('unidades', UnidadeController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('movimentacoes-estoque', MovimentacaoEstoqueController::class);
    Route::apiResource('producoes', ProducaoController::class);
    Route::apiResource('producoes-resultados', ProducaoResultadoController::class);
    Route::apiResource('tipos-movimentacao-estoque', TipoMovimentacaoEstoqueController::class);
    Route::apiResource('lotes', LoteController::class);
    Route::apiResource('composicoes', ComposicaoController::class);
    Route::apiResource('itens', ItemController::class);
});
