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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();  // La columna `id` es la clave primaria y es auto-incremental
            $table->unsignedBigInteger('code');  // Eliminamos el `AUTO_INCREMENT` aquí
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('game_id');
            $table->float('total_cost');
            $table->date('purchase_date');

            // Definición de claves foráneas
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
