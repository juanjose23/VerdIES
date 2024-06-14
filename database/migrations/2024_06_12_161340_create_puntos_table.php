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
        Schema::create('puntos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('monedas_id')->references('id')->on('monedas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('puntos')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos');
    }
};
