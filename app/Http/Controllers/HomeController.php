<?php

namespace App\Http\Controllers;

use App\Notifications\NewUser;
use App\Pelicula;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function bienvenida()
    {
        $peliculas = Pelicula::getPeliculasPaginate();

        return view('welcome', compact('peliculas'));
    }

    public function getRegistro()
    {
        return view('registro');
    }

    public function postRegistro(Request $request)
    {
        $reglas = [
            'email' => 'required|unique:usuarios|max:255|email',
            'password' => 'alpha_num|confirmed|min:6|max:80|required|different:identificacion',
            'password_confirmation' => 'required',
            'nombres' => 'required|max:80|min:2',
            'identificacion' => 'required|unique:usuarios|min:4|max:15|alpha_num',
        ];
        $validator = Validator::make($request->all(), $reglas);
        if ($validator->passes()) {

            $usuario = User::create([
                'email' => $request->email,
                'password' => $request->password,
                'nombres' => ucwords($request->nombres),
                'identificacion' => $request->identificacion,
                'rol' => 'cliente'
            ]);
            $usuario->save();

            $usuario->notify(new NewUser());

            return back()->with('mensaje', 'Registrado con exito!');

        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function postLogin(Request $request)
    {
        $credenciales = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($credenciales)) {
            return redirect('/');
        } else {
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
