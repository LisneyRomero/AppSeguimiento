<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacoras extends Model
{
    /** @use HasFactory<\Database\Factories\BitacorasFactory> */
    use HasFactory;

    protected $primaryKey = 'NIS';
    public $incrementing = true;
    protected $table = 'tbl_bitacoras';
    protected $fillable = [
        'archivo', 'ruta', 'estado', 'created_at', 'updated_at' , 'tbl_usuarios_NIS'
    ];
    public $timestamps = true;

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'tbl_usuarios_NIS', 'NIS');
    }
}
