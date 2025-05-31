<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Include Tailwind via CDN if not compiled -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-purple-50 to-purple-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <!-- Top Section with Illustration -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-8 flex flex-col items-center">
                <div class="mb-4 text-white">
                    <i class="fas fa-check-circle text-5xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white text-center">Todo List</h2>
                <p class="text-purple-100 text-center mt-2">Organize your tasks efficiently</p>
            </div>

            <!-- Login Form -->
            <div class="p-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Log In</h3>

                @if (session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    {{-- <form method="POST" action=""> --}}

                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                placeholder="you@example.com" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" name="password"
                                class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('password') border-red-500 @enderror"
                                placeholder="••••••••" required autocomplete="current-password"
                                oninput="this.nextElementSibling.style.display = this.value.length >= 8 ? 'none' : 'block'">
                            <p class="text-red-500 text-xs mt-1" style="display: none;">Password must be at least 8 characters.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" name="remember"
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-purple-600 hover:text-purple-800">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-all duration-300 shadow-md hover:shadow-lg">
                        Sign In
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('todos.register') }}"
                            class="text-purple-600 hover:text-purple-800 font-medium">
                            Sign up
                        </a>
                        {{-- <a href="" class="text-purple-600 hover:text-purple-800 font-medium">
                            Sign up
                        </a> --}}
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-100">
                <div class="text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} Todo List App. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</body>

</html>
