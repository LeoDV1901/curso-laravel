<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Facades\Google2FA;


class UserController extends Controller
{
    public function index()
    {
        
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }
    

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
public function enableTwoFactorAuth(Request $request)
{
    $user = auth()->user();

    $user->google2fa_secret = Google2FA::generateSecretKey();
    $user->save();


    $QR_Image = Google2FA::getQRCodeUrl(
        config('app.name'),
        $user->email,
        $user->google2fa_secret
    );
    return view('auth.two-factor-auth', ['QR_Image' => $QR_Image]);
}

public function verifyTwoFactorAuth(Request $request)
{
    $request->validate(['two_factor_code' => 'required']);

    $user = auth()->user();

    if (Google2FA::verifyKey($user->google2fa_secret, $request->input('two_factor_code'))) {
        return redirect()->route('users.index')->with('success', 'Autenticación de dos factores verificada.');
    } else {
        return back()->withErrors(['two_factor_code' => 'El código de autenticación es inválido.']);
    }
}

}
