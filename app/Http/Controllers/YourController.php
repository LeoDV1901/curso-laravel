<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // o el modelo que estés usando

class YourController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:2', //validar la contraseña
    ]);

    // Crear el usuario
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']); 
    $user->save();

    return redirect()->back()->with('success', 'Datos guardados exitosamente');
}

}
