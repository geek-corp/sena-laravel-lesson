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
        Schema::create('resultado_torneo', function (Blueprint $table) {
            $table->id('id_resultado');
            $table->unsignedBigInteger('id_torneo');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('id_equipo');
            $table->unsignedBigInteger('id_modalidad');
            $table->string('premio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultado_torneos');
    }
};
