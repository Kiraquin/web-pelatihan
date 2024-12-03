@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Admin Dashboard</h1>
        
        <!-- Dashboard Content -->
        <div>
            <p class="text-gray-600">Selamat datang di halaman admin. Di sini Anda dapat mengelola konten dan data pengguna.</p>
        </div>

        <!-- Dashboard Sections (optional) -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-blue-600">Pengaturan Admin</h2>
            <ul>
                <li><a href="{{ route('admin.access.course') }}" class="text-blue-500 hover:underline">Akses kursus</a></li>
            </ul>
        </div>
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-blue-600">Manage Courses</h2>
            <a href="{{ route('admin.courses.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add New Course</a>
        
            <table class="table-auto w-full mt-4 border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Title</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $course->title }}</td>
                            <td class="px-4 py-2 border text-center">{{ $course->price }}</td>
                            <td class="px-4 py-2 border text-center">
                                
                                <!-- Tombol Hapus -->
                                <form method="POST" action="{{ route('admin.courses.delete', $course->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
