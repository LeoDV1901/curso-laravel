<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Vista para iniciar sesión
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verifica si las credenciales son correctas
        if (Auth::attempt($request->only('email', 'password'))) {
            // Si el correo es 'messi@10', redirige a 'index_cruds'
            if ($request->email === 'messi@10') {
                return redirect('/index_cruds');
            }

            // De lo contrario, redirige a '/index'
            return redirect('/index');
        }

        // Si las credenciales no son correctas, muestra el error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirige a la página de inicio o login
    }
}
