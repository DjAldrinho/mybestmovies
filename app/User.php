<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;


    protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'identificacion', 'email', 'password', 'rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    * Relaciones
    */

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class, 'usuarios_peliculas', 'usuarios_id', 'peliculas_id')
            ->withTimestamps()
            ->withPivot(['opcion_compra', 'metodo_pago', 'referencia_pago', 'valor_pagado']);

    }

    #
    # ================================ Get's and Set's =============================
    #

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
