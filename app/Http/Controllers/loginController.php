<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

   class loginController extends Controller
{
    // Mostrar formulario
    public function showLogin()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required'
        ]);

        $usuario = User::where('correo', $request->correo)->first();

        if ($usuario && Hash::check($request->contrasena, $usuario->getAuthPassword())) {

            Auth::login($usuario);

            return redirect()->route('inicio');
        }

        return back()->withErrors([
            'correo' => 'Credenciales incorrectas'
        ])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email|unique:tbl_usuarios,correo',
            'contrasena' => 'required|min:6'
        ]);

        User::create([
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena)
        ]);

        return redirect()->route('login')->with('success', 'Usuario creado correctamente');
    }
}
