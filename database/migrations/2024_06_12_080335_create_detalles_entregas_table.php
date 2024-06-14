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
        Schema::create('detalles_entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entregas_id')->references('id')->on('entregas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('materiales_id')->references('id')->on('materiales')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('monedas_id')->references('id')->on('monedas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('cantidad');
            $table->decimal('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_entregas');
    }
};
