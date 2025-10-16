<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS DTR - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

            <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hris-teal {
            background-color: #1a5f7a;
        }
        
        .hris-light-teal {
            background-color: #57c3c2;
        }
        
        .hris-text-teal {
            color: #1a5f7a;
        }
        
        .hris-light-text-teal {
            color: #57c3c2;
        }
        
        .login-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .input-field {
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            border-color: #57c3c2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(87, 195, 194, 0.1);
        }
        
        .login-button {
            background-color: #57c3c2;
            transition: all 0.3s ease;
        }
        
        .login-button:hover {
            background-color: #4a9f9e;
        }
        
        .icon {
            width: 20px;
            height: 20px;
        }
        
        .time-graphic {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
            </style>
    </head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header Bar -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Left side - HRIS Logo -->
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                        <!-- Briefcase Icon -->
                        <svg class="w-6 h-6 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                    </svg>
                        <span class="text-xl font-bold hris-text-teal">HRIS</span>
                    </div>
                </div>
                
                <!-- Right side - Navigation Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Search Icon -->
                    <svg class="w-5 h-5 text-gray-600 hover:text-hris-text-teal cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>

                    <!-- Menu Icon -->
                    <svg class="w-5 h-5 text-gray-600 hover:text-hris-text-teal cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>

                    <!-- Profile Icon -->
                    <svg class="w-5 h-5 text-gray-600 hover:text-hris-text-teal cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex min-h-screen">
        <!-- Left Section - Welcome Area -->
        <div class="hris-teal flex-1 flex items-center justify-center relative overflow-hidden">
            <div class="text-center z-10">
                <!-- Welcome Text -->
                <h1 class="text-5xl font-bold text-white mb-4">
                    Welcome to HRIS DTR
                </h1>
                <p class="text-xl text-white opacity-90 mb-12">
                    Your gateway to effortless time management
                </p>
                
                <!-- Time Management Graphics -->
                <div class="flex justify-center items-center space-x-8 time-graphic">
                    <!-- Clock Icon -->
                    <div class="bg-white bg-opacity-20 rounded-full p-6">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                    </div>
                    
                    <!-- Calendar Icon -->
                    <div class="bg-white bg-opacity-20 rounded-full p-6">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    
                    <!-- Person Icon -->
                    <div class="bg-white bg-opacity-20 rounded-full p-6">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>
                
                <!-- Curved Arrow -->
                <div class="absolute top-1/2 right-20 transform -translate-y-1/2">
                    <svg class="w-24 h-24 hris-light-text-teal opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-20 w-32 h-32 border border-white rounded-full"></div>
                <div class="absolute bottom-32 right-32 w-24 h-24 border border-white rounded-full"></div>
                <div class="absolute top-1/2 left-10 w-16 h-16 border border-white rounded-full"></div>
            </div>
        </div>

        <!-- Right Section - Login Form -->
        <div class="bg-white w-full lg:w-1/3 flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                    <!-- Login Card -->
                <div class="login-card bg-white rounded-2xl p-8">
                    <!-- Login Title -->
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">LOGIN</h2>
                    
                    
                    
                    <!-- Login Form -->
                    <form class="space-y-6" method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        
                        @if ($errors->has('login'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                {{ $errors->first('login') }}
                            </div>
        @endif
                        
                        <!-- Username Field -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="icon hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="username"
                                   class="input-field w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 focus:bg-white" 
                                   placeholder="Username"
                                   value="{{ old('username') }}"
                                   required>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="icon hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" 
                                   name="password"
                                   class="input-field w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 focus:bg-white" 
                                   placeholder="Password"
                                   required>
                        </div>
                        
                        <!-- Login Button -->
                        <button type="submit" 
                                class="login-button w-full py-3 px-4 rounded-lg text-white font-semibold text-lg">
                            LOG IN
                        </button>
                        
                        <!-- Remember Me Checkbox -->
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="h-4 w-4 text-hris-text-teal focus:ring-hris-text-teal border-gray-300 rounded">
                            <label for="remember" class="ml-2 text-sm text-gray-600">
                                Remember me
                            </label>
                        </div>
                        
                        <!-- Links -->
                        <div class="space-y-2">
                            <a href="#" class="block text-sm text-hris-light-text-teal hover:underline">
                                Forget Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>
