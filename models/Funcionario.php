<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = ['rut','nombre','email','direccion','comuna_id'];

    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }
}
