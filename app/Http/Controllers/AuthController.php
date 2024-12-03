<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

// Proses Login
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Simpan data user ke session
        session(['user' => $user]);

        return $user->is_admin 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
}


    // Form Daftar
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses Daftar
    public function register(Request $request)
{
    // Validasi data
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ]);

    // Debugging: cek data yang diterima
    // \Log::info('Data Pendaftaran:', $request->all());

    // Simpan data pengguna
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'is_admin' => false, // Default pengguna biasa
    ]);

    return redirect()->route('register')->with('success', 'Registrasi berhasil. Silakan login.');
}


// Dashboard
public function dashboard()
{
    $user = session('user'); // Ambil data user dari session

    // Ambil semua kursus yang tersedia
    $courses = Course::all();

    if (!$user) {
        // Jika pengguna belum login, tampilkan dashboard tanpa akses login
        return view('dashboard', compact('courses')); // Kirim data kursus ke view untuk pengguna yang belum login
    }

    // Kirim data kursus dan user jika pengguna sudah login
    return view('dashboard', ['user' => $user, 'courses' => $courses]);
}




// Admin Page
public function admin()
{
    $user = session('user'); // Ambil data user dari session
    if (!$user || !$user->is_admin) {
        return redirect()->route('login');
    }

    return view('admin.dashboard', ['user' => $user]);
}



// Logout
public function logout()
{
    session()->forget('user'); // Hapus data user dari session
    return redirect()->route('login');
}

}
