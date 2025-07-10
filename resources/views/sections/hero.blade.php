<!-- resources/views/sections/hero.blade.php -->
<section id="hero">
    @if(isset($siteSetting->slider_images) && count($siteSetting->slider_images) > 0)
        <div id="slider" class="carousel slide custom-slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($siteSetting->slider_images as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Slider Image">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    @else
        <p>No slider images available.</p>
    @endif
</section>
