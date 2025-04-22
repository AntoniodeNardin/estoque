<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('composicao_item', function (Blueprint $table) {
            $table->foreignId('composicao_id')->constrained('composicoes')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['composicao_id', 'item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('composicao_item');
    }
};
