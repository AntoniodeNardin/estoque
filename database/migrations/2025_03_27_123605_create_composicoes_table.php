<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('composicoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_pai_id')->constrained('itens')->onDelete('cascade');
            $table->foreignId('item_componente_id')->constrained('itens')->onDelete('cascade');
            $table->float('quantidade');
            $table->float('percentual_perda')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('composicoes');
    }
};
