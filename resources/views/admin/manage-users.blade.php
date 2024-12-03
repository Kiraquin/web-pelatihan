@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
    <div class="bg-white shadow p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Manage Users</h1>
        
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Role</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form method="POST" action="{{ route('admin.users.updateRole', $user->id) }}">
                                @csrf
                                <select name="is_admin" onchange="this.form.submit()" class="border rounded px-2 py-1">
                                    <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6 text-center">
        <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
            Kembali ke Halaman Admin
        </a>
    </div>

    <script>
        function confirmDelete(event) {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
@endsection
