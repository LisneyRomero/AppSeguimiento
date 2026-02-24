<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class programasdeformacion extends Model
{
    use HasFactory;
    protected $primaryKey ='NIS';
    public $incrementing = true;

    protected $table = 'tbl_programasdeformacion';

    protected $fillable = [ /*'NIS',*/ 'codigo', 'denominacion', 'observaciones'];

    public $timestamps = false;
}
