@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex relative bg-zinc-900">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[10%] left-[15%] w-[300px] h-[300px] bg-blue-400/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-[20%] right-[15%] w-[250px] h-[250px] bg-indigo-400/5 rounded-full blur-3xl animate-pulse delay-700"></div>
        <div class="absolute top-[40%] right-[25%] w-[200px] h-[200px] bg-purple-400/5 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>

    <!-- Left Column - Illustration -->
    <div class="hidden lg:flex w-1/2 items-center justify-center relative p-12">
        <div class="relative w-full max-w-lg">
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-72 h-72 bg-blue-400/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-400/5 rounded-full blur-3xl"></div>
              <!-- Main Illustration -->
            <div class="relative bg-gradient-to-br from-zinc-800/50 to-zinc-800/30 rounded-3xl p-8 backdrop-blur-xl border border-zinc-700/30 shadow-2xl overflow-hidden group">
                <!-- Animated geometric shapes -->
                <div class="absolute inset-0">
                    <!-- Floating circles -->
                    <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-gradient-to-r from-blue-400/20 to-indigo-400/20 rounded-full animate-float"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-24 h-24 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full animate-float-delayed"></div>
                    
                    <!-- Geometric patterns -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-blue-500/10 to-indigo-500/10 rounded-3xl rotate-45 transform transition-transform group-hover:rotate-90 duration-1000"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-gradient-to-br from-purple-500/10 to-pink-500/10 rounded-3xl -rotate-45 transform transition-transform group-hover:-rotate-90 duration-1000"></div>
                </div>

                <!-- Center content -->
                <div class="relative h-64 flex flex-col items-center justify-center gap-6">
                    <!-- Modern abstract symbol -->
                    <div class="w-24 h-24 bg-gradient-to-r from-blue-400/30 to-indigo-400/30 rounded-2xl rotate-45 transform hover:scale-110 transition-transform duration-300 flex items-center justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400/30 to-pink-400/30 rounded-xl -rotate-45 flex items-center justify-center">
                            <span class="text-4xl">✨</span>
                        </div>
                    </div>
                    
                    <!-- Animated rings -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-32 h-32 rounded-full border-4 border-blue-400/20 animate-pulse"></div>
                        <div class="absolute w-48 h-48 rounded-full border-4 border-indigo-400/10 animate-pulse delay-150"></div>
                        <div class="absolute w-64 h-64 rounded-full border-4 border-purple-400/5 animate-pulse delay-300"></div>
                    </div>
                </div>
            </div>

            <!-- Welcome Text -->
            <div class="mt-8 text-center">
                <h2 class="text-2xl font-bold text-white mb-2">Welcome to your creative space</h2>
                <p class="text-gray-400">Manage your portfolio and showcase your best work</p>
            </div>
        </div>
    </div>

    <!-- Right Column - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-12">
        <div class="w-full max-w-md space-y-8">
            <!-- Logo/Avatar -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-[1.5rem] bg-gradient-to-br from-blue-400/20 to-indigo-400/20 shadow-lg mb-6 p-1">
                    <div class="bg-zinc-900/90 w-full h-full rounded-[1.25rem] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div> 
                <h2 class="text-3xl font-bold text-white">Sign in to Admin</h2>
                <p class="mt-2 text-gray-400">Please enter your credentials to continue</p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('login.attempt') }}" method="POST" class="mt-8 space-y-6">
                @csrf
                
                @if ($errors->any())
                <div class="bg-red-400/5 text-red-300 p-4 rounded-xl backdrop-blur-xl border border-red-400/10">
                    <div class="flex items-start gap-3">
                        <div class="bg-red-400/10 rounded-lg p-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium mb-1">Authentication failed</p>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-300/80 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-300">Username</label>
                    <div class="mt-1 relative">
                        <input id="username" name="username" type="text" required 
                            class="block w-full px-4 py-3 bg-zinc-800/50 border border-zinc-700/50 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400/20 focus:border-blue-400/30 transition-all duration-300"
                            placeholder="Enter your username">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <div class="mt-1 relative">
                        <input id="password" name="password" type="password" required
                            class="block w-full px-4 py-3 bg-zinc-800/50 border border-zinc-700/50 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400/20 focus:border-blue-400/30 transition-all duration-300"
                            placeholder="Enter your password">
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 border-zinc-700/50 rounded bg-zinc-800/50 text-blue-400 focus:ring-blue-400/20">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-400">Remember me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">Forgot password?</a>
                    </div>
                </div>                <!-- Submit Button -->
                <button type="submit" class="relative z-10 w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-blue-400 cursor-pointer transition-all duration-300">
                    Sign in
                </button>

                <!-- Social Login Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-zinc-700/30"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-zinc-900 text-gray-400">Or continue with</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div class="grid grid-cols-3 gap-3">
                    <button type="button" class="w-full inline-flex justify-center py-2.5 px-4 rounded-xl border border-zinc-700/50 bg-zinc-800/30 text-sm font-medium text-gray-400 hover:bg-zinc-800/50 transition-all duration-200">
                        <span class="sr-only">Sign in with Google</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                        </svg>
                    </button>
                    <button type="button" class="w-full inline-flex justify-center py-2.5 px-4 rounded-xl border border-zinc-700/50 bg-zinc-800/30 text-sm font-medium text-gray-400 hover:bg-zinc-800/50 transition-all duration-200">
                        <span class="sr-only">Sign in with GitHub</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <button type="button" class="w-full inline-flex justify-center py-2.5 px-4 rounded-xl border border-zinc-700/50 bg-zinc-800/30 text-sm font-medium text-gray-400 hover:bg-zinc-800/50 transition-all duration-200">
                        <span class="sr-only">Sign in with Twitter</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
