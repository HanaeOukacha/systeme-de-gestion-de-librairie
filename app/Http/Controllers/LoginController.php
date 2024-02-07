<?php

namespace App\Http\Controllers;
use App\Models\Gestionnaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
{
    $credentials = $request->only('Id', 'MotDePasse');
    $user = Gestionnaire::where('Id', $credentials['Id'])->first();

    if ($user && $user->MotDePasse === $credentials['MotDePasse']) {
        Auth::login($user);
        return redirect()->intended('/dashboard');
    } else {

        return redirect()->route('login')->with('error', 'Identifiants incorrects');
    }
}
public function logout(Request $request)
{
    Auth::logout();
    return redirect()->route('login');
}

}
