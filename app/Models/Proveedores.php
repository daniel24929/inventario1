<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'nit', 'email', 'telefono'];


    public function productos()
{
    return $this->belongsToMany(Productos::class, 'compras')
                ->withPivot('cantidad', 'preciocompra', 'soportecontable', 'valorporunidad');
}
}
