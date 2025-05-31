<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="font-sans bg-[#f9f9f9]  text-gray-800 scroll-smooth">
    <nav class="fixed top-0 left-0 w-full bg-white/80 shadow z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-purple-700">ToDoApp</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">Log out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">Login</a>
                    @endauth
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <a href="#about" class="block py-2 text-gray-700 hover:text-purple-600">Tentang</a>
            <a href="#features" class="block py-2 text-gray-700 hover:text-purple-600">Fitur</a>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="relative h-screen w-full overflow-hidden flex items-center justify-center">
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="{{ asset('vidios/todo.mp4') }}" type="video/mp4">
        </video>
        <div class="z-10 text-center text-white bg-black/10 p-10 rounded-xl max-w-xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Organize Your Day Better</h1>
            <p class="text-lg md:text-xl mb-6">Buat, kelola, dan selesaikan tugasmu dengan mudah dan efisien.</p>
            <a href="#about" class="bg-purple-600 hover:bg-purple-700 text-white py-3.5 px-5 rounded-lg transition">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-10 ">
            <div class="flex-1">
                <h2 class="text-3xl font-bold mb-4">Kenapa To-Do List Itu Penting?</h2>
                <p class="text-gray-700 mb-4">
                    Dengan menggunakan to-do list, kamu bisa lebih fokus dalam menyelesaikan prioritas harianmu.
                    Tak hanya itu, kamu juga bisa melacak kemajuan dari berbagai tugas dalam satu dashboard.
                </p>
                <p class="text-gray-700">
                    Efisiensi, produktivitas, dan kepuasan kerja akan meningkat hanya dengan membiasakan diri mencatat tugas-tugasmu.
                </p>
                @auth
                    <button class="bg-purple-600 hover:bg-purple-700 text-white py-3 px-5 rounded-lg transition mt-5" onclick="window.location.href='{{ route('todos.index') }}'">
                        Les go create
                    </button>
                @endauth
            </div>
            <div class="flex-1 ">
                <img src="{{ asset('images/todoboard.png') }}" alt="About Image" class="w-full float-right">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-6 bg-[#f3f4f6]">
        <div class="max-w-7xl mx-auto text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Fitur Utama</h2>
            <p class="text-gray-600">Nikmati berbagai fitur unggulan yang kami tawarkan untuk mendukung produktivitasmu.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-purple-700">Tambah Tugas</h3>
                <p class="text-gray-600">Buat daftar tugas harianmu secara cepat dan mudah.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-purple-700">Tandai Tugas Selesai</h3>
                <p class="text-gray-600">Centang tugas yang sudah kamu selesaikan dan rasakan kepuasannya.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-purple-700">Dashboard Real-time</h3>
                <p class="text-gray-600">Pantau semua tugas dan aktivitasmu dalam satu tampilan yang rapi.</p>
            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-purple-700 text-white py-6 mt-12">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center px-4">
            <p class="text-sm">&copy; {{ date('Y') }} To-Do List App. All rights reserved.</p>
            <div class="flex gap-4 mt-2 md:mt-0">
                <a href="#" class="hover:underline">Privacy</a>
                <a href="#" class="hover:underline">Terms</a>
                <a href="#" class="hover:underline">Contact</a>
            </div>
        </div>
    </footer>
    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
