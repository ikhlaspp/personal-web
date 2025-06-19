{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home') {{-- Sets the title for this specific page --}}

@section('content')
 
    <!-- All Projects Section: Displays a grid of smaller project cards -->
    <section>
        <!-- Web Projects -->
        <h3 class="text-2xl md:text-3xl font-semibold text-white mt-10 mb-6">Web Projects</h3>
        @if($webProjects->count() > 0)
            <div class="relative project-slider-container group" data-slider-type="webProjects">
                <div class="slider-track flex overflow-x-auto scroll-smooth scrollbar-hide py-4 -mx-2 px-2">
                    @foreach ($webProjects as $project)
                        <div class="slider-item flex-shrink-0 w-[280px] sm:w-[300px] md:w-[320px] px-2">
                            <div class="bg-zinc-900 rounded-xl shadow-xl overflow-hidden h-full transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer border border-zinc-800 inner-group">
                                <img src="{{ $project->image_path ?: 'https://placehold.co/600x400/cccccc/FFFFFF?text=No+Image' }}" alt="{{ $project->title }}" class="w-full h-48 object-cover object-center inner-group-hover:opacity-90 transition duration-300">
                                <div class="p-4 flex flex-col" style="min-height: 180px;">
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2 inner-group-hover:text-blue-500 transition duration-300 line-clamp-2">{{ $project->title }}</h3>
                                        <p class="text-gray-300 text-sm line-clamp-3 mb-3">{{ $project->description }}</p>
                                        <div class="flex flex-wrap gap-1 mb-3">
                                            @if (is_array($project->technologies) && count($project->technologies))
                                                @foreach ($project->technologies as $techItem)
                                                    <span class="bg-zinc-800 text-gray-400 text-xs px-2 py-0.5 rounded-full">{{ $techItem }}</span>
                                                @endforeach
                                            @endif
                                            @if ($project->category)
                                                <span class="bg-zinc-700 text-gray-300 text-xs px-2 py-0.5 rounded-full capitalize">{{ $project->category }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mt-auto pt-2">
                                        <a href="{{ $project->url ?: '#' }}" target="_blank" class="text-blue-500 hover:text-blue-400 text-sm font-semibold">View More &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Navigation Arrows -->
                <button aria-label="Previous" class="slider-prev-btn absolute top-1/2 left-0 -translate-x-1/2 sm:left-2 sm:-translate-x-0 transform -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 text-white p-2 rounded-full z-10 flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button aria-label="Next" class="slider-next-btn absolute top-1/2 right-0 translate-x-1/2 sm:right-2 sm:translate-x-0 transform -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 text-white p-2 rounded-full z-10 flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        @else
            @if(request()->hasAny(['search', 'category_web']))
                <p class="text-gray-400 py-4 text-center">No web projects found matching your criteria.</p>
            @else
                <p class="text-gray-400 py-4">No web projects to display at the moment.</p> {{-- Default message if no filters and no projects --}}
            @endif
        @endif

        <!-- Designs -->
        <h3 class="text-2xl md:text-3xl font-semibold text-white mt-10 mb-6">Designs</h3>
        @if($designs->count() > 0)
            <div class="relative project-slider-container group" data-slider-type="designs">
                <div class="slider-track flex overflow-x-auto scroll-smooth scrollbar-hide py-4 -mx-2 px-2">
                    @foreach ($designs as $design)
                        <div class="slider-item flex-shrink-0 w-[280px] sm:w-[300px] md:w-[320px] px-2">
                            <div class="bg-zinc-900 rounded-xl shadow-xl overflow-hidden h-full transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer border border-zinc-800 inner-group">
                                <img src="{{ $design->image_path ?: 'https://placehold.co/600x400/cccccc/FFFFFF?text=No+Image' }}" alt="{{ $design->title }}" class="w-full h-48 object-cover object-center inner-group-hover:opacity-90 transition duration-300">
                                <div class="p-4 flex flex-col" style="min-height: 180px;">
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2 inner-group-hover:text-blue-500 transition duration-300 line-clamp-2">{{ $design->title }}</h3>
                                        <p class="text-gray-300 text-sm line-clamp-3 mb-3">{{ $design->description }}</p>
                                        <div class="flex flex-wrap gap-1 mb-3">
                                            @if ($design->tool)
                                                <span class="bg-zinc-800 text-gray-400 text-xs px-2 py-0.5 rounded-full">{{ $design->tool }}</span>
                                            @endif
                                            @if ($design->category)
                                                <span class="bg-zinc-700 text-gray-300 text-xs px-2 py-0.5 rounded-full capitalize">{{ $design->category }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Removed Learn More link -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Navigation Arrows -->
                <button aria-label="Previous" class="slider-prev-btn absolute top-1/2 left-0 -translate-x-1/2 sm:left-2 sm:-translate-x-0 transform -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 text-white p-2 rounded-full z-10 flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button aria-label="Next" class="slider-next-btn absolute top-1/2 right-0 translate-x-1/2 sm:right-2 sm:translate-x-0 transform -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 text-white p-2 rounded-full z-10 flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        @else
            @if(request()->hasAny(['search', 'category_design']))
                <p class="text-gray-400 py-4 text-center">No designs found matching your criteria.</p>
            @else
                <p class="text-gray-400 py-4">No designs to display at the moment.</p>
            @endif
        @endif

        <!-- Edited Videos -->
        <h3 class="text-2xl md:text-3xl font-semibold text-white mt-10 mb-6">Edited Videos</h3>
        @if($editedVideos->count() > 0)
            <div class="relative project-slider-container group" data-slider-type="editedVideos">
                <div class="slider-track flex overflow-x-auto scroll-smooth scrollbar-hide py-4 -mx-2 px-2">
                    @foreach ($editedVideos as $video)
                        <div class="slider-item flex-shrink-0 w-[280px] sm:w-[300px] md:w-[320px] px-2">
                            <div class="bg-zinc-900 rounded-xl shadow-xl overflow-hidden h-full transform hover:scale-105 transition duration-300 ease-in-out cursor-pointer border border-zinc-800 inner-group">
                                <img src="{{ $video->thumbnail_path ?: 'https://placehold.co/600x400/cccccc/FFFFFF?text=No+Image' }}" alt="{{ $video->title }}" class="w-full h-48 object-cover object-center inner-group-hover:opacity-90 transition duration-300">
                                <div class="p-4 flex flex-col" style="min-height: 180px;">
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2 inner-group-hover:text-blue-500 transition duration-300 line-clamp-2">{{ $video->title }}</h3>
                                        <p class="text-gray-300 text-sm line-clamp-3 mb-3">{{ $video->description }}</p>
                                        <div class="flex flex-wrap gap-1 mb-3">
                                            @if ($video->software_used)
                                                <span class="bg-zinc-800 text-gray-400 text-xs px-2 py-0.5 rounded-full">{{ $video->software_used }}</span>
                                            @endif
                                            @if ($video->category)
                                                <span class="bg-zinc-700 text-gray-300 text-xs px-2 py-0.5 rounded-full capitalize">{{ $video->category }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Removed Watch Video link, add hidden video_url for JS -->
                                    <input type="hidden" class="video-url" value="{{ $video->video_url }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Navigation Arrows -->
                <button aria-label="Previous" class="slider-prev-btn absolute top-1/2 left-0 -translate-x-1/2 sm:left-2 sm:-translate-x-0 transform -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 text-white p-2 rounded-full z-10 flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button aria-label="Next" class="slider-next-btn absolute top-1/2 right-0 translate-x-1/2 sm:right-2 sm:translate-x-0 transform -translate-y-1/2 bg-zinc-800 hover:bg-zinc-700 text-white p-2 rounded-full z-10 flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        @else
            @if(request()->hasAny(['search', 'category_video']))
                <p class="text-gray-400 py-4 text-center">No videos found matching your criteria.</p>
            @else
                <p class="text-gray-400 py-4">No videos to display at the moment.</p>
            @endif
        @endif

        <!-- Overall No Projects Found -->
        @if ($webProjects->count() === 0 && $designs->count() === 0 && $editedVideos->count() === 0)
            <div class="text-center text-gray-400 py-8 mt-10">
                @if(request()->hasAny(['search', 'category_web', 'category_design', 'category_video']))
                    No projects found matching your criteria.
                @else
                    No projects to display at the moment.
                @endif
            </div>
        @endif
    </section>

    <!-- Modal for Project Details -->
    <div id="projectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 hidden">
        <div class="bg-zinc-900 rounded-2xl shadow-2xl max-w-2xl w-full relative text-white flex flex-col max-h-[90vh]">
            <button id="closeProjectModal" class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl">&times;</button>
            <div id="modalImageContainer" class="flex-shrink-0 w-full">
                <!-- Image will be injected here -->
            </div>
            <div id="modalContent" class="overflow-y-auto p-8 flex-1 min-h-0">
                <!-- Dynamic content will be injected here -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sliders = document.querySelectorAll('.project-slider-container');

        sliders.forEach(slider => {
            const track = slider.querySelector('.slider-track');
            const prevButton = slider.querySelector('.slider-prev-btn');
            const nextButton = slider.querySelector('.slider-next-btn');
            const items = track.querySelectorAll('.slider-item');

            if (!track || !prevButton || !nextButton || items.length === 0) {
                if(prevButton) prevButton.style.display = 'none';
                if(nextButton) nextButton.style.display = 'none';
                return;
            }

            const updateButtonStates = () => {
                if (!items || items.length === 0) {
                    if(prevButton) prevButton.style.display = 'none';
                    if(nextButton) nextButton.style.display = 'none';
                    return;
                }

                const clientWidth = track.clientWidth;
                const scrollWidth = track.scrollWidth;
                const scrollLeft = track.scrollLeft;
                const isScrollable = scrollWidth > clientWidth + 1;
                const canScrollPrev = scrollLeft > 5;
                const canScrollNext = Math.ceil(scrollLeft) < (scrollWidth - clientWidth - 5);

                prevButton.style.display = isScrollable ? 'flex' : 'none';
                nextButton.style.display = isScrollable ? 'flex' : 'none';
                prevButton.disabled = !canScrollPrev;
                nextButton.disabled = !canScrollNext;

                [prevButton, nextButton].forEach(btn => {
                    if (btn.disabled) {
                        btn.classList.add('opacity-50', 'cursor-not-allowed');
                        btn.classList.remove('hover:bg-zinc-700');
                    } else {
                        btn.classList.remove('opacity-50', 'cursor-not-allowed');
                        btn.classList.add('hover:bg-zinc-700');
                    }
                });
            };

            nextButton.addEventListener('click', () => {
                if (items.length === 0) return;
                let itemWidth = items[0].offsetWidth;
                let scrollAmount = itemWidth + 16; // account for padding (px-2 = 8px * 2)
                track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                setTimeout(updateButtonStates, 500);
            });

            prevButton.addEventListener('click', () => {
                if (items.length === 0) return;
                let itemWidth = items[0].offsetWidth;
                let scrollAmount = itemWidth + 16;
                track.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                setTimeout(updateButtonStates, 500);
            });

            let scrollTimeout;
            track.addEventListener('scroll', () => {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(updateButtonStates, 150);
            });

            updateButtonStates();
            window.addEventListener('resize', updateButtonStates);
        });

        // Modal logic
        function openModal(contentHtml, imgHtml) {
            document.getElementById('modalImageContainer').innerHTML = imgHtml;
            document.getElementById('modalContent').innerHTML = contentHtml;
            document.getElementById('projectModal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('projectModal').classList.add('hidden');
            document.getElementById('modalContent').innerHTML = '';
            document.getElementById('modalImageContainer').innerHTML = '';
        }
        document.getElementById('closeProjectModal').addEventListener('click', closeModal);
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
        document.getElementById('projectModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
        document.querySelectorAll('.slider-item .bg-zinc-900').forEach(function(card) {
            card.addEventListener('click', function() {
                const img = card.querySelector('img').src;
                const imgAlt = card.querySelector('img').alt;
                const title = card.querySelector('h3').textContent;
                const desc = card.querySelector('p').textContent;
                let tags = '';
                card.querySelectorAll('span').forEach(function(tag) {
                    tags += `<span class='bg-zinc-800 text-gray-400 text-xs px-2 py-0.5 rounded-full mr-1'>${tag.textContent}</span>`;
                });
                // Use hidden input for video_url if present
                let videoUrlInput = card.querySelector('input.video-url');
                let videoUrl = videoUrlInput ? videoUrlInput.value : null;
                let imgHtml = '';
                if (videoUrl) {
                    if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                        let videoId = null;
                        const match = videoUrl.match(/[?&]v=([^&]+)/);
                        if (match) videoId = match[1];
                        else if (videoUrl.includes('youtu.be/')) videoId = videoUrl.split('youtu.be/')[1].split(/[?&]/)[0];
                        if (videoId && videoId.length >= 8) {
                            imgHtml = `<div class='w-full aspect-video mb-4'><iframe src='https://www.youtube.com/embed/${videoId}?start=0' frameborder='0' allowfullscreen class='w-full h-full rounded-t-2xl'></iframe></div>`;
                        } else {
                            imgHtml = `<img src='${img}' alt='${imgAlt}' class='w-full max-h-[60vh] object-contain rounded-t-2xl' style='background:#222'/>`;
                        }
                    } else if (videoUrl.includes('drive.google.com')) {
                        let driveId = null;
                        const driveMatch = videoUrl.match(/\/d\/([\w-]+)/);
                        if (driveMatch) driveId = driveMatch[1];
                        if (!driveId) {
                            const altMatch = videoUrl.match(/id=([\w-]+)/);
                            if (altMatch) driveId = altMatch[1];
                        }
                        if (driveId) {
                            imgHtml = `<div class='w-full aspect-video mb-4'><iframe src='https://drive.google.com/file/d/${driveId}/preview' frameborder='0' allowfullscreen class='w-full h-full rounded-t-2xl'></iframe></div>`;
                        } else {
                            imgHtml = `<img src='${img}' alt='${imgAlt}' class='w-full max-h-[60vh] object-contain rounded-t-2xl' style='background:#222'/>`;
                        }
                    } else {
                        imgHtml = `<img src='${img}' alt='${imgAlt}' class='w-full max-h-[60vh] object-contain rounded-t-2xl' style='background:#222'/>`;
                    }
                } else {
                    imgHtml = `<img src='${img}' alt='${imgAlt}' class='w-full max-h-[60vh] object-contain rounded-t-2xl' style='background:#222'/>`;
                }
                let html = `
                    <h2 class='text-2xl font-bold mb-2'>${title}</h2>
                    <div class='mb-3'>${tags}</div>
                    <div class='text-gray-300 mb-4' style='max-height:200px;overflow-y:auto;'>${desc}</div>
                `;
                openModal(html, imgHtml);
            });
        });
    });
</script>
@endpush