<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class ServicioTipo extends Model
{
    protected $table = 'servicio_tipos';
    protected $fillable = ['nombre'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
