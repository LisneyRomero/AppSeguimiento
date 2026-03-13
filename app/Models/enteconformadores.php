<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class enteconformadores extends Model
{
    use HasFactory;
    protected $primaryKey = 'NIS';
    public $incrementing = true;
    protected $table = 'tbl_enteconformadores';
    protected $fillable = [
        'tbl_tiposdocumentos_NIS',
        'numDocumento',
        'razonSocial',
        'direccion',
        'telefono',
        'correoInstitucional',
    ];
    public $timestamps = false;



    public function tiposdocumentos()
    {
        return $this->belongsTo(tiposdocumentos::class, 'tbl_tiposdocumentos_NIS', 'NIS');
    }
}
