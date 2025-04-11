<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');
            $table->string('codigo_lote')->unique();
            $table->date('data_validade');
            $table->float('quantidade_disponivel')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lotes');
    }
};
