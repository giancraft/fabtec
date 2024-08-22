<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Setor;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        $info = Setor::all();
        return view('auth.register', ["info"=>$info]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:45',
            'email' => 'required|string|email|max:45|unique:usuarios',
            'password' => 'required|string|min:4',
            'dataNascimento' => 'required|date',
        ]);

        $user = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'dataNascimento' => $request->dataNascimento,
            'setor_id' => $request->setor_id,
        ]);

        Auth::login($user);

        return redirect()->route('usuario.index');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('usuario.index'));
        }

        return redirect()->back()->withErrors(['senha' => 'Credenciais inválidas.'])->withInput();
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
