<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    User,
    Profile,
};
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.component.login');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
            'alamat' => 'required|string|max:255',
            'umur' => 'required|integer',
            'bio' => 'nullable|string|max:500',
        ]);

        // Simpan data profil ke database
        $profile = Profile::create([
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'bio' => $request->bio,
        ]);

        // Simpan data user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_id' => $profile->id,
            'role_id' => 1,
            'email_verified_at' => now(), // Tanggal verifikasi email
            'remember_token' => Str::random(10), // Token remember
        ]);

        // Redirect ke halaman home setelah registrasi sukses
        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registerAdmin(Request $request)
    {
    // Validation for admin registration
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|min:8', // Strengthen password requirements if needed
        'alamat' => 'required|string|max:255',
        'umur' => 'required|integer',
        'bio' => 'nullable|string|max:500',
    ]);

    // Create profile
    $profile = Profile::create([
        'alamat' => $request->alamat,
        'umur' => $request->umur,
        'bio' => $request->bio,
    ]);

    // Create admin user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'profile_id' => $profile->id,
        'role_id' => 2, // Set role_id to 2 for admin
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ]);

    return redirect()->route('home')->with('success', 'Admin registration successful!');
    }
}