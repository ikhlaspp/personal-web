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
                    Projects <span class="ml-2 rounded-full bg-gray-100 dark:bg-zinc-700 px-2.5 py-0.5 text-xs">6</span>
                </a>
                <a href="{{ route('admin.designs') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Designs <span class="ml-2 rounded-full bg-gray-100 dark:bg-zinc-700 px-2.5 py-0.5 text-xs">2</span>
                </a>
                <a href="{{ route('admin.videos') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-white px-1 py-4 text-sm font-medium border-b-2">
                    Videos
                </a>
            </nav>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <!-- Total Users Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Visits</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">11.8M</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <span>+2.5%</span>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Users Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">New Projects</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">8.236K</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
                                        <span>-1.2%</span>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Users Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Active Projects</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">2.352M</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <span>+11%</span>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Users Card -->
            <div class="bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Completed Projects</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">8K</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <span>+5.2%</span>
                                    </div>
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
                                    style="stroke-dasharray: 276.46; stroke-dashoffset: 91.23"/>
                            </svg>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">67%</span>
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

            <!-- Account Types Chart -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-6">Project Status</h3>
                <div class="relative">
                    <div class="flex items-center justify-center">
                        <div class="relative h-48 w-48">
                            <!-- Donut Chart -->
                            <svg class="w-full h-full" viewBox="0 0 100 100">
                                <circle class="text-blue-500" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    stroke-dasharray="276.46" stroke-dashoffset="69.115"/>
                                <circle class="text-indigo-500" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    stroke-dasharray="276.46" stroke-dashoffset="207.345"
                                    transform="rotate(90 50 50)"/>
                                <circle class="text-purple-500" stroke-width="8" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50"
                                    stroke-dasharray="276.46" stroke-dashoffset="138.23"
                                    transform="rotate(180 50 50)"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">Active</div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">45%</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">Pending</div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">35%</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">Completed</div>
                                <div class="text-lg font-semibold text-gray-900 dark:text-white">20%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Countries Map -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6 mb-8">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-6">Active Countries</h3>
            <div class="relative h-96">
                <!-- World Map Placeholder -->
                <div class="absolute inset-0 bg-gray-100 dark:bg-zinc-700/50 rounded-lg">
                    <div class="h-full w-full flex items-center justify-center text-gray-500">
                        World Map Visualization
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
                                    <tr>
                                        <td class="py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-4 w-6">🇺🇸</div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">United States</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-right text-sm text-gray-500">27.5%</td>
                                        <td class="py-4 whitespace-nowrap text-right text-sm text-gray-900 dark:text-white">4.5M</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-4 w-6">🇦🇺</div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">Australia</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-right text-sm text-gray-500">11.2%</td>
                                        <td class="py-4 whitespace-nowrap text-right text-sm text-gray-900 dark:text-white">2.3M</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-4 w-6">🇨🇳</div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">China</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-right text-sm text-gray-500">9.4%</td>
                                        <td class="py-4 whitespace-nowrap text-right text-sm text-gray-900 dark:text-white">2M</td>
                                    </tr>
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
