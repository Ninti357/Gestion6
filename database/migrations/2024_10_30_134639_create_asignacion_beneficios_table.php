<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use BladeUI\Icons\Factory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignacion_beneficios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_beneficio_id')->constrained('tipos_beneficios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('beneficio_id')->constrained('beneficios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('persona_id')->constrained('personas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Cantidad');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_beneficios');
    }
};
