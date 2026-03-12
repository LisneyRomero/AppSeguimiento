<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'NIS';
    public $incrementing = true;
    protected $table = 'tbl_centrosdeformacion';
    protected $fillable = [
      'tbl_regionales_NIS' ,'codigo', 'denominacion', 'direccion', 'observaciones', 
    ];
    public $timestamps = false;



    public function regionales()
    {
        return $this->belongsTo(regionales::class, 'tbl_regionales_NIS', 'NIS');
    }

}
