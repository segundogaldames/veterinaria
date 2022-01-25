<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = ['rango_hora'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}