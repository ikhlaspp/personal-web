<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebProject;
use App\Models\Design;
use App\Models\EditedVideo;

class AdminController extends Controller
{
    public function dashboard()
    {
        $webProjectsCount = \App\Models\WebProject::count();
        $designsCount = \App\Models\Design::count();
        $videosCount = \App\Models\EditedVideo::count();

        // Example: Calculate completion percent (customize as needed)
        $totalProjects = $webProjectsCount + $designsCount + $videosCount;
        $completedProjects = $webProjectsCount; // Example: treat web projects as completed
        $completionPercent = $totalProjects > 0 ? round(($completedProjects / $totalProjects) * 100) : 0;

        // Example: Project status (customize as needed)
        $activePercent = 45;
        $pendingPercent = 35;
        $completedPercent = 20;

        // Example: Active countries (customize as needed)
        $activeCountries = [
            'United States' => 27.5,
            'Australia' => 11.2,
            'China' => 9.4,
        ];
        $topCountries = [
            ['flag' => '🇺🇸', 'name' => 'United States', 'percent' => 27.5, 'users' => '4.5M'],
            ['flag' => '🇦🇺', 'name' => 'Australia', 'percent' => 11.2, 'users' => '2.3M'],
            ['flag' => '🇨🇳', 'name' => 'China', 'percent' => 9.4, 'users' => '2M'],
        ];

        return view('admin.dashboard', compact(
            'webProjectsCount',
            'designsCount',
            'videosCount',
            'completionPercent',
            'activePercent',
            'pendingPercent',
            'completedPercent',
            'activeCountries',
            'topCountries',
        ));
    }

    public function webProjects()
    {
        $webProjects = WebProject::latest()->get();
        return view('admin.web-projects', compact('webProjects'));
    }

    public function designs()
    {
        $designs = Design::latest()->get();
        return view('admin.designs', compact('designs'));
    }

    public function videos()
    {
        $videos = EditedVideo::latest()->get();
        return view('admin.videos', compact('videos'));
    }

    // Web Projects CRUD
    public function createWebProject() {
        $project = null;
        $method = 'POST';
        $action = route('admin.web-projects.store');
        return view('admin.web-projects-form', compact('project', 'method', 'action'));
    }
    public function storeWebProject(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'nullable|string',
            'url' => 'nullable|string',
            'technologies' => 'nullable|string',
            'image' => 'nullable|image|max:5120', // 5MB
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('web-projects', 'public');
            $data['image_path'] = '/storage/' . $path;
        }
        // Handle technologies as JSON
        if (!empty($data['technologies'])) {
            $data['technologies'] = json_encode(array_map('trim', explode(',', $data['technologies'])));
        }
        WebProject::create($data);
        return redirect()->route('admin.web-projects')->with('success', 'Project created!');
    }
    public function editWebProject($id) {
        $project = \App\Models\WebProject::findOrFail($id);
        $method = 'PUT';
        $action = route('admin.web-projects.update', $project->id);
        return view('admin.web-projects-form', compact('project', 'method', 'action'));
    }
    public function updateWebProject(Request $request, $id) {
        $project = WebProject::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'nullable|string',
            'url' => 'nullable|string',
            'technologies' => 'nullable|string',
            'image' => 'nullable|image|max:5120', // 5MB
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('web-projects', 'public');
            $data['image_path'] = '/storage/' . $path;
        }
        // Handle technologies as JSON
        if (!empty($data['technologies'])) {
            $data['technologies'] = json_encode(array_map('trim', explode(',', $data['technologies'])));
        }
        $project->update($data);
        return redirect()->route('admin.web-projects')->with('success', 'Project updated!');
    }
    public function destroyWebProject($id) {
        $project = WebProject::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.web-projects')->with('success', 'Project deleted!');
    }

    // Designs CRUD
    public function createDesign() {
        $design = null;
        $method = 'POST';
        $action = route('admin.designs.store');
        return view('admin.designs-form', compact('design', 'method', 'action'));
    }
    public function storeDesign(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|max:5120', // 5MB
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('designs', 'public');
            $data['image_path'] = '/storage/' . $path;
        }
        Design::create($data);
        return redirect()->route('admin.designs')->with('success', 'Design created!');
    }
    public function editDesign($id) {
        $design = \App\Models\Design::findOrFail($id);
        $method = 'PUT';
        $action = route('admin.designs.update', $design->id);
        return view('admin.designs-form', compact('design', 'method', 'action'));
    }
    public function updateDesign(Request $request, $id) {
        $design = Design::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|max:5120', // 5MB
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('designs', 'public');
            $data['image_path'] = '/storage/' . $path;
        }
        $design->update($data);
        return redirect()->route('admin.designs')->with('success', 'Design updated!');
    }
    public function destroyDesign($id) {
        $design = Design::findOrFail($id);
        $design->delete();
        return redirect()->route('admin.designs')->with('success', 'Design deleted!');
    }

    // Videos CRUD
    public function createVideo() {
        $video = null;
        $method = 'POST';
        $action = route('admin.videos.store');
        return view('admin.videos-form', compact('video', 'method', 'action'));
    }
    public function storeVideo(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'video_url' => 'nullable|string',
            'software_used' => 'nullable|string',
            'duration_seconds' => 'nullable|integer',
            'thumbnail' => 'nullable|image|max:5120', // 5MB
        ]);
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('videos', 'public');
            $data['thumbnail_path'] = '/storage/' . $path;
        }
        EditedVideo::create($data);
        return redirect()->route('admin.videos')->with('success', 'Video created!');
    }
    public function editVideo($id) {
        $video = \App\Models\EditedVideo::findOrFail($id);
        $method = 'PUT';
        $action = route('admin.videos.update', $video->id);
        return view('admin.videos-form', compact('video', 'method', 'action'));
    }
    public function updateVideo(Request $request, $id) {
        $video = EditedVideo::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'video_url' => 'nullable|string',
            'software_used' => 'nullable|string',
            'duration_seconds' => 'nullable|integer',
            'thumbnail' => 'nullable|image|max:5120', // 5MB
        ]);
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('videos', 'public');
            $data['thumbnail_path'] = '/storage/' . $path;
        }
        $video->update($data);
        return redirect()->route('admin.videos')->with('success', 'Video updated!');
    }
    public function destroyVideo($id) {
        $video = EditedVideo::findOrFail($id);
        $video->delete();
        return redirect()->route('admin.videos')->with('success', 'Video deleted!');
    }
}
