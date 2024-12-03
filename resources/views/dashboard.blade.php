@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Available Courses</h1>
    <div class="grid grid-cols-3 gap-4">
        @foreach($courses as $course)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl font-bold">{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                <p class="font-bold">Price: Rp.{{ $course->price }}</p>
                <a href="{{ route('courses.show', $course->id) }}" class="text-blue-500 hover:underline">Detail</a>
            </div>
        @endforeach
    </div>
@endsection
