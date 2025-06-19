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
        $statsData = [
            'totalVisits' => '11.8M',
            'visitsGrowth' => '+2.5%',
            'newProjects' => '8.236K',
            'projectsGrowth' => '-1.2%',
            'activeProjects' => '2.352M',
            'activeGrowth' => '+11%',
            'completedProjects' => '8K',
            'completedGrowth' => '+5.2%',
        ];

        $countriesData = [
            ['name' => 'United States', 'flag' => '🇺🇸', 'percentage' => '27.5', 'users' => '4.5M'],
            ['name' => 'Australia', 'flag' => '🇦🇺', 'percentage' => '11.2', 'users' => '2.3M'],
            ['name' => 'China', 'flag' => '🇨🇳', 'percentage' => '9.4', 'users' => '2M'],
            ['name' => 'Germany', 'flag' => '🇩🇪', 'percentage' => '8', 'users' => '1.7M'],
            ['name' => 'Romania', 'flag' => '🇷🇴', 'percentage' => '7.9', 'users' => '1.6M'],
        ];

        return view('admin.dashboard', compact('statsData', 'countriesData'));
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
            'image' => 'nullable|image|max:2048',
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
            'image' => 'nullable|image|max:2048',
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
            'image' => 'nullable|image|max:2048',
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
            'image' => 'nullable|image|max:2048',
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
            'thumbnail' => 'nullable|image|max:2048',
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
            'thumbnail' => 'nullable|image|max:2048',
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
