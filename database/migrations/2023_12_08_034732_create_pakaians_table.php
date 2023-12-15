<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pakaians', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis',['baju','celana', 'jaket', 'sprei', 'handuk', 'selimut']);
            $table->integer('jumlah')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('pesanan_id')->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakaians');
    }
};
