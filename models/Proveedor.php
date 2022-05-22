<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['rut','nombre','direccion','comuna_id'];

    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }
}
