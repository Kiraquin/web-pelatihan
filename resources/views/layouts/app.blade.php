<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Pelatihan')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo di sebelah kiri -->
            <a href="/" class="text-xl font-bold text-blue-600">Web Pelatihan</a>
    
            <!-- Sapaan di tengah -->
            <div class="flex-grow text-center">
                @if (session('user'))
                    <span class="text-gray-700">Hi, {{ session('user')->name }}</span>
                @endif
            </div>
    
            <!-- Tombol aksi di sebelah kanan -->
            <div class="flex items-center space-x-4">
                @if (session('user'))
                    @if (session('user')->is_admin)
                        <a href="{{ route('admin.register') }}" class="text-blue-500 hover:underline">Registrasi Admin</a>
                        <a href="{{ route('admin.users') }}" class="text-blue-500 hover:underline">Manage Users</a>
                    @endif
                    <form method="POST" action="/logout" onsubmit="return confirmLogout(event)">
                        @csrf
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
                @endif
            </div>
        </div>
    </nav>
    

    <!-- Main Content -->
    <main class="container mx-auto mt-8">
        @yield('content')
    </main>

    <script>
        function confirmLogout(event) {
            // Menampilkan dialog konfirmasi
            const confirmAction = confirm("Apakah Anda yakin ingin logout?");
            
            if (!confirmAction) {
                // Membatalkan submit jika pengguna memilih "Cancel"
                event.preventDefault();
                return false;
            }
            
            return true; // Melanjutkan proses logout jika pengguna memilih "OK"
        }
    </script>
</body>
</html>
