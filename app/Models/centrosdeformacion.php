<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;

    protected $table = 'tbl_centrosdeformacion';

    protected $fillable = [ 'NIS', 'codigo', 'denominacion', 'direccion', 'observaciones', 'tbl_regionales_NIS' ];

    public $timestamps = false;
}
