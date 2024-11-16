<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudis extends Model
{
    protected $primaryKey = 'estudi_id';
    protected $fillable = ['nom', 'descripcio'];


}