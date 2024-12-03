@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p class="mt-4 text-green-500">You have access to this course!</p>
@endsection
