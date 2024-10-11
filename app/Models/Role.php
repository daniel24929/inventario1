<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory, HasRoles;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = ['name', 'guard_name'];

    /**
     * Relación con la tabla de permisos.
     */
    public function permissions()
    {
        return $this->belongsToMany(permissions::class, config('permission.table_names.role_has_permissions'));
    }

    /**
     * Relación con los modelos que tienen roles.
     */
    public function modelHasRoles()
    {
        return $this->hasMany(ModelHasRole::class, 'role_id');
    }

    /**
     * Relación con el equipo en caso de tener equipos activados en la configuración.
     */
    public function team()
    {
        if (config('permission.teams')) {
            return $this->belongsTo(Team::class, config('permission.column_names.team_foreign_key'));
        }

        return null;
    }
}

