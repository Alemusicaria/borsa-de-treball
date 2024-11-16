<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ofertes extends Model
{
    protected $primaryKey = 'oferta_id';
    protected $fillable = ['horari', 'incorporacio', 'sou', 'edat', 'idioma1', 'idioma2', 'idioma3', 'idioma4', 'tipus_contracte', 'caducitat_oferta', 'descripcio', 'empreses_id'];

}