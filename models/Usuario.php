<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['clave','activo','funcionario_id'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
