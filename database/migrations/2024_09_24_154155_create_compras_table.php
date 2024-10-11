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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade')->cascadeOnUpdate();
            $table->integer('cantidad');
            $table->decimal('preciocompra', 8, 2); // Precio de compra por unidad
            $table->string('soportecontable'); // Soporte contable opcional
            $table->decimal('valorporunidad', 8, 2); // Valor total por unidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
