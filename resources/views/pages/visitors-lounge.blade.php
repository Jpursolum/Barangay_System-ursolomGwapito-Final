@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3">
            <nav class="sidebar shadow-sm p-4">
                <h5 class="sidebar-header text-center mb-4">Visitors Lounge</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#churches" class="sidebar-link">Churches</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#hospitals" class="sidebar-link">Hospitals</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#hotels" class="sidebar-link">Hotels</a>
                    </li>

                    <li class="list-group-item">
                        <a href="#parks" class="sidebar-link">Parks</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#restaurants" class="sidebar-link">Restaurants</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#schools" class="sidebar-link">Schools</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#tourist-spots" class="sidebar-link">Tourist Spots</a>
                    </li>
                </ul>
            </nav>
        </div>

 

            <!-- Dynamic Sections -->
            @php
                $sections = [
                    ['id' => 'churches', 'title' => 'Churches', 'items' => $churches],
                    ['id' => 'hospitals', 'title' => 'Hospitals', 'items' => $hospitals],
                    ['id' => 'hotels', 'title' => 'Hotels', 'items' => $hotels],

                    ['id' => 'parks', 'title' => 'Parks', 'items' => $parks],
                    ['id' => 'restaurants', 'title' => 'Restaurants', 'items' => $restaurants],
                    ['id' => 'schools', 'title' => 'Schools', 'items' => $schools],
                    ['id' => 'tourist-spots', 'title' => 'Tourist Spots', 'items' => $touristSpots],
                ];
            @endphp

            @foreach($sections as $section)
                <section id="{{ $section['id'] }}" class="mb-5">
                    <h2 class="section-header">{{ $section['title'] }}</h2>
                    <div class="row">
                        @forelse($section['items'] as $item)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card shadow-sm h-100">
                                    <!-- Glightbox Link with Fullscreen and Close Button -->
                                    <a href="{{ asset('storage/' . $item->image) }}" title="{{ $item->name ?? $item->title }}" data-gallery="portfolio-gallery-{{ $section['id'] }}" class="glightbox preview-link">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name ?? $item->title }}" class="card-img-top img-fluid" style="height: 300px; object-fit: cover;">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name ?? $item->title }}</h5>
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
@endsection
