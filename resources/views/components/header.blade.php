{{-- resources/views/components/header.blade.php --}}
<!-- Header section: Fixed at the top, dark background, subtle shadow and border -->
<header class="bg-zinc-950 p-4 shadow-xl fixed w-full z-10 top-0 border-b border-zinc-800">
    <nav class="container mx-auto flex justify-between items-center px-4">
        <!-- Portfolio Title: Mimics Netflix logo style with bold text and blue accent -->
        <a href="/" class="text-3xl font-extrabold text-blue-600 tracking-wider">XZY</a>
        <!-- Navigation Links: Hidden on small screens, shown as a row on medium/large screens -->
        <ul class="hidden md:flex space-x-6 text-lg">
            <li><a href="/about" class="text-gray-400 hover:text-white transition duration-300 font-semibold">About</a></li>
            <li><a href="/contact" class="text-gray-400 hover:text-white transition duration-300 font-semibold">Contact</a></li>
        </ul>
        <!-- Mobile Menu Button (Hamburger Icon): Visible only on small screens -->
        <!-- You would typically add JavaScript to toggle a mobile navigation menu here -->
        <button class="md:hidden text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </nav>
</header>
