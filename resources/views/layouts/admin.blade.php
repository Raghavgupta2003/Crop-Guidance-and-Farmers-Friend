<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crop Advisory</title>
    @vite('resources/css/app.css')
</head>
  
<body class="bg-white text-gray-800 min-h-screen flex flex-col">

    {{-- ✅ Navbar --}}
    <nav class="bg-green-700 text-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">ADMIN</h1>
            <ul class="flex space-x-6">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('pests.index') }}" class="hover:underline">Manage Pests</a></li>
                <li><a href="/">Home</a></li>
            </ul>   
        </div>
    </nav>

    {{-- ✅ Main Content --}}
    <main class="container mx-auto py-8 flex-grow">
        @yield('content')
    </main>

    {{-- ✅ Footer --}}
    <footer class="bg-gray-100 text-center p-4 text-sm text-gray-600">
        © {{ date('Y') }} Crop Advisory & Farmer's Companion
    </footer>

</body>
</html>