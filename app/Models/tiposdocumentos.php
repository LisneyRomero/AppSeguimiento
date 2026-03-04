<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tiposdocumentos extends Model
{
    use HasFactory;
    protected $primaryKey ='NIS';
    public $incrementing = true;

    protected $table = 'tbl_tiposdocumentos';

    protected $fillable = [ 'denominacion' , 'observaciones'];

    public $timestamps = false;
}
