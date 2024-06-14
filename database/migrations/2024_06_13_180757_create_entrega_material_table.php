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
        Schema::create('entrega_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('recicladoras_id')->references('id')->on('recicladoras')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('codigo');
            $table->decimal('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_material');
    }
};
