<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    use HasFactory;

    protected $table = 'tbl_aprendices';

    protected $fillable = [ 'NIS', 'numDocumento', 'nombres', 'apellidos', 'direccion', 'correoInstitucional', 'correoPersonal', 'sexo', 'fechaNacimiento', 'tbl_eps_NIS', 'tbl_tiposdocumentos_NIS' ];

    public $timestamps = false;
}
