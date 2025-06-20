<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebProject;
use App\Models\Design;
use App\Models\EditedVideo;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    /**
     * Show the portfolio home page.
     */
    public function index(Request $request) // Add Request $request here
    {
        $searchTerm = $request->input('search');
        $selectedCategoryWeb = $request->input('category_web');
        $selectedCategoryDesign = $request->input('category_design');
        $selectedCategoryVideo = $request->input('category_video');

        // --- Web Projects Query ---
        $webProjectsQuery = WebProject::query();
        if ($searchTerm) {
            $webProjectsQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        if ($selectedCategoryWeb) {
            $webProjectsQuery->where('category', $selectedCategoryWeb);
        }
        $webProjects = $webProjectsQuery->latest()->paginate(8, ['*'], 'web_page');
        foreach ($webProjects as $project) {
            $project->technologies = $project->technologies ? json_decode($project->technologies, true) : [];
        }

        // --- Designs Query ---
        $designsQuery = Design::query();
        if ($searchTerm) {
            $designsQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        if ($selectedCategoryDesign) {
            $designsQuery->where('category', $selectedCategoryDesign);
        }
        $designs = $designsQuery->latest()->paginate(8, ['*'], 'design_page');
        foreach ($designs as $design) {
            // If you add more JSON fields to designs, decode here
        }

        // --- Edited Videos Query ---
        $editedVideosQuery = EditedVideo::query();
        if ($searchTerm) {
            $editedVideosQuery->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        if ($selectedCategoryVideo) {
            $editedVideosQuery->where('category', $selectedCategoryVideo);
        }
        $editedVideos = $editedVideosQuery->latest()->paginate(8, ['*'], 'video_page');
        foreach ($editedVideos as $video) {
            // If you add more JSON fields to videos, decode here
        }

        // Get distinct categories for filter dropdowns
        $webCategories = WebProject::select('category')->distinct()->whereNotNull('category')->where('category', '!=', '')->pluck('category');
        $designCategories = Design::select('category')->distinct()->whereNotNull('category')->where('category', '!=', '')->pluck('category');
        $videoCategories = EditedVideo::select('category')->distinct()->whereNotNull('category')->where('category', '!=', '')->pluck('category');

        // Pass the projects to the view
        return view('home', [
            'webProjects' => $webProjects,
            'designs' => $designs,
            'editedVideos' => $editedVideos,
            'webCategories' => $webCategories,
            'designCategories' => $designCategories,
            'videoCategories' => $videoCategories,
            'searchTerm' => $searchTerm,
            'selectedCategoryWeb' => $selectedCategoryWeb,
            'selectedCategoryDesign' => $selectedCategoryDesign,
            'selectedCategoryVideo' => $selectedCategoryVideo,
        ]);
    }

    /**
     * Handle contact form submission.
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email to your Gmail
        Mail::raw(
            "Pesan baru dari website personal:\n\n" .
            "Nama: {$validated['name']}\n" .
            "Email: {$validated['email']}\n" .
            "Subjek: {$validated['subject']}\n" .
            "Pesan: {$validated['message']}\n",
            function ($message) use ($validated) {
                $message->to(config('mail.from.address'))
                        ->subject('[Personal Web] Kontak: ' . $validated['subject']);
            }
        );

        return redirect()->back()->with('success', 'Pesan Anda telah dikirim!');
    }
}