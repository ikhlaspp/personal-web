@extends('layouts.app')
@section('title', isset($project) ? 'Edit Web Project' : 'Create Web Project')
@section('content')
<div class="max-w-xl mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6 text-white">{{ isset($project) ? 'Edit Web Project' : 'Add New Web Project' }}</h2>
    <form action="{{ isset($project) ? route('admin.web-projects.update', $project->id) : route('admin.web-projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif
        <div>
            <label class="block text-gray-300 mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3" required>
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Description</label>
            <textarea name="description" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3" required>{{ old('description', $project->description ?? '') }}</textarea>
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Category</label>
            <input type="text" name="category" value="{{ old('category', $project->category ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3" required>
        </div>
         <div>
            <label class="block text-gray-300 mb-1">URL</label>
            <input type="text" name="url" value="{{ old('url', $project->url ?? '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Technologies (comma separated)</label>
            <input type="text" name="technologies" value="{{ old('technologies', isset($project) && $project->technologies ? implode(', ', json_decode($project->technologies, true)) : '') }}" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
        </div>
        <div>
            <label class="block text-gray-300 mb-1">Image</label>
            @if(isset($project) && $project->image_path)
                <div class="mb-2">
                    <img src="{{ $project->image_path }}" alt="Current Image" class="h-20 rounded-lg border border-zinc-700">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full rounded-xl bg-zinc-800/50 border border-zinc-700/50 text-white px-4 py-3">
            @if($errors->has('image'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</div>
            @endif
        </div>
       
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.web-projects') }}" class="px-4 py-2 rounded-xl bg-zinc-700 text-gray-200">Cancel</a>
            <button type="submit" class="px-6 py-2 rounded-xl bg-blue-600 text-white font-semibold">{{ isset($project) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection
