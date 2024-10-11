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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade')->cascadeOnUpdate();
            $table->integer('cantidad'); // Cantidad de productos vendidos
            $table->decimal('precioventa', 8, 2); // Precio de venta por unidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
