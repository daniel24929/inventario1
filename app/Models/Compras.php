<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = ['proveedor_id', 'producto_id', 'cantidad', 'preciocompra', 'soportecontable', 'valorporunidad'];



 public function proveedor()
 {
     return $this->belongsTo(Proveedores::class);
 }

 public function producto()
 {
     return $this->belongsTo(Productos::class); // Asegúrate de que este también sea 'Producto::class' si el nombre de la clase es singular.
 }

        public static function boot()
        {
            parent::boot();

            static::created(function ($comprar) {
                // Aumentar el stock del producto relacionado
                $producto = Productos::find($comprar->producto_id);
                if ($producto) {
                    $producto->increment('stock', $comprar->cantidad);
                }
            });
        }
}
