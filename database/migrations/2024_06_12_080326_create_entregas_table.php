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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('acopios_id')->references('id')->on('acopios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('codigo')->unique();
            $table->text('nota')->nullable();
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
