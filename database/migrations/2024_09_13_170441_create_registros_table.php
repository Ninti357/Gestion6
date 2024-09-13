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
        Schema::create( 'registros', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula');
            $table->string('Primer_nombre');
            $table->string('Segundo_nombre');
            $table->string('Primer_Apellido');
            $table->string('Segundo_Apellido');
            $table->date('fecha_de_nacimiento');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
