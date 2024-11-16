<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnesOfertes extends Model
{
    protected $table = 'alumnesofertes';
    //protected $primaryKey = 'alumnesofertes_id';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['alumne_id', 'oferta_id', 'data_interes', 'vist_empresa'];
    protected $casts = ['alumne_id' => 'integer', 'oferta_id' => 'integer'];


} 