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
        Schema::create('detalleuniversidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidades_id')->references('id')->on('universidades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('carreras_id')->references('id')->on('carreras')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleuniversidad');
    }
};
