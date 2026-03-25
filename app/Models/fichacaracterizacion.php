<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fichacaracterizacion extends Model
{
   use HasFactory;
    protected $primaryKey = 'NIS';
    public $incrementing = true;
    protected $table = 'tbl_fichacaracterizacion';
    protected $fillable = [

        'codigo',        
        'tbl_programasdeformacion_NIS',
        'denominacion',
        'cupo',
        'fechaInicio',
        'fechaFin',
        'tbl_centrosdeformacion_NIS',
        'observaciones',
        
        
    ];
    public $timestamps = false;



    public function centrosdeformacion()
    {
        return $this->belongsTo(centrosdeformacion::class, 'tbl_centrosdeformacion_NIS', 'NIS');
    }

    public function programasdeformacion()
    {
        return $this->belongsTo(programasdeformacion::class, 'tbl_programasdeformacion_NIS', 'NIS');
    }
}
