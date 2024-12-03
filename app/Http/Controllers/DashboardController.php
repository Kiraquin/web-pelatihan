<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $user = session('user');
        $courses = $user->courses; // Mengambil semua kursus yang dimiliki pengguna
        return view('dashboard.index', compact('user', 'courses'));
    }
}

