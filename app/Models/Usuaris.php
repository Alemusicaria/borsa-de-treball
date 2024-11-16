<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuaris extends Authenticatable
{

    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuaris';

    protected $primaryKey = 'usuari_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public $timestamps = true;
}
