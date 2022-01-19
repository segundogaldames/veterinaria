<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $fillable = ['nombre','codigo_chip','edad','tamanio','peso','paciente_tipo_id','cliente_id'];

    public function pacienteTipo()
    {
        return $this->belongsTo(PacienteTipo::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
