<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function iniciar(){
        return view('user.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $request->session()->put('user_name', $user->nombre);
            return redirect()->intended(route('peliculas.index'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended(route('peliculas.index'));
    }
    public function cambiaIdioma(Request $request){
        Cookie::queue('idioma', $request->idioma, 60*24*30);
        return back();
    }
    public function creaCuent(){
        return view('user.sign');
    }
    public function cuentaCreada(Request $request)
    {
        // Validar datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:150',
                \Illuminate\Validation\Rule::unique('users', 'email') // email único
            ],
            'password' => 'required|string|confirmed', // confirmed requiere password_confirmation
        ]);
        
        // Crear el usuario
        $user = \App\Models\User::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']), // hashear
        ]);

        // Guardar datos del usuario en sesión
        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_name', $user->nombre);
        $request->session()->put('user_email', $user->email);

        // Redirigir a la página principal de películas
        return redirect()->route('peliculas.index')->with('success', 'Cuenta creada correctamente.');
    }


    
    
}
