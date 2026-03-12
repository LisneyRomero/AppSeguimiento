<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    use HasFactory;
    protected $primaryKey = 'NIS';
    public $incrementing = true;
    protected $table = 'tbl_aprendices';
    protected $fillable = [
      'tbl_tiposdocumentos_NIS','numDocumento', 'nombres', 'apellidos', 'direccion', 'correoInstitucional', 'correoPersonal', 'sexo', 'fechaNacimiento', 'tbl_eps_NIS'];
    public $timestamps = false;

    public function getSexoTextoAttribute()
    {
        return match ($this->sexo) {
            1 => 'Femenino',
            2 => 'Masculino',
            default => 'No definido'
        };
    }

    public function tiposdocumentos()
    {
        return $this->belongsTo(tiposdocumentos::class, 'tbl_tiposdocumentos_NIS', 'NIS');
    }

    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbl_eps_NIS', 'NIS');
    }
}