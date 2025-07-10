@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <!-- Main Content Area (Left Column) -->
        <div class="col-lg-9">
            <!-- Chairperson Information Section -->
            {{-- Uncomment if you want to display Chairperson Information --}}
            {{-- 
            <section id="chairperson-info" class="mb-5 text-center p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Association And Foundation</h2>
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        @if($chairperson && $chairperson->image)
                            <img src="{{ asset('storage/' . $chairperson->image) }}" alt="Barangay Captain" class="img-fluid rounded-circle captain-image" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Barangay Captain" class="img-fluid rounded-circle captain-image" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;">
                        @endif
                    </div>
                    <div class="col-md-8 text-left">
                        <h3 class="captain-name" style="font-size: 24px; font-weight: bold; color: #555;">{{ $chairperson->name ?? 'Barangay Captain' }}</h3>
                        <p class="captain-designation" style="color: #777;">{{ $chairperson->designation ?? 'Barangay Captain' }}</p>
                        <p class="captain-message" style="font-size: 16px; color: #333;">{{ $chairperson->description ?? 'No message available.' }}</p>
                    </div>
                </div>
            </section>
            --}}

            <!-- Dynamic Sections (Content Moved to Left) -->
            @php
                $sections = [
                    ['id' => 'ordinances', 'title' => 'Ordinance', 'items' => $ordinances],
                    ['id' => 'resolution', 'title' => 'Resolution', 'items' => $resolutions],
                    ['id' => 'assocfound', 'title' => 'Association & Foundation', 'items' => $assocfound],
                ];
            @endphp

            @foreach($sections as $section)
                <section id="{{ $section['id'] }}" class="mb-5">
                    <h2 class="section-header">{{ $section['title'] }}</h2>
                    <ul>
                        @forelse($section['items'] as $item)
                            <li><strong>{{ $item->name }}</strong> - {{ $item->description }}</li>
                        @empty
                            <p class="text-muted">No {{ strtolower($section['title']) }} available.</p>
                        @endforelse
                    </ul>
                </section>
            @endforeach
        </div>

        <!-- Sidebar Navigation (Right Column) -->
        <div class="col-lg-3">
            <nav class="sidebar shadow-sm p-4">
                <h5 class="sidebar-header text-center mb-">Visitors Lounge</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#ordinances" class="sidebar-link">Ordinance</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#resolution" class="sidebar-link">Resolution</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#assocfound" class="sidebar-link">Association & Foundation</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
