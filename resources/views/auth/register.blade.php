<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-purple-50 to-purple-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <!-- Top Section with Illustration -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-8 flex flex-col items-center">
                <div class="mb-4 text-white">
                    <i class="fas fa-user-plus text-5xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white text-center">Join Todo List</h2>
                <p class="text-purple-100 text-center mt-2">Create an account to get started</p>
            </div>
            
            <!-- Register Form -->
            <div class="p-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Sign Up</h3>
                
                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register') }}">
                {{-- <form method="POST" action=""> --}}

                    @csrf
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                   class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror" 
                                   placeholder="John Doe" required autocomplete="name" autofocus>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                   class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('email') border-red-500 @enderror" 
                                   placeholder="you@example.com" required autocomplete="email">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" type="password" name="password" 
                                   class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('password') border-red-500 @enderror" 
                                   placeholder="••••••••" required autocomplete="new-password">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password Field -->
                    <div class="mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password-confirm" type="password" name="password_confirmation" 
                                   class="pl-10 w-full border border-gray-300 rounded-lg py-2 px-4 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" 
                                   placeholder="••••••••" required autocomplete="new-password">
                        </div>
                    </div>
                    
                    <!-- Terms and Conditions -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" name="terms" 
                                       class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" 
                                       required>
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="terms" class="text-gray-600">
                                    I agree to the <a href="#" class="text-purple-600 hover:text-purple-800">Terms of Service</a> and <a href="#" class="text-purple-600 hover:text-purple-800">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        @error('terms')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition-all duration-300 shadow-md hover:shadow-lg">
                        Create Account
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('todos.login') }}" class="text-purple-600 hover:text-purple-800 font-medium">
                            Log in
                        </a>
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