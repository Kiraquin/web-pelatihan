@extends('layouts.app')

@section('title', 'Add New Course')

@section('content')
    <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Course</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.courses.store') }}">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                <input type="text" name="title" id="title" class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full mt-1 px-3 py-2 border rounded-lg" required></textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="w-full mt-1 px-3 py-2 border rounded-lg" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Save Course</button>
        </form>
    </div>
@endsection
