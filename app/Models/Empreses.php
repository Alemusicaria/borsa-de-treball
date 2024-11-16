<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empreses extends Model
{
    protected $primaryKey = 'empresa_id';
    protected $fillable = ['nif', 'nom', 'persona_contacte', 'primer_telefon_contacte', 'segon_telefon_contacte', 'adreca', 'codi_postal', 'municipi', 'provincia', 'validada','usuari_id'];


}
