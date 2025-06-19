{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact')

@section('content')    <section class="max-w-4xl mx-auto space-y-20 py-16">
        <!-- Hero Section -->
        <div class="text-center max-w-2xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">Contact Me</h1>
            <p class="text-xl text-gray-300 leading-relaxed">Tertarik bekerja sama, punya project, atau sekadar ingin berdiskusi? Silakan hubungi saya melalui form di bawah atau kontak langsung!</p>
        </div>

        <!-- Contact Info Section -->
        <div class="bg-zinc-900 rounded-2xl p-8 md:p-12 border border-zinc-800/50 mb-10">
            <div class="flex flex-col md:flex-row md:items-center gap-8">
                <div class="flex-1">
                    <div class="mb-2 text-gray-400"><span class="font-semibold text-white">Email:</span> <a href="mailto:ikhlasputra940@gmail.com" class="underline hover:text-blue-400">ikhlasputra940@gmail.com</a></div>
                    <div class="mb-2 text-gray-400"><span class="font-semibold text-white">HP/WA:</span> <a href="https://wa.me/62882009612703" class="underline hover:text-blue-400">0882009612703</a></div>
                    <div class="mb-2 text-gray-400"><span class="font-semibold text-white">Github:</span> <a href="https://github.com/ikhlaspp" class="underline hover:text-blue-400" target="_blank">github.com/ikhlaspp</a></div>
                    <div class="mb-2 text-gray-400"><span class="font-semibold text-white">Domisili:</span> Sidoarjo, Jawa Timur</div>
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="bg-gradient-to-b from-zinc-900 to-zinc-900/50 rounded-3xl p-8 md:p-12 border border-zinc-800/50 backdrop-blur-xl transform hover:border-zinc-700/50 transition-all duration-500 shadow-2xl hover:shadow-blue-500/5">
            <form action="#" method="POST" class="space-y-8">
                @csrf
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label for="name" class="block text-lg font-medium text-white mb-3">Nama Anda</label>
                        <input type="text" name="name" id="name" required placeholder="Nama Lengkap"
                            class="w-full bg-zinc-800/50 border border-zinc-700/50 text-white rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent transition-all duration-300 placeholder-gray-500">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 via-blue-500/0 to-blue-500/0 opacity-0 group-hover:opacity-10 pointer-events-none transition-opacity duration-500"></div>
                    </div>
                    <div class="relative group">
                        <label for="email" class="block text-lg font-medium text-white mb-3">Email Anda</label>
                        <input type="email" name="email" id="email" required placeholder="email@domain.com"
                            class="w-full bg-zinc-800/50 border border-zinc-700/50 text-white rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent transition-all duration-300 placeholder-gray-500">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 via-blue-500/0 to-blue-500/0 opacity-0 group-hover:opacity-10 pointer-events-none transition-opacity duration-500"></div>
                    </div>
                </div>
                <div class="relative group">
                    <label for="subject" class="block text-lg font-medium text-white mb-3">Subjek</label>
                    <input type="text" name="subject" id="subject" required placeholder="Tentang apa pesan Anda?"
                        class="w-full bg-zinc-800/50 border border-zinc-700/50 text-white rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent transition-all duration-300 placeholder-gray-500">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 via-blue-500/0 to-blue-500/0 opacity-0 group-hover:opacity-10 pointer-events-none transition-opacity duration-500"></div>
                </div>
                <div class="relative group">
                    <label for="message" class="block text-lg font-medium text-white mb-3">Pesan Anda</label>
                    <textarea name="message" id="message" rows="6" required placeholder="Tulis pesan atau detail project..."
                        class="w-full bg-zinc-800/50 border border-zinc-700/50 text-white rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent transition-all duration-300 placeholder-gray-500 resize-none"></textarea>
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 via-blue-500/0 to-blue-500/0 opacity-0 group-hover:opacity-10 pointer-events-none transition-opacity duration-500"></div>
                </div>
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-600 text-white font-semibold py-5 px-8 rounded-2xl transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl hover:shadow-blue-500/20 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:ring-offset-2 focus:ring-offset-zinc-900">
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
