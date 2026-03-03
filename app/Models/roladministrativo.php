<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class roladministrativo extends Model
{
   use HasFactory;
    protected $primaryKey ='NIS';
    public $incrementing = true;

    protected $table = 'tbl_roladministrativo';

    protected $fillable = [ 'descripcion'];

    public $timestamps = false;
    

}
