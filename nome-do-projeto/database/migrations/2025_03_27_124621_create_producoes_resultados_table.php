<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('producoes_resultados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producao_id')->constrained('producoes')->onDelete('cascade');
            $table->foreignId('lote_id')->constrained('lotes')->onDelete('cascade');
            $table->float('quantidade_gerada');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('producoes_resultados');
    }
};
