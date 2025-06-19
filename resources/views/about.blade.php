{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Me')

@section('content')
    <section class="max-w-4xl mx-auto space-y-24">
        <!-- Hero Section -->
        <div class="text-center pt-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Ikhlas Putra Pambagyo</h1>
            <p class="text-xl text-gray-400">Junior Web Developer</p>
        </div>

        <!-- Summary Section -->
        <div class="bg-zinc-900 rounded-2xl p-6 md:p-8 border border-zinc-800">
            <h2 class="text-2xl font-bold text-white mb-4">Ringkasan</h2>
            <p class="text-gray-300 text-lg mb-2">
                Mahasiswa Informatika UPN "Veteran" Jatim (IPK 3.90) dengan fokus pada pengembangan web. Berpengalaman membangun aplikasi web responsif dari awal menggunakan Laravel, Tailwind CSS, dan WordPress. Terampil dalam menerjemahkan desain UI/UX dari Figma menjadi antarmuka yang fungsional dan intuitif. Mencari kesempatan untuk berkontribusi dalam peran Junior Web Developer.
            </p>
        </div>

        <!-- Experience Section -->
        <div class="bg-zinc-900 rounded-2xl p-6 md:p-8 border border-zinc-800">
            <h2 class="text-2xl font-bold text-white mb-4">Pengalaman</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Website Promosi Desa | Abdi Desa Fasilkom 2025</h3>
                    <p class="text-gray-400 text-sm mb-1">Maret 2024 – Des. 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Merancang dan mengembangkan platform digital berbasis WordPress untuk mempromosikan potensi UMKM dan pariwisata desa binaan.</li>
                        <li>Bertanggung jawab pada proses front-end, menerjemahkan desain UI dari Figma menjadi website yang interaktif dan mudah diakses oleh masyarakat luas.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Aplikasi Web Manajemen Pelatihan | PIBITI 2024</h3>
                    <p class="text-gray-400 text-sm mb-1">Mei 2024 – Juli 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Mengembangkan aplikasi web berbasis Laravel dengan antarmuka yang dibangun menggunakan Tailwind CSS sebagai sistem informasi dan manajemen peserta.</li>
                        <li>Mengimplementasikan fitur pendaftaran, pusat informasi, dan pengumpulan tugas yang meningkatkan efisiensi koordinasi seluruh peserta pelatihan.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Website Organisasi | Staff Website UKM Penalaran & Kreativitas</h3>
                    <p class="text-gray-400 text-sm mb-1">Maret 2024 – Desember 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Memelihara dan mengembangkan situs web organisasi berbasis WordPress sebagai hub informasi utama, pendaftaran anggota, dan galeri portofolio UKM.</li>
                        <li>Merancang ulang dan mengimplementasikan tampilan antarmuka (UI) menggunakan Figma untuk meningkatkan alur navigasi dan pengalaman pengguna.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Desainer Promosi & Konten | FASILKOM FEST 2023</h3>
                    <p class="text-gray-400 text-sm mb-1">Okt 2023 – Jan 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Merancang seluruh aset promosi visual (poster, banner) menggunakan Adobe Illustrator dan Figma untuk 4 cabang kompetisi e-sports.</li>
                        <li>Berhasil menarik rata-rata 50 peserta per cabang lomba, berkontribusi signifikan pada kesuksesan acara dan melampaui target partisipasi.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Manajer Konten Visual & Branding Acara | PEMIRA Informatika 2025</h3>
                    <p class="text-gray-400 text-sm mb-1">Desember 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Mengelola penuh konten visual dan identitas brand untuk akun Instagram @pemiraif2025, mulai dari perencanaan feed, desain, hingga publikasi.</li>
                        <li>Memproduksi berbagai aset desain vektor untuk kebutuhan branding acara, seperti ID card dan banner, menggunakan Adobe Illustrator.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Produser Konten Video & Desain | Berbagai Kepanitiaan (PEMABA, BCD, Gravity Fest, Studi Ekskursi)</h3>
                    <p class="text-gray-400 text-sm mb-1">Juni 2024 – Nov 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Mengarahkan dan mengeksekusi produksi konten video (teaser, after-movie) secara end-to-end, mulai dari pengambilan gambar hingga proses editing di Adobe Premiere Pro dan penambahan motion graphic menggunakan Adobe After Effects.</li>
                        <li>Mendesain materi promosi utama seperti pamflet yang berhasil memenuhi 100% kuota pendaftar untuk acara MINI CLASS 2024.</li>
                        <li>Merancang aset kreatif seperti animasi twibbon (PEMABA 2024) untuk meningkatkan partisipasi dan engagement audiens di media sosial.</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-400">Staf Logistik | MABA CUP X CONNECTION DAY 2023 – BEM FASILKOM</h3>
                    <p class="text-gray-400 text-sm mb-1">Okt 2023 – Jan 2024</p>
                    <ul class="list-disc list-inside text-gray-300 text-base ml-4">
                        <li>Bertanggung jawab atas manajemen dan distribusi logistik untuk mendukung kebutuhan operasional divisi Publikasi, Dokumentasi, dan Dekorasi.</li>
                        <li>Bertindak sebagai operator teknis multimedia selama acara untuk memastikan kelancaran presentasi visual.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Education Section -->
        <div class="bg-zinc-900 rounded-2xl p-6 md:p-8 border border-zinc-800">
            <h2 class="text-2xl font-bold text-white mb-4">Pendidikan</h2>
            <div>
                <h3 class="text-lg font-semibold text-blue-400">UNIVERSITAS PEMBANGUNAN NASIONAL “VETERAN” JAWA TIMUR</h3>
                <p class="text-gray-400 text-sm mb-1">2023 – saat ini</p>
                <p class="text-gray-300 text-base">S1 Informatika - IPK Saat Ini: 3.90 / 4.00</p>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="bg-zinc-900 rounded-3xl p-10 md:p-16 lg:p-20 border border-zinc-800 transform hover:border-zinc-700 transition-all duration-300 shadow-2xl">
            <h3 class="text-3xl font-bold text-white mb-16">Kemampuan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-10">
                <div class="bg-zinc-800 p-10 rounded-2xl transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <h4 class="text-lg font-semibold text-white mb-4">Pengembangan Web</h4>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">PHP</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Laravel</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">HTML</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">CSS</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Tailwind CSS</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">JavaScript</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">WordPress</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">MySQL</span>
                    </div>
                </div>
                <div class="bg-zinc-800 p-10 rounded-2xl transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <h4 class="text-lg font-semibold text-white mb-4">Desain Grafis & Vektor</h4>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Adobe Illustrator</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Figma</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Canva</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Desain UI/UX</span>
                    </div>
                </div>
                <div class="bg-zinc-800 p-10 rounded-2xl transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <h4 class="text-lg font-semibold text-white mb-4">Produksi Video & Motion Graphic</h4>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Adobe Premiere Pro</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Adobe After Effects</span>
                    </div>
                </div>
                <div class="bg-zinc-800 p-10 rounded-2xl transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <h4 class="text-lg font-semibold text-white mb-4">Manajemen Konten</h4>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Perencanaan Konten</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Manajemen Media Sosial (Instagram)</span>
                        <span class="bg-zinc-700 text-gray-300 px-4 py-2 rounded-full text-sm">Fotografi & Videografi Acara</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
