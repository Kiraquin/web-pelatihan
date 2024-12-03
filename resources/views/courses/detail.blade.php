@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <!-- Detail Kursus -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Gambar Kursus -->
            {{-- <div class="md:col-span-1">
                <img src="https://via.placeholder.com/500" alt="Course Image" class="w-full h-64 object-cover">
            </div> --}}

            <!-- Informasi Kursus -->
            <div class="p-6 md:col-span-1">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $course->title }}</h1>
                <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                <p class="text-xl font-semibold text-gray-800 mb-6">Price: Rp.{{ $course->price }}</p>

                <!-- Tombol Purchase -->
                <div class="flex justify-start">
                    <a href="{{ route('courses.purchase', $course->id) }}" 
                       class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                        Purchase Now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

