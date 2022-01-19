<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $fillable = ['descripcion','precio','urgencia','paciente_id','usuario_id'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function servicioTipo()
    {
        return $this->belongsTo(ServicioTipo::class);
    }
}
