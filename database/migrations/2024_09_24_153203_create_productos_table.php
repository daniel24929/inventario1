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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // clave primaria
            $table->string('nombre'); // nombre del producto
            $table->decimal('preciocompra', 10, 2); // precio de compra
            $table->decimal('precioventa', 10, 2); // precio de venta
            $table->text('descripcion')->nullable(); // descripción del producto, puede ser nulo
            $table->integer('stock'); // cantidad en stock
            $table->timestamps(); // created_at y updated_at
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
