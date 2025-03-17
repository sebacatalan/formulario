<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identificador' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Admin puede ver gráficos y formulario
            if ($user->rol === 'admin') {
                return redirect()->route('formulario.index'); // Redirige a la vista del formulario
            }
            // Usuario solo puede llenar la encuesta
            return redirect()->route('formulario.index'); // Redirige a la vista del formulario
        }

        return back()->withErrors(['identificador' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}