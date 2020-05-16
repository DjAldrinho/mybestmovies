<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Facades\Image;

class Pelicula extends Model
{
    use SoftDeletes;

    protected $table = 'peliculas';

    protected $fillable = [
        'nombre',
        'sinopsis',
        'genero',
        'año',
        'director',
        'precio_alquiler',
        'precio_compra',
        'cantidad',
        'estado',
        'caratula'
    ];

    /*
     * Relaciones
     */

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuarios_peliculas','peliculas_id', 'usuarios_id')
            ->withTimestamps()
            ->withPivot(['opcion_compra', 'metodo_pago', 'referencia_pago', 'valor_pagado']);
    }

    /*
     * Funciones
     */

    public static function getPeliculasPaginate()
    {
        return self::orderBy('created_at', 'desc')->paginate(20);
    }

    public static function subirCaratula($file, $nombre)
    {
        //instancia de la libreria
        $image = Image::make($file);
        $path = storage_path() . '/app/public/';
        $image->resize(190, 275);
        $caratula = $nombre . '.' . $file->getClientOriginalExtension();
        $image->save($path . $caratula);
        return $caratula;
    }


}
