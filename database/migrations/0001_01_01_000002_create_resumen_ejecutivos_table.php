<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resumen_ejecutivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->constrained('plan_estrategicos');
            $table->string('nombre_proyecto');
            $table->date('fecha_elaboracion');
            $table->text('promotores');
            $table->text('mision');
            $table->text('vision');
            $table->text('valores');
            $table->text('debilidades')->nullable();
            $table->text('fortalezas')->nullable();
            $table->text('oportunidades')->nullable();
            $table->text('amenazas')->nullable();
            $table->text('estrategia_identificada')->nullable();
            $table->json('acciones_competitivas')->nullable();
            $table->json('objetivos_estrategicos')->nullable();
            $table->text('conclusiones')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resumen_ejecutivos');
    }
};