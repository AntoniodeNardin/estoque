<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('movimentacoes_estoque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');
            $table->foreignId('tipo_movimentacao_id')->constrained('tipos_movimentacao_estoque')->onDelete('cascade');
            $table->foreignId('lote_id')->nullable()->constrained('lotes')->onDelete('set null');
            $table->foreignId('producao_id')->nullable()->constrained('producoes')->onDelete('set null');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->float('quantidade');
            $table->dateTime('data_movimentacao');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimentacoes_estoque');
    }
};
