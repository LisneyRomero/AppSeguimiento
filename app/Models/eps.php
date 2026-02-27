<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eps extends Model
{

use HasFactory;
    protected $primaryKey ='NIS';
    public $incrementing = true;

    protected $table = 'tbl_eps';

    protected $fillable = [  'numDocumento', 'denominacion', 'observaciones'];

    public $timestamps = false;
    
}
