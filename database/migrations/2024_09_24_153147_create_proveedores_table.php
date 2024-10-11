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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id(); // clave primaria
            $table->string('nombre'); // campo nombre
            $table->string('nit')->unique(); // campo NIT, que debe ser único
            $table->string('email'); // campo correo electrónico
            $table->string('telefono')->nullable(); // campo teléfono, puede ser nulo
            $table->timestamps(); // created_at y updated_at
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
