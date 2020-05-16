<?php

namespace App\Http\Controllers;

use App\Pelicula;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PeliculaController extends Controller
{


    /**
     * PeliculaController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $peliculas = Pelicula::getPeliculasPaginate();

        return view('peliculas.index', compact('peliculas'));
    }

    public function getRegistro()
    {
        return view('peliculas.registro');
    }

    public function comprarAlquilar(Request $request)
    {
        $pelicula = Pelicula::find(Crypt::decrypt($request->id));

        $opcion = $request->opcion;

        return view('peliculas.comprarAlquilar', compact('pelicula', 'opcion'));
    }


    public function confirmarAlquiler(Request $request)
    {
        $pelicula = Pelicula::find(Crypt::decrypt($request->id));

        return view('peliculas.confirmarAlquiler', compact('pelicula'));
    }

    public function postRegistro(Request $request)
    {
        $reglas = [
            'nombre' => 'required|unique:peliculas',
            'sinopsis' => 'required',
            'genero' => 'required',
            'año' => 'required|numeric',
            'director' => 'required',
            'precio_alquiler' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'caratula' => 'required|image'
        ];

        $validator = Validator::make($request->all(), $reglas);

        if ($validator->passes()) {
            $fullPathCaratula = null;
            $fileCaratula = $request->file('caratula');

            if (isset($fileCaratula)) {
                $fullPathCaratula = Pelicula::subirCaratula($fileCaratula, $request->nombre);
            }

            $pelicula = Pelicula::create([
                'nombre' => ucwords($request->nombre),
                'sinopsis' => ucwords($request->sinopsis),
                'caratula' => $fullPathCaratula,
                'genero' => $request->genero,
                'año' => $request->año,
                'director' => ucwords($request->director),
                'precio_alquiler' => $request->precio_alquiler,
                'precio_compra' => $request->precio_compra,
                'cantidad' => $request->cantidad,
                'estado' => 'Disponible'
            ]);

            $pelicula->save();

            return back()->with('mensaje', 'Pelicula Registrada con exito!');

        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function compra(Request $request)
    {
        $usuario = User::find($request->user()->id);
        $pelicula = Pelicula::find($request->pelicula);

        $valorPagar = null;

        if (isset($request->cantidad)) {
            $valorPagar = $request->cantidad * $pelicula->precio_compra;
        } else {
            $valorPagar = $pelicula->precio_alquiler;
        }

        $pelicula->cantidad = $pelicula->cantidad - $request->cantidad;

        $pelicula->update();

        $refPago = Carbon::now()->format('dmY') . rand(100, 400);

        DB::table('usuarios_peliculas')
            ->insert(['metodo_pago' => $request->metodo_pago,
                'usuarios_id' => $usuario->id,
                'peliculas_id' => $pelicula->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'opcion_compra' => $request->opcion_compra,
                'valor_pagado' => $valorPagar,
                'referencia_pago' => $refPago]);


        return back()->with('mensaje', 'Compra Realizada con exito! Su referencia de pago es: ' . $refPago);
    }

    public function peliculasUsuario(Request $request)
    {
        $peliculas = User::find($request->user()->id)->peliculas()->paginate();

        return view('peliculas.peliculas-usuario', compact('peliculas'));
    }

}
