<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','cedula', 'email','telefono'];
    public function productos()
{
    return $this->belongsToMany(Productos::class, 'ventas')
                ->withPivot('cantidad', 'precioventa');
}
}
