<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'producto_id', 'cantidad', 'precioventa'];


        // Relación con Cliente
        public function cliente()
        {
            return $this->belongsTo(Clientes::class);
        }

        // Relación con Producto
        public function producto()
        {
            return $this->belongsTo(Productos::class);
        }
        protected static function booted()
    {
        static::created(function ($venta) {
            // Usar el nombre correcto del modelo: Productos
            $producto = Productos::find($venta->producto_id);

            if ($producto) {
                // Resta el stock por la cantidad vendida
                $producto->stock -= $venta->cantidad;

                // Guarda los cambios en el producto
                $producto->save();
            }
        });
    }
}
