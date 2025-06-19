@extends('layouts.app')
@section('title', isset($video) ? 'Edit Video' : 'Create Video')
@section('content')
<div class="max-w-xl mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-white">{{ isset($video) ? 'Edit Video' : 'Add New Video' }}</h2>
    <form action="{{ isset($video) ? route('admin.videos.update', $video->id) : route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($video))
            @method('PUT')
        @endif
        <div>
            <label class="block text-gray-300 mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $video->title ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3" required>
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Description</label>
            <textarea name="description" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">{{ old('description', $video->description ?? '') }}</textarea>
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Category</label>
            <input type="text" name="category" value="{{ old('category', $video->category ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Video URL</label>
            <input type="text" name="video_url" value="{{ old('video_url', $video->video_url ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Software Used</label>
            <input type="text" name="software_used" value="{{ old('software_used', $video->software_used ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Duration (seconds)</label>
            <input type="number" name="duration_seconds" value="{{ old('duration_seconds', $video->duration_seconds ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Thumbnail</label>
            @if(isset($video) && $video->thumbnail_path)
                <div class="mb-2">
                    <img src="{{ $video->thumbnail_path }}" alt="Current Thumbnail" class="h-20 rounded-lg border border-zinc-700">
                </div>
            @endif
            <input type="file" name="thumbnail" accept="image/*" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
            @if($errors->has('thumbnail'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('thumbnail') }}</div>
            @endif
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.videos') }}" class="px-4 py-2 rounded-xl bg-zinc-700 text-gray-200">Cancel</a>
            <button type="submit" class="px-6 py-2 rounded-xl bg-blue-600 text-white font-semibold">
                {{ isset($video) ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
@endsection
