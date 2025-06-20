@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-zinc-900">
    <!-- Header -->
    <div class="bg-white dark:bg-zinc-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Dashboard</h1>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">
                        {{ now()->format('M d, Y') }}
                    </span>
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
                <a href="{{ route('admin.dashboard') }}" class="border-blue-500 text-blue-500 px-1 py-4 text-sm font-medium border-b-2">
                    Overview
                </a>
                <a href="{{ route('admin.web-projects') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Projects
                </a>
                <a href="{{ route('admin.designs') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Designs
                </a>
                <a href="{{ route('admin.videos') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Videos
                </a>
            </nav>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 mb-8">
            <!-- Web Projects Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L6 20.25M6 20.25L2.25 16.5M6 20.25V10.5M17.25 7L21 3.75M21 3.75L17.25 0M21 3.75H11.25" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Web Projects</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $webProjectsCount ?? 0 }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Designs Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Designs</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $designsCount ?? 0 }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Videos Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h16M4 18h16M4 6v12" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Videos</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $videosCount ?? 0 }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-8">
            <!-- Target Chart -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-6">Target Completion</h3>
                <div class="relative">
                    <div class="flex items-center justify-center">
                        <div class="relative h-48 w-48">
                            <!-- Progress Ring -->
                            <svg class="transform -rotate-90 w-full h-full" viewBox="0 0 100 100">
                                <circle class="text-gray-200 dark:text-zinc-700" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"/>
                                <circle class="text-blue-500" stroke-width="8" stroke-linecap="round" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    style="stroke-dasharray: 276.46; stroke-dashoffset: {{ 276.46 - (276.46 * ($completionPercent ?? 0) / 100) }}"/>
                            </svg>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $completionPercent ?? 0 }}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Achieved</span>
                            <span>Remaining</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Status Chart -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-6">Project Status</h3>
                <div class="relative">
                    <div class="flex items-center justify-center">
                        <div class="relative h-48 w-48">
                            <!-- Donut Chart -->
                            <svg class="w-full h-full" viewBox="0 0 100 100">
                                <circle class="text-blue-500" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    stroke-dasharray="276.46" stroke-dashoffset="{{ 276.46 - (276.46 * ($activePercent ?? 0) / 100) }}"/>
                                <circle class="text-indigo-500" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    stroke-dasharray="276.46" stroke-dashoffset="{{ 276.46 - (276.46 * ($pendingPercent ?? 0) / 100) }}"
                                    transform="rotate(90 50 50)"/>
                                <circle class="text-purple-500" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    stroke-dasharray="276.46" stroke-dashoffset="{{ 276.46 - (276.46 * ($completedPercent ?? 0) / 100) }}"
                                    transform="rotate(180 50 50)"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">Active</div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $activePercent ?? 0 }}%</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">Pending</div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $pendingPercent ?? 0 }}%</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">Completed</div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $completedPercent ?? 0 }}%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Table -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 dark:border-zinc-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Top Countries</h3>
            </div>
            <div class="px-6 py-4">
                <div class="flex flex-col">
                    <div class="-my-2 -mx-6">
                        <div class="inline-block min-w-full py-2 align-middle px-6">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                                        <th scope="col" class="py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Percentage</th>
                                        <th scope="col" class="py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Users</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                                    @if(!empty($topCountries))
                                        @foreach($topCountries as $country)
                                            <tr>
                                                <td class="py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-4 w-6">{{ $country['flag'] ?? '' }}</div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $country['name'] }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-4 whitespace-nowrap text-right text-sm text-gray-500">{{ $country['percent'] }}%</td>
                                                <td class="py-4 whitespace-nowrap text-right text-sm text-gray-900 dark:text-white">{{ $country['users'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="3" class="text-center py-4 text-gray-400">No data available</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
