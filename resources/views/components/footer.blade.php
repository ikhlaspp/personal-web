{{-- resources/views/components/footer.blade.php --}}
<!-- Footer section: Dark background, centered text, subtle border -->
<footer class="bg-zinc-950 p-6 text-center text-gray-400 text-sm mt-10 shadow-inner border-t border-zinc-800">
    <p>&copy; {{ date('Y') }} Your Name. All rights reserved.</p>
    <p>Built with Laravel, Vite & Tailwind CSS</p>
    <!-- Social/Other Links in Footer -->
    <div class="flex justify-center space-x-4 mt-2">
        <a href="#" class="hover:text-white transition duration-300">GitHub</a>
        <a href="#" class="hover:text-white transition duration-300">LinkedIn</a>
        <a href="#" class="hover:text-white transition duration-300">Twitter</a>
    </div>
</footer>
