<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnesEstudis extends Model
{
    protected $table = 'alumnesestudis';
    //protected $primaryKey = 'alumnesestudis_id';
    public $incrementing = true;
    protected $fillable = ['empreses_id', 'alumne_id', 'estudi_id', 'any_finalitzacio'];
    protected $casts = ['alumne_id' => 'integer', 'estudi_id' => 'integer', 'empreses_id' => 'integer'];


} 