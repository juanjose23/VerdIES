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
        Schema::create('detalle_promociones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promociones_id')->references('id')->on('promociones')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('cantidad');
            $table->decimal('valor', 10, 2);
            $table->unsignedBigInteger('monedas_id')->references('id')->on('monedas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('cantidadmoneda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_promociones');
    }
};
