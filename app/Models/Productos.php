<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','stock','precioventa','preciocompra','descripcion'];

    public function proveedores()
{
    return $this->belongsToMany(Proveedores::class, 'compras')
                ->withPivot('cantidad', 'preciocompra', 'soportecontable', 'valorporunidad');
}

        public function clientes()
{
    return $this->belongsToMany(Clientes::class, 'ventas')
                ->withPivot('cantidad', );
}
}
