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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_identificacion_id')->constrained('tipos_identificaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->string('cedula');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->foreignId('genero_id')->constrained('generos')->onUpdate('cascade')->onDelete('cascade');
            $table->date('fecha_de_nacimiento');
            $table->foreignId('pueblo_id')->constrained('pueblos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('estado_civil_id')->constrained('estados_civiles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('comunidad_id')->constrained('comunidades')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
