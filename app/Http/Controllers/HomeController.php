<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import your models
use App\Models\WebProject;
use App\Models\Design;
use App\Models\EditedVideo;

class HomeController extends Controller
{
    /**
     * Display the home page with projects, designs, and videos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // --- Fetch Web Projects ---
        $webProjectsQuery = WebProject::query();
        $webProjects = $webProjectsQuery->orderBy('created_at', 'desc')->get();


        // --- Fetch Designs ---
        $designsQuery = Design::query();
        $designs = $designsQuery->orderBy('created_at', 'desc')->get();

        // --- Fetch Edited Videos ---
        $editedVideosQuery = EditedVideo::query();
        $editedVideos = $editedVideosQuery->orderBy('created_at', 'desc')->get();

        // --- Category Lists for Filters ---
        // These are no longer needed for the view if the filter dropdowns are removed.
        // If you need them for other purposes, you can keep them.
        // $webCategories = WebProject::distinct()->pluck('category')->filter()->sort()->values()->all();
        // $designCategories = Design::distinct()->pluck('category')->filter()->sort()->values()->all();
        // $videoCategories = EditedVideo::distinct()->pluck('category')->filter()->sort()->values()->all();

        // --- Define Slider Configuration ---
        $sliderConfig = [
            'webProjects' => [
                'scrollAmountMultiplier' => 1,
                'scrollByItem' => false,
                'alwaysShowButtons' => false,
            ],
            'designs' => [
                'scrollAmountMultiplier' => 0.8,
                'scrollByItem' => true,
                'alwaysShowButtons' => false,
            ],
            'editedVideos' => [
                'scrollAmountMultiplier' => 1,
                'scrollByItem' => false,
                'alwaysShowButtons' => true,
            ],
            'default' => [ // Fallback configuration
                'scrollAmountMultiplier' => 1,
                'scrollByItem' => false,
                'alwaysShowButtons' => false,
            ]
        ];

        return view('home', compact(
            'webProjects', 'designs', 'editedVideos',
            // 'searchTerm', // Removed
            // 'webCategories', 'selectedCategoryWeb', // Removed
            // 'designCategories', 'selectedCategoryDesign', // Removed
            // 'videoCategories', 'selectedCategoryVideo', // Removed
            'sliderConfig'
        ));
    }
}