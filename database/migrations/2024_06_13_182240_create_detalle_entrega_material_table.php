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
        Schema::create('detalle_entrega_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrega_materiales_id')->references('id')->on('entrega_material')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('materiales_id')->references('id')->on('materiales')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('peso');
            $table->decimal('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_entrega_material');
    }
};
