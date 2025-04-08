<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('producoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade'); // Item produzido (fórmula base ou pizza)
            $table->float('quantidade_produzida');
            $table->dateTime('data_producao');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('producoes');
    }
};
