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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('steam_appid');
            $table->string('name');
            $table->float('price');
            $table->float('steam_price');
            $table->string('developer');
            $table->date('release_date');
            $table->string('type');
            $table->integer('stock');
            $table->string('header_img');
            $table->string('trailer');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
