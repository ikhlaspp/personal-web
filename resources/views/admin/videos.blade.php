@extends('layouts.app')

@section('title', 'Videos')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-zinc-900">
    <!-- Header -->
    <div class="bg-white dark:bg-zinc-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Videos</h1>
                </div>
                <div class="flex items-center gap-4">
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Navigation Tabs -->
        <div class="mb-8 border-b border-gray-200 dark:border-zinc-700">
            <nav class="flex space-x-8" aria-label="Tabs">
                <a href="{{ route('admin.dashboard') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Overview
                </a>
                <a href="{{ route('admin.web-projects') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Projects
                </a>
                <a href="{{ route('admin.designs') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Designs 
                </a>
                <a href="{{ route('admin.videos') }}" class="border-blue-500 text-blue-500 px-1 py-4 text-sm font-medium border-b-2">
                    Videos
                </a>
            </nav>
        </div>

        <!-- Add New Video Button -->
        <div class="mb-8">
            <a href="{{ route('admin.videos.create') }}" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/20 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Video
            </a>
        </div>

        <!-- Videos Table List View -->
        <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="relative px-6 py-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                    @foreach($videos ?? [] as $video)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-16 flex-shrink-0">
                                    <img class="h-10 w-16 rounded-lg object-cover" src="{{ $video->thumbnail_path ?: 'https://placehold.co/160x100' }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $video->title ?? 'Video Title' }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($video->description ?? '', 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-zinc-700 text-gray-800 dark:text-gray-200">
                                {{ $video->category ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $video->created_at ? $video->created_at->format('M d, Y') : '' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.videos.edit', $video->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">Edit</a>
                                <button type="button" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 delete-btn" data-action="{{ route('admin.videos.destroy', $video->id) }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-xl p-8 w-full max-w-md">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Delete Confirmation</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Are you sure you want to delete this video? This action cannot be undone.</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end gap-2">
                        <button type="button" id="cancelDelete" class="px-4 py-2 rounded-xl bg-zinc-700 text-gray-200">Cancel</button>
                        <button type="submit" class="px-6 py-2 rounded-xl bg-red-600 text-white font-semibold">Delete</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteForm').setAttribute('action', this.getAttribute('data-action'));
            });
        });
        document.getElementById('cancelDelete').addEventListener('click', function() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteForm').setAttribute('action', '');
        });
        </script>
    </div>
</div>
@endsection
