<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class ServicioTipo extends Model
{
    protected $table = 'servicio_tipos';
    protected $fillable = ['nombre'];
}
