@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto bg-white shadow rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6">Selamat Datang, {{ $user->name }}</h1>

        <h2 class="text-2xl font-semibold mb-4">Kursus yang Anda Miliki:</h2>

        @if ($courses->isEmpty())
            <p class="text-gray-500">Anda belum memiliki akses ke kursus apa pun.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                        <a href="{{ route('courses.show', $course->id) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
