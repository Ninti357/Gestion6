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
            $table->string('persona_id');
            $table->string('tipo_beneficio_id');
            $table->string('beneficio_id');
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
