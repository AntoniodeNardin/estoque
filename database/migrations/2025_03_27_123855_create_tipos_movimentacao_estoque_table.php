<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tipos_movimentacao_estoque', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->unique();
            $table->enum('tipo', ['Entrada', 'Saída']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_movimentacao_estoque');
    }
};
