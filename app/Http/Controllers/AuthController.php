<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAuthRequest;

class AuthController extends Controller
{
    public function authenticate(StoreAuthRequest $request)
{
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    return back()->withErrors([
        'notif' => 'Login gagal! Silahkan coba lagi!',
    ])->onlyInput('email');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')
            ->withSuccess('Anda Telah Keluar dari sistem');
    }
}