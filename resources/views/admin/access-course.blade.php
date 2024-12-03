@extends('layouts.app')

@section('title', 'Grant Course Access')

@section('content')
    <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Grant Course Access</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.grant.access') }}">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Select User</label>
                <select name="user_id" id="user_id" class="w-full mt-1 px-3 py-2 border rounded-lg">
                    <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700">Select Course</label>
                <select name="course_id" id="course_id" class="w-full mt-1 px-3 py-2 border rounded-lg">
                    <option value="">-- Select Course --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Grant Access</button>
        </form>
    </div>
@endsection
