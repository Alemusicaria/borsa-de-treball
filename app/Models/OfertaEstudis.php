<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaEstudis extends Model
{
    protected $table = 'ofertaestudis';
    //protected $primaryKey = 'ofertaestudis_id';
    public $incrementing = true;
    protected $fillable = ['oferta_id', 'estudi_id'];
    protected $casts = ['oferta_id' => 'integer', 'estudi_id' => 'integer'];


}
 