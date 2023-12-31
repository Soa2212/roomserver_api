<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->boolean('sensor_magnetico')->default(false);
            $table->boolean('movimiento')->default(false);
            $table->float('temperatura')->nullable();
            $table->float('humedad')->nullable();
            $table->boolean('luz')->default(false);
            $table->float('voltaje')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
