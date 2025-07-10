@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <!-- Sidebar Navigation and Chairperson Info -->
        <div class="col-lg-2"> <!-- Reduced width from 3 to 2 -->
            <nav class="sidebar shadow-sm p-3"> <!-- Reduced padding -->
                <!-- Chairperson Information Section on the Left Side -->
                <section id="chairperson-info" class="mb-4 text-center p-3" style="background-color: #f9f9f9; border-radius: 8px;">
                    <h2 class="mb-3" style="font-weight: bold; color: #333; font-size: 18px;">Message from the Barangay Captain</h2>
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            @if($chairperson && $chairperson->image)
                                <img src="{{ asset('storage/' . $chairperson->image) }}" alt="Barangay Captain" class="img-fluid rounded-circle captain-image" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #ddd;">
                            @else
                                <img src="https://via.placeholder.com/120" alt="Barangay Captain" class="img-fluid rounded-circle captain-image" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #ddd;">
                            @endif
                        </div>
                        <div class="col-md-12 text-left mt-2">
                            <h3 class="captain-name" style="font-size: 16px; font-weight: bold; color: #555;">{{ $chairperson->name ?? 'Barangay Captain' }}</h3>
                            <p class="captain-designation" style="color: #777; font-size: 14px;">{{ $chairperson->designation ?? 'Barangay Captain' }}</p>
                            <p class="captain-message" style="font-size: 14px; color: #333;">{{ $chairperson->description ?? 'No message available.' }}</p>
                        </div>
                    </div>
                </section>

                <!-- Navigation Links -->
                <h5 class="sidebar-header text-center mb-3" style="font-size: 16px;">Content Navigation</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#gallery" class="sidebar-link" style="font-size: 14px;">Gallery</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#photo-release" class="sidebar-link" style="font-size: 14px;">Photo Release</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#speeches" class="sidebar-link" style="font-size: 14px;">Speeches</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#achievements" class="sidebar-link" style="font-size: 14px;">Achievements</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="col-lg-10"> <!-- Increased width for main content -->
            <!-- Dynamic Sections -->
            @php
                $sections = [
                    ['id' => 'gallery', 'title' => 'Gallery', 'items' => $galleries, 'lightbox' => true],
                    ['id' => 'photo-release', 'title' => 'Photo Release', 'items' => $photoReleases],
                    ['id' => 'speeches', 'title' => 'Speeches', 'items' => $speeches],
                    ['id' => 'achievements', 'title' => 'Achievements', 'items' => $achievements],
                ];
            @endphp

            @foreach($sections as $section)
                <section id="{{ $section['id'] }}" class="mb-5">
                    <h2 class="section-header">{{ $section['title'] }}</h2>
                    <div class="row">
                        @forelse($section['items'] as $item)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card shadow-sm h-100">
                                    <!-- Glightbox Integration -->
                                    <!-- Glightbox Link with Fullscreen and Close Button -->
                                    <a href="{{ asset('storage/' . $item->image) }}" title="{{ $item->name ?? $item->title }}" data-gallery="portfolio-gallery-{{ $section['id'] }}" class="glightbox preview-link">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name ?? $item->title }}" class="card-img-top img-fluid" style="height: 300px; object-fit: cover;">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No {{ strtolower($section['title']) }} available.</p>
                        @endforelse
                    </div>
                </section>
            @endforeach
        </div>
    </div>
</div>

<!-- Glightbox CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>


@endsection
