<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo','nombre','descripcion','precio_venta','status','producto_tipo_id','paciente_tipo_id'];

    public function productoTipo(){
        return $this->belongsTo(ProductoTipo::class);
    }

    public function pacienteTipo(){
        return $this->belongsTo(PacienteTipo::class);
    }
}
