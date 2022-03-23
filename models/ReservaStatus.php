<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class ReservaStatus extends Model
{
    protected $table = 'reserva_status';
    protected $fillable = ['nombre'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
