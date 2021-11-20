<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regiones';
    protected $fillable = ['nombre'];

    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }
}
