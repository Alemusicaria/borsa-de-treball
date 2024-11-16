<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    protected $primaryKey = 'alumne_id';
    protected $fillable = ['nom', 'primer_cognom', 'segon_cognom', 'dni', 'adreca', 'codi_postal', 'municipi', 'provincia', 'data_naixement', 'primer_telefon', 'segon_telefon', 'carnet_conduir', 'idioma1', 'idioma2', 'idioma3', 'idioma4', 'observacions','usuari_id'];

     public function usuario()
    {
        return $this->belongsTo(Usuaris::class, 'usuari_id', 'usuari_id');
    }
}