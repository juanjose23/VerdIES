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
        Schema::create('detalle_recepcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recepciones_id')->references('id')->on('recepciones')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('materiales_id')->references('id')->on('materiales')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('monedas_id')->references('id')->on('monedas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('cantidad');
            $table->integer('cantidadlibra');
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
