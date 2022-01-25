<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class PacienteTipo extends Model
{
    protected $table = 'paciente_tipos';
    protected $fillable = ['nombre', 'exotico'];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
