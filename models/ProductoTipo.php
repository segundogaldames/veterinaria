<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class ProductoTipo extends Model
{
    protected $table = 'producto_tipos';
    protected $fillable = ['nombre'];
}
