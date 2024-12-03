@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Login
            </button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
        </p>
    </div>
@endsection
