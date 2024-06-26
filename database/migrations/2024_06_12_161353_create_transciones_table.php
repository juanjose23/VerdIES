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
        Schema::create('transciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monedas_id')->references('id')->on('monedas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('promociones_id')->references('id')->on('promociones')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('puntos');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transciones');
    }
};
