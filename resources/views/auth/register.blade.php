@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">Register</h2>
        @if(session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="/register">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Register
            </button>
        </form>
        
        <p class="mt-4 text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
@endsection
