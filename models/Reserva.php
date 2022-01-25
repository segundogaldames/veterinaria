<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['fecha','nombre_paciente','nombre_cliente','status','horario_id','servicio_tipo_id','paciente_tipo_id','usuario_id','funcionario_id'];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function servicioTipo()
    {
        return $this->belongsTo(ServicioTipo::class);
    }

    public function pacienteTipo()
    {
        return $this->belongsTo(PacienteTipo::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}