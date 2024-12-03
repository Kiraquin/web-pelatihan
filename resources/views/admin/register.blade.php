@extends('layouts.app')

@section('title', 'Registrasi Admin')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">Registrasi Admin</h2>
        @if(session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="is_admin" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="0">User Biasa</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Daftar
            </button>
        </form>
    </div>

        <!-- Tombol Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Kembali ke Halaman Admin
            </a>
        </div>
@endsection
