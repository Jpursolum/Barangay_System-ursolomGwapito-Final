
@php
    // Fetch the first site setting
    $siteSetting = \App\Models\SiteSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>BARANGAY CENTRO 2</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="template/img/favicon.png" rel="icon">
  <link href="template/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css')}}"" rel="stylesheet">
  <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css ')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('template/css/main.css') }}" rel="stylesheet">

 
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="#hero" class="logo d-flex align-items-center me-auto me-xl-0">
        @if ($siteSetting && $siteSetting->logo)
          <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Barangay Logo" style="max-height: 50px;">
        @else
          <img src="https://via.placeholder.com/50x50.png?text=Logo" alt="Barangay Logo"> <!-- Fallback logo -->
        @endif
        <h1 class="sitename">BARANGAY</h1>CENTRO 2<span></span>
      </a>
      

      <nav id="navmenu" class="navmenu" style="display: flex; justify-content: center; padding: 0;">
        <ul style="list-style: none; display: flex; padding: 0; margin: 0; justify-content: center;">
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li class="dropdown">
          <a href="#"><span>Programs</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#portfolio">Sk Programs</a></li>
            <li><a href="#faq">Agkaykaysa Programs</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#"><span>Community Updates</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#ACTIVITIES">Activities</a></li>
            <li><a href="#latest_events">Latest Events</a></li>
            <li><a href="#latest_news">Latest News</a></li>
          </ul>
        </li>



          <li class="dropdown">
          <a href="#"><span>Barangay Officials & Health Workers</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#team">Barangay officials</a></li>
              <li><a href="#bhw">Barangay Health Worker</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#"><span>Residents</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{url('visitors-lounge')}}">Visitor's Lounge</a></li>

              <li><a href="#citizens-charter">Citizens Charter</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      
          
          {{-- <li><a href="#pricing">Pricing</a></li> --}}

          


          {{-- <li><a href="#blog">Blog</a></li> --}}
          
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}">
        {{ auth()->check() ? 'Dashboard' : 'Login' }}
    </a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    {{-- <section id="hero" class="hero section dark-background" style="position: relative; overflow: hidden;"> --}}

        <!-- Background Image -->
        {{-- <img src="assets/img/hero-bg.jpg" alt="" class="background-image" data-aos="fade-in" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;"> --}}

        <!-- Content Container -->
       <!-- Content Container -->
       {{-- <section id="hero" class="hero section dark-background"> --}}
        <!-- Full-width Slider Container -->
        
        <div class="container-fluid position-relative" style="z-index: 1; padding: 0;">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <!-- Slider Section -->
                    @if(isset($siteSetting->slider_images) && is_array($siteSetting->slider_images) && count($siteSetting->slider_images) > 0)
                    <div id="slider" class="carousel slide custom-slider" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($siteSetting->slider_images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 slider-image" alt="Slider Image {{ $index + 1 }}">
                            </div>
                            @endforeach
                        </div>
                        <!-- Controls for Slider -->
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
                </div>
            </div>
        </div>
    </section>

    {{-- </section><!-- /Hero Section --> --}}

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          {{-- brgy captains corner  --}}
          
        </div>

      </div>

    </section><!-- /Clients Section -->

<!-- Barangay Captain Section -->
<section id="barangay-captain" class="barangay-captain-section py-5 bg-light">
  <div class="container">
      <h2 class="section-title text-center mb-5">Barangay Chairperson's Corner</h2>
      @if(isset($chairperson))
          <div class="row align-items-center">
              <div class="col-md-4 text-center mb-4 mb-md-0">
                  @if($chairperson->image)
                      <img src="{{ asset('storage/' . $chairperson->image) }}" 
                           alt="Portrait of {{ $chairperson->name ?? 'Barangay Captain' }}" 
                           class="img-fluid rounded-circle captain-image neon-glow-effect">
                  @else
                      <img src="https://via.placeholder.com/150" 
                           alt="Default placeholder for Barangay Captain" 
                           class="img-fluid rounded-circle captain-image neon-glow-effect"> 
                  @endif
              </div>
              <div class="col-md-8">
                  <h3 class="captain-name fw-bold">{{ $chairperson->name ?? 'Barangay Captain' }}</h3>
                  <p class="captain-designation text-muted">{{ $chairperson->designation ?? 'Barangay Captain' }}</p>
                  <p class="captain-message">{{ $chairperson->message ?? 'No message available.' }}</p>
                  
                  <!-- Button Link to More Details -->
                  <a href="{{ route('barangay.captain.details') }}" class="btn btn-primary mt-3">
                      Read More
                  </a>
              </div>
          </div>
      @else
          <div class="text-center">
              <p class="text-muted">Barangay Captain's information is currently unavailable.</p>
          </div>
      @endif
  </div>
</section>

<!-- CSS for Neon Green Glow Effect -->
<style>
  .neon-glow-effect {
      position: relative;
      transition: transform 0.3s ease-in-out;
  }

  /* Neon Green Glow Effect */
  .neon-glow-effect::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      border-radius: 50%;
      box-shadow: 0 0 15px 5px rgba(57, 255, 20, 0.7);
      opacity: 0;
      animation: neon-glow 2s infinite alternate;
      z-index: -1;
  }

  /* Pulsating Neon Green Animation */
  @keyframes neon-glow {
      0% {
          box-shadow: 0 0 15px 5px rgba(57, 255, 20, 0.5);
          opacity: 0.7;
      }
      100% {
          box-shadow: 0 0 30px 15px rgba(57, 255, 20, 1);
          opacity: 1;
      }
  }

  /* Hover Effect for Interaction */
  .neon-glow-effect:hover {
      transform: scale(1.05);
  }
</style>





    <!-- About Section -->
    <section id="about" class="about section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>BRIEF HISTORY OF BARANGAY CENTRO 2</h2>
            <p>In 1842, Centro 2 was just a sitio of Malolokit, a barrio of Pamplona. When it was requested to be separated, and was granted, they officially changed the name of Malolokit to Sanchez Mira in honor of the late Manuel Sanchez Mira, who was then assigned to Cagayan Valley.</p>
            <p>With the issuance of the Magna Carta, Barangay Centro 2 was created.</p>
            <p>In 1883, a group of farmers, fishermen, and hunters landed at Masisit by boat from Ilocos Norte. Some of the groups settled at Centro 2, although the area was quite a jungle at the time. The families of the early settlers, including the Mangligot, Negres, Galanos, Cacatian, Maltos, and Arjonillios, laboriously cleared the land and began building homes. Inspired by the abundance of resources in the area, they settled and thrived. Other families followed suit and contributed to the community's growth.</p>
            <p>In 1935, the leaders of Centro 2, through the SILAW ORGANIZATION and with the cooperation of the residents, erected the Sanchez Mira West Central Elementary School. The land for the school was purchased from Mr. Ponciano Mangosing, who donated part of it for the project.</p>
            
            <a href="{{route('assoc.foundation')}}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Mission</h3>
                  <p>To provide satisfactory services through democratic leadership that enables the people to become politically responsible, morally upright, and economically capable.</p>
                </div>
              </div> <!-- End Icon Box -->

               <!-- End Icon Box -->

             <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Vision</h3>
                  <p>An exemplary barangay with unified, disciplined, and God-loving constituents working together towards prosperity</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->

    
<!-- Demographic Stats Section -->
<section id="services" class="stats-section py-5 bg-light">
  <div class="container section-title">
      <h2 class="section-title text-center" style="font-size: 2rem;">Demographic Statistics</h2>
      <div class="row text-center mb-4">
          <!-- Total Population, Male, and Female Counts Display -->
          <div class="col-md-4">
              <p><strong style="font-size: 1.2rem;">Total Population:</strong> {{ number_format($totalPopulation) }}</p>
          </div>
          <div class="col-md-4">
              <p><strong style="font-size: 1.2rem;">Male Count:</strong> {{ number_format($maleCount) }}</p>
          </div>
          <div class="col-md-4">
              <p><strong style="font-size: 1.2rem;">Female Count:</strong> {{ number_format($femaleCount) }}</p>
          </div>
      </div>

      <div class="row">
          <!-- Gender Distribution Pie Chart -->
          <div class="col-md-6">
              <h4 class="text-center" style="font-size: 1.5rem;">Gender Distribution</h4>
              <canvas id="genderChart" style="max-width: 85%;"></canvas>
          </div>

          <!-- Population by Age Groups Pie Chart -->
          <div class="col-md-6">
              <h4 class="text-center" style="font-size: 1.5rem;">Population by Age Groups</h4>
              <canvas id="ageGroupChart" style="max-width: 85%;"></canvas>
          </div>
      </div>
  </div>
</section>

<!-- Include Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Fetch demographic data from PHP (make sure this data is available)
  const demographicData = {
      maleCount: {{ $maleCount }},
      femaleCount: {{ $femaleCount }},
      totalPopulation: {{ $totalPopulation }},
      ageGroups: @json($ageGroups)  // Assuming $ageGroups is an associative array from PHP
  };

  // Gender Distribution Pie Chart Initialization
  const genderCtx = document.getElementById('genderChart').getContext('2d');
  const genderChart = new Chart(genderCtx, {
      type: 'pie',
      data: {
          labels: ['Male', 'Female'],
          datasets: [{
              data: [demographicData.maleCount, demographicData.femaleCount],
              backgroundColor: ['#36A2EB', '#FF6384'],
              borderColor: '#ffffff',
              borderWidth: 2
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'bottom',
                  labels: {
                      font: {
                          size: 16 // Increased legend font size
                      },
                      color: '#4A5568'
                  }
              },
              tooltip: {
                  enabled: true,
                  callbacks: {
                      label: function(context) {
                          let label = context.label || '';
                          let value = context.raw || 0;
                          let percentage = ((value / demographicData.totalPopulation) * 100).toFixed(2) + '%';
                          return `${label}: ${value} (${percentage})`;
                      }
                  }
              }
          }
      }
  });

  // Age Groups Pie Chart Initialization
  const ageCtx = document.getElementById('ageGroupChart').getContext('2d');
  const ageGroupsData = demographicData.ageGroups;
  const ageLabels = Object.keys(ageGroupsData);
  const ageValues = Object.values(ageGroupsData);
  const ageColors = ageLabels.map(() => '#' + Math.floor(Math.random() * 16777215).toString(16));

  const ageGroupChart = new Chart(ageCtx, {
      type: 'pie',
      data: {
          labels: ageLabels,
          datasets: [{
              data: ageValues,
              backgroundColor: ageColors,
              borderColor: '#ffffff',
              borderWidth: 2
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'bottom',
                  labels: {
                      font: {
                          size: 16 // Increased legend font size
                      },
                      color: '#4A5568'
                  }
              },
              tooltip: {
                  enabled: true,
                  callbacks: {
                      label: function(context) {
                          let label = context.label || '';
                          let value = context.raw || 0;
                          let percentage = ((value / demographicData.totalPopulation) * 100).toFixed(2) + '%';
                          return `${label}: ${value} (${percentage})`;
                      }
                  }
              }
          }
      }
  });
</script>



    <!-- Barangay Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Barangay Services</h2>
    <p>Providing essential services to the community for a better and safer environment</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
        <div class="service-item d-flex">
          <div class="flex-shrink-0 icon"><i class="bi bi-briefcase"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Community Clean-up</a></h4>
            <p class="description">Engaging in community-wide initiatives to maintain a clean and healthy environment for all residents.</p>
          </div>
        </div>
      </div>
      <!-- End Service Item -->

      <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
        <div class="service-item d-flex">
          <div class="flex-shrink-0 icon"><i class="bi bi-card-checklist"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Health and Wellness Programs</a></h4>
            <p class="description">Programs designed to enhance the health and well-being of the community through regular health checks and wellness activities.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
        <div class="service-item d-flex">
          <div class="flex-shrink-0 icon"><i class="bi bi-bar-chart"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Security and Safety Patrols</a></h4>
            <p class="description">Ensuring the safety of residents through regular patrols and community-based security measures.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
        <div class="service-item d-flex">
          <div class="flex-shrink-0 icon"><i class="bi bi-binoculars"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Educational Workshops</a></h4>
            <p class="description">Workshops designed to educate residents on various aspects such as legal rights, financial literacy, and emergency preparedness.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="500">
        <div class="service-item d-flex">
          <div class="flex-shrink-0 icon"><i class="bi bi-brightness-high"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Disaster Preparedness Training</a></h4>
            <p class="description">Providing training to residents on how to prepare for natural disasters and other emergencies to ensure community resilience.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
        <div class="service-item d-flex">
          <div class="flex-shrink-0 icon"><i class="bi bi-calendar4-week"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Other Services</a></h4>
            <p class="description">A range of other community services aimed at improving the quality of life for barangay residents.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>

</section><!-- /Barangay Services Section -->


<!-- Features Section -->
<section id="features" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>Announcement</h2>
      <p>Discover the latest announcements and features in our community.</p>
  </div><!-- End Section Title -->

  <div class="container">
      @foreach($announcements as $index => $announcement)
          <div class="row gy-4 align-items-center features-item">
              <!-- Alternate the layout for each announcement -->
              <div class="{{ $index % 2 == 0 ? 'order-2' : 'order-1' }} col-lg-5 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}" data-aos="fade-up" data-aos-delay="200">
                  <h3>{{ $announcement->name }}</h3>
                  <p>{{ $announcement->description }}</p>

              </div>

              <div class="{{ $index % 2 == 0 ? 'order-1' : 'order-2' }} col-lg-7 {{ $index % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }} d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                  <div class="image-stack">
                      @if($announcement->image)
                          <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->name }}" class="stack-front img-fluid">
                      @else
                          <img src="{{ asset('template/img/default.jpg') }}" alt="Default Image" class="stack-front img-fluid">
                      @endif
                  </div>
              </div>
          </div><!-- Features Item -->
      @endforeach
  </div>

</section><!-- /Features Section -->

<!-- Job Hiring Section -->
<section id="job-opportunities" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Job Opportunities</h2>
    <p>Discover the latest job opportunities in our community.</p>
  </div><!-- End Section Title -->

  <div class="container">
    @foreach($JobHiring as $index => $job)
      <div class="row gy-5 align-items-center features-item mb-5">
        <!-- Content Block -->
        <div class="col-lg-5 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}" data-aos="fade-up" data-aos-delay="200">
          <h3>{{ $job->name }}</h3>
          <p>{{ $job->description }}</p>
        </div>

        <!-- Image Block -->
        <div class="col-lg-7 {{ $index % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }} d-flex align-items-center justify-content-center" data-aos="zoom-out" data-aos-delay="100">
          <div class="image-stack position-relative">
            @if($job->image)
              <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->name }}" class="stack-front img-fluid rounded shadow-sm">
            @else
              <img src="{{ asset('template/img/default.jpg') }}" alt="Default Image" class="stack-front img-fluid rounded shadow-sm">
            @endif
          </div>
        </div>
      </div><!-- End Features Item -->
    @endforeach
  </div>

</section><!-- End Job Hiring Section -->



<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>SK EVENTS</h2>
      <p>Discover the latest youth-led initiatives and vibrant community events with SK Events – your go-to platform for staying connected, inspired, and involved!</p>
  </div><!-- End Section Title -->

  <!-- SK Programs -->
  <div class="container">
      <div class="row gy-4"> <!-- Start a Bootstrap row for horizontal layout -->
          @foreach($skPrograms as $program)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-skprogram">
                  <a href="{{ asset('storage/' . $program->image) }}" class="glightbox">
                      <img src="{{ asset('storage/' . $program->image) }}" class="img-fluid" alt="{{ $program->name }}">
                  </a>
                  <div class="portfolio-info">
                      <h4>{{ $program->name }}</h4>
                      <p>{{ $program->description }}</p>
                      <a href="{{ asset('storage/' . $program->image) }}" title="{{ $program->name }}" data-gallery="portfolio-gallery-skprogram" class="glightbox preview-link">
                          <i class="bi bi-zoom-in"></i>
                      </a>
                  </div>
              </div>
          @endforeach
      </div> <!-- End row -->
  </div>

</section><!-- /Portfolio Section -->

<!-- Festival Section -->
<section id="features" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>BARANGAY FESTIVAL</h2>
      <p>Discover the latest festivals in our community.</p>
  </div><!-- End Section Title -->

  <div class="container">
      @foreach($brgyFestival as $index => $brgyFestival)
          <div class="row gy-4 align-items-center features-item">
              <!-- Alternate the layout for each announcement -->
              <div class="{{ $index % 2 == 0 ? 'order-2' : 'order-1' }} col-lg-5 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}" data-aos="fade-up" data-aos-delay="200">
                  <h3>{{ $brgyFestival->title }}</h3>
                  <p>{{ $brgyFestival->description }}</p>

              </div>

              <div class="{{ $index % 2 == 0 ? 'order-1' : 'order-2' }} col-lg-7 {{ $index % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }} d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                  <div class="image-stack">
                      @if($brgyFestival->image)
                          <img src="{{ asset('storage/' . $brgyFestival->image) }}" alt="{{ $brgyFestival->name }}" class="stack-front img-fluid">
                      @else
                          <img src="{{ asset('template/img/default.jpg') }}" alt="Default Image" class="stack-front img-fluid">
                      @endif
                  </div>
              </div>
          </div><!-- Features Item -->
      @endforeach
  </div>

</section><!-- /Features Section -->

<!-- Portfolio Section -->
<section id="ACTIVITIES" class="portfolio section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>BARANGAY ACTIVITIES</h2>
    <p>Stay updated and get involved with your community through Brangay Activities – your hub for local events, programs, and everything happening in our Brangay!</p>
  </div><!-- End Section Title -->

  <!-- SK Programs -->
  <div class="container">
      <div class="row gy-4"> <!-- Start a Bootstrap row for horizontal layout -->
        @foreach($brgyActivities as $brgyAct)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-skprogram">
                  <a href="{{ asset('storage/' . $brgyAct->image) }}" class="glightbox">
                      <img src="{{ asset('storage/' . $brgyAct->image) }}" class="img-fluid" alt="{{ $brgyAct->title }}">
                  </a>
                  <div class="portfolio-info">
                      <h4>{{ $brgyAct->title }}</h4>
                      <p>{{ $brgyAct->description }}</p>
                      <a href="{{ asset('storage/' . $brgyAct->image) }}" title="{{ $brgyAct->title }}" data-gallery="portfolio-gallery-skprogram" class="glightbox preview-link">
                          <i class="bi bi-zoom-in"></i>
                      </a>
                  </div>
              </div>
          @endforeach
      </div> <!-- End row -->
  </div>

</section><!-- /Portfolio Section -->

    

        {{-- <!-- Portfolio Section -->
        <section id="BRGY ACTIVITIES" class="portfolio section">
          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
              <h2>BARANGAY ACTIVITIES</h2>
   <p>Stay updated and get involved with your community through Brangay Activities – your hub for local events, programs, and everything happening in our Brangay!</p>
          </div><!-- End Section Title -->
          <!-- SK Programs -->
  @foreach($brgyActivities as $brgyAct)
  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-skprogram">
      <a href="{{ asset('storage/' . $brgyAct->image) }}" class="glightbox">
          <img src="{{ asset('storage/' . $brgyAct->image) }}" class="img-fluid" alt="{{ $brgyAct->title }}">
      </a>
      <div class="portfolio-info">
          <h4>{{ $brgyAct->title }}</h4>
          <p>{{ $brgyAct->description }}</p>
          <a href="{{ asset('storage/' . $brgyAct->image) }}" title="{{ $brgyAct->title }}" data-gallery="portfolio-gallery-skprogram" class="glightbox preview-link">
              <i class="bi bi-zoom-in"></i>
          </a>
      </div>
  </div>
  @endforeach
</div> <!-- End row -->
</div>
</section> --}}

<!-- /Portfolio Section --><!-- /bARANGAY ACTIVITIES -->
      
    <!-- Pricing Section -->
    {{-- <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="zoom-in" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Free Plan</h3>
              <div class="icon">
                <i class="bi bi-box"></i>
              </div>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item featured">
              <h3>Business Plan</h3>
              <div class="icon">
                <i class="bi bi-rocket"></i>
              </div>

              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <div class="icon">
                <i class="bi bi-send"></i>
              </div>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section --> --}}



    <section id="faq" class="faq section">
      <!-- Portfolio Section -->
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>AGKAYKAYSA PROGRAMS</h2>
          <p>Stay updated and get involved with your community through Barangay Activities – your hub for local events, programs, and everything happening in our Barangay!</p>
      </div><!-- End Section Title -->
      
      <div class="container">
          <div class="row gy-4">
              <!-- Program Section -->
              <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                  <div class="row">
                      @foreach($programs as $program)
                          <div class="col-md-6 mb-4 content px-xl-5">
                              <h3><span>{{ $program->name }}</span></h3>
                              <p>{{ $program->description }}</p>
                              <!-- Check if the program has an image -->
                              @if($program->image)
                                  <img src="{{ asset('storage/' . $program->image) }}" class="mb-3 img-fluid" alt="{{ $program->name }}">
                              @endif
                          </div>
                      @endforeach
                  </div>
              </div>
  
<!-- FAQ Section -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="faq-container">
                    <div class="faq-item faq-active">
                        <h3><span class="num">1.</span> <span>What is the Agkaykaysa Project?</span></h3>
                        <div class="faq-content">
                            <p>The Agkaykaysa Project is a flagship program of Governor Mamba that focuses on enhancing community cooperation and improving local development. It covers a wide range of initiatives aimed at uplifting the lives of residents through social, economic, and environmental programs.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
                    
                    <div class="faq-item">
                        <h3><span class="num">2.</span> <span>How does the Agkaykaysa Project benefit the community?</span></h3>
                        <div class="faq-content">
                            <p>The project promotes community-driven development, providing assistance in education, health services, infrastructure, and livelihood. It empowers local leaders and citizens to actively participate in shaping their future, ensuring sustainable growth in the province.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num">3.</span> <span>What programs are included in the Agkaykaysa Project?</span></h3>
                        <div class="faq-content">
                            <p>The project includes various programs such as health and wellness initiatives, agricultural support for farmers, youth empowerment programs, community infrastructure development, and disaster response and recovery activities.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num">4.</span> <span>How can I participate in the Agkaykaysa programs?</span></h3>
                        <div class="faq-content">
                            <p>Participation is open to all residents. You can register for specific programs through the Barangay office or sign up during local events organized under the Agkaykaysa Project. Stay updated by following the project's official channels for announcements.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num">5.</span> <span>Can I volunteer for the Agkaykaysa Project?</span></h3>
                        <div class="faq-content">
                            <p>Yes, volunteers are always welcome! The Agkaykaysa Project thrives on community involvement, and anyone interested in contributing their time and skills can register at the local Barangay office or through the project's volunteer program.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->
                </div>
            </div>
        </div>
    </div>
  </section>
  
      <!-- Testimonials Section -->
     <section id="testimonials" class="testimonials section light-background">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                  <h3>OUR AGKAYKAYSA SCHOOLARS</h3>
                  <p>What our scholars have to say</p>
              </div>

              <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                  <div class="swiper init-swiper">
                      <script type="application/json" class="swiper-config">
                      {
                          "loop": true,
                          "speed": 600,
                          "autoplay": {
                              "delay": 5000
                          },
                          "slidesPerView": "auto",
                          "pagination": {
                              "el": ".swiper-pagination",
                              "type": "bullets",
                              "clickable": true
                          }
                      }
                      </script>
                      <div class="swiper-wrapper">
                          @foreach($testimonials as $testimonial)
                          <div class="swiper-slide">
                              <div class="testimonial-item">
                                  <div class="d-flex">
                                      <img src="{{ asset('storage/' . $testimonial->image) }}" class="flex-shrink-0 testimonial-img" alt="{{ $testimonial->name }}">
                                      <div>
                                          <h3>{{ $testimonial->name }}</h3>
                                          <h4>{{ $testimonial->designation }}</h4>
                                          <div class="stars">
                                              <!-- You can add dynamic star ratings here if available -->
                                              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <p>
                                      <i class="bi bi-quote quote-icon-left"></i>
                                      <span>{{ $testimonial->description }}</span>
                                      <i class="bi bi-quote quote-icon-right"></i>
                                  </p>
                              </div>
                          </div><!-- End testimonial item -->
                          @endforeach
                      </div>
                      <div class="swiper-pagination"></div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  </section><!-- /Faq Section -->
  
     

 <!-- Recent Posts Section -->
<section id="events" class="recent-posts section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>Barangay Events</h2>
      <p>Check out our latest barangay events</p>
  </div><!-- End Section Title -->

  <div class="container">
      <div id="latest_events" class="row gy-4">
      <h3> <strong>Latest Events</strong></h3>
          @foreach($events as $event)
              <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                  <article>
                      <div class="post-img">
                          <!-- Assuming you have an 'image' column or want to display a placeholder image -->
                          {{-- <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid"> --}}
                      </div>

                      <p class="post-category">{{ $event->location }}</p>

                      <h2 class="title">
                          <a href="{{ route('event.details', $event->id) }}">{{ $event->title }}</a>
                      </h2>

                      <p>{{ $event->description }}</p>

                      <div class="d-flex align-items-center">
                          <div class="post-meta">
                              <p class="post-date">
                                  <time datetime="{{ $event->event_date }}">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</time>
                              </p>
                              <p class="post-organizer">
                                  <strong>Organizer:</strong> {{ $event->organizer }}
                              </p>
                              <p class="post-attendees">
                                  <strong>Participants/Attendees:</strong>
                                  @if($event->attendees && is_array($event->attendees) && count($event->attendees) > 0)
                                      <ul>
                                          @foreach($event->attendees as $attendee)
                                              <li>{{ $attendee }}</li>
                                          @endforeach
                                      </ul>
                                  @else
                                      <span>Expected Attendees: {{ $event->expected_attendees }}</span>
                                  @endif
                              </p>
                          </div>
                      </div>
                  </article>
              </div><!-- End post list item -->
          @endforeach
      </div><!-- End recent posts list -->
  </div>


  <div class="container">
    <div id="latest_news" class="row gy-4">
      <br>
      <h3><strong>Latest News</strong></h3></br>
        @foreach($LatestNews as $LatestNews)
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <article>
                    <div class="post-img">
                        <!-- Assuming you have an 'image' column or want to display a placeholder image -->
                        {{-- <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid"> --}}
                    </div>
                    <p class="Title">
                      <strong>Title:</strong> {{ $LatestNews->title }}
                  </p>
                  <p class="Title">
                    <strong>Description:</strong> {{ $LatestNews->description }}
                </p>
                 <p class="post-date">
                                <time datetime="{{ $LatestNews->news_date }}">{{ \Carbon\Carbon::parse($LatestNews->news_date)->format('M d, Y') }}</time>
                            </p>

                    <div class="d-flex align-items-center">
                      
                        <div class="post-meta">
                           
                            <p class="post-organizer">
                              <strong>Location:</strong> {{ $LatestNews->location }}
                          </p>
                            <p class="post-organizer">
                                <strong>Organizer:</strong> {{ $LatestNews->organizer }}
                            </p>

                            <p class="post-attendees">
                              @if($LatestNews->image)
                         <img src="{{ asset('storage/' . $LatestNews->image) }}" class="mb-3 img-fluid" alt="{{ $LatestNews->name }}">
                          @endif
                                <strong>Participants/Attendees:</strong>
                                @if($LatestNews->attendees && is_array($LatestNews->attendees) && count($LatestNews->attendees) > 0)
                                    <ul>
                                        @foreach($LatestNews->attendees as $attendee)
                                            <li>{{ $attendee }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>Expected Attendees: {{ $LatestNews->expected_attendees }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </article>
            </div><!-- End post list item -->
        @endforeach
    </div><!-- End recent posts list -->
</div>
</section><!-- /Recent Posts Section -->
  <!-- Section Title -->
  
   <!-- Team Section -->
<section id="team" class="team section light-background">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Barangay Officials</h2>
    <p>Meet the dedicated leaders serving our community with integrity and commitment.</p>
  </div>
  

  <div class="container">
      <div class="row gy-5">
          @foreach($barangayOfficials as $official)
              <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                  <div class="member-img">
                      <img src="{{ asset('storage/' . $official->image) }}" class="img-fluid" alt="{{ $official->name }}">
                      <div class="social">
                          <a href="#"><i class="bi bi-twitter"></i></a>
                          <a href="#"><i class="bi bi-facebook"></i></a>
                          <a href="#"><i class="bi bi-instagram"></i></a>
                          <a href="#"><i class="bi bi-linkedin"></i></a>
                      </div>
                  </div>
                  <div class="text-center member-info">
                      <h4>{{ $official->name }}</h4>
                      <span>{{ $official->designation }}</span>
                      <p>{{ $official->description }}</p>
                  </div>
              </div><!-- End Team Member -->
          @endforeach
      </div>
  </div>
</section>


<!-- Barangay Health Worker Section -->
<section id="bhw" class="team section light-background">
  <!-- Section Title -->
  <div class="container section-title text-center" data-aos="fade-up">
      <h2>BARANGAY HEALTH WORKER</h2>
      <p class="mb-5">Meet our dedicated team of Barangay Health Workers who are committed to serving the community.</p>
  </div>

  <!-- Barangay Health Workers Grid -->
  <div class="container">
      <div class="row gy-4">
          @foreach($barangayHealthWorker as $worker)
              <div class="col-lg-4 col-md-6 member-container" data-aos="fade-up" data-aos-delay="100">
                  <div class="member position-relative">
                      <!-- Image and Social Icons -->
                      <div class="member-img position-relative overflow-hidden">
                          <img src="{{ asset('storage/' . $worker->image) }}" class="img-fluid" alt="{{ $worker->name }}">
                          <div class="social d-flex justify-content-center align-items-center position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50">
                              <a href="#" class="mx-2 text-white"><i class="bi bi-twitter"></i></a>
                              <a href="#" class="mx-2 text-white"><i class="bi bi-facebook"></i></a>
                              <a href="#" class="mx-2 text-white"><i class="bi bi-instagram"></i></a>
                              <a href="#" class="mx-2 text-white"><i class="bi bi-linkedin"></i></a>
                          </div>
                      </div>

                      <!-- Worker Info -->
                      <div class="text-center member-info p-3">
                          <h4 class="mb-1">{{ $worker->name }}</h4>
                          <span class="text-muted d-block mb-2">{{ $worker->designation }}</span>
                      </div>
                  </div>
              </div><!-- End Barangay Health Worker Member -->
          @endforeach
      </div>
  </div>
</section>





   
<section id="citizens-charter" class="section light-background">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>CITIZENS CHARTER</h2>
            <p>Pursuant to Section 6 of R.A 9485</p>
            <h4>VISION: Centro 2: An exemplar Barangay with unified, disciplined, and God-loving constituents towards prosperity</h4>
            <h4>MISSION: To provide satisfactory services through democratic leadership that would enable the people to become politically responsible, morally upright, and economically capable</h4>
        </div>

        <div class="charter-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>BARANGAY OFFICIAL</th>
                        <th>FRONTLINE SERVICES</th>
                        <th>STEP / PROCEDURES</th>
                        <th>RESPONSIBLE PERSON</th>
                        <th>MAXIMUM RESPONSE TIME</th>
                        <th>REQUIREMENTS</th>
                        <th>AMOUNT OF FEES</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>Camilo P. Perdido<br>Punong Barangay</td>
                        <td>ISSUANCE OF CLEARANCES AND CERTIFICATE (CTC)</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Receiving/Recording of request<br>
                            3. Issuance/Approval of CTC
                        </td>
                        <td>Officer of the Day<br>Barangay Secretary<br>Barangay Treasurer</td>
                        <td>
                            5 minutes<br>
                            3 minutes<br>
                            2 minutes
                        </td>
                        <td>None</td>
                        <td>P5.00 Basic Tax plus 0.001 of his/her preceding annual income</td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td>Vicky C. Fuertes<br>Chairman - Peace & Order</td>
                        <td>ISSUANCE OF CLEARANCES AND CERTIFICATIONS</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Receiving/Recording of request<br>
                            3. Approval/Release of document
                        </td>
                        <td>Barangay Secretary<br>Barangay Treasurer</td>
                        <td>
                            5 minutes<br>
                            2 minutes<br>
                            3 minutes
                        </td>
                        <td>Barangay Clearance</td>
                        <td>P100.00 - P200.00</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td>Recto S. Obispo<br>Chairman - Facilities & Public Utilities</td>
                        <td>FILING OF SUMMONS</td>
                        <td>
                            1. Filing of Complaint Form<br>
                            2. Approval of the request<br>
                            3. Scheduling of hearings
                        </td>
                        <td>Punong Barangay</td>
                        <td>10 minutes</td>
                        <td>CTC</td>
                        <td>P100.00</td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td>Andrew L. Pagayatan<br>Chairman - Public Works & Highways</td>
                        <td>ISSUANCE OF PERMIT</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Receiving/Recording of request<br>
                            3. Processing of requested permit<br>
                            4. Paying of fees<br>
                            5. Approving/Issuing of requested document
                        </td>
                        <td>Barangay Secretary<br>Barangay Treasurer</td>
                        <td>
                            3 minutes<br>
                            2 minutes<br>
                            10 minutes<br>
                            3 minutes<br>
                            2 minutes
                        </td>
                        <td>Barangay Clearance</td>
                        <td>P200.00</td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                        <td>Alfonso S. Grande Jr.<br>Chairman - Peace & Order and Public Safety</td>
                        <td>HEALTH SERVICES</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Evaluation of request<br>
                            3. Check-up (if medical attention required)
                        </td>
                        <td>Barangay Health Workers</td>
                        <td>5 minutes</td>
                        <td>CTC</td>
                        <td>FREE</td>
                    </tr>
                    <!-- Add more rows as necessary -->
                </tbody>
            </table>
            <p>Note: Each frontline service shall be given two (2) days processing time extension.</p>
        </div>
    </div>
</section>


 <!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact Us</h2>
    <p>For inquiries, suggestions, and feedback, feel free to get in touch with us.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-item" data-aos="fade" data-aos-delay="200">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Barangay Centro 2 Office</p>
                <p>Centro 2, Sanchez Mira, Cagayan</p>
                <p>Philippines</p>
              </div>
            </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+63 917 123 4567</p>
              <p>+63 922 654 7890</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>barangaycentro2@example.com</p>
              <p>contact@barangaycentro2.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-clock"></i>
              <h3>Open Hours</h3>
              <p>Monday - Friday</p>
              <p>8:00AM - 5:00PM</p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

      <div class="col-lg-6">
        <form id="contactForm" action="get" class="php-email-form" onsubmit="sendMail(); return false;" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" id="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="col-md-6">
              <input type="email" id="email" class="form-control" placeholder="Your Email" required>
            </div>

            <div class="col-12">
              <input type="text" id="subject" class="form-control" placeholder="Subject" required>
            </div>

            <div class="col-12">
              <textarea id="message" class="form-control" rows="6" placeholder="Message" required></textarea>
            </div>

            <div class="text-center col-12">
              <!-- Remove error-related elements to avoid unnecessary error messages -->
              <div class="loading" style="display: none;">Loading</div>
              <div class="error-message" style="display: none;"></div>
              <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Barangay Centro 2</span>
          </a>
          <p>Welcome to Barangay Centro 2! Our mission is to provide excellent services to our residents, ensuring the well-being and progress of our community. We strive for innovation and inclusivity in every aspect of our work.</p>
          <div class="mt-4 social-links d-flex">
            <a href="https://twitter.com/BarangayCentro2"><i class="bi bi-twitter"></i></a>
            <a href="https://facebook.com/BarangayCentro2"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com/BarangayCentro2"><i class="bi bi-instagram"></i></a>
            <a href="https://linkedin.com/company/BarangayCentro2"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
  
        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
  
        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Community Programs</a></li>
            <li><a href="#">Health Services</a></li>
            <li><a href="#">Education & Training</a></li>
            <li><a href="#">Events & Recreation</a></li>
            <li><a href="#">Public Safety</a></li>
          </ul>
        </div>
  
        <div class="text-center col-lg-3 col-md-12 footer-contact text-md-start">
          <h4>Contact Us</h4>
          <p>Barangay Centro 2 Office</p>
          <p>Centro 2, Sanchez Mira, Cagayan</p>
          <p>Philippines</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+63 917 123 4567</span></p>
          <p><strong>Email:</strong> <span>barangaycentro2@example.com</span></p>
        </div>
  
      </div>
    </div>
  
    <div class="container mt-4 text-center copyright">
      <p>© <span>Copyright 2024 All Rights Reserved | Barangay Centro 2</span></p>
      <div class="credits">
        Designed by <a href="https://facebook.com/BarangayCentro2">Barangay Centro</a>
      </div>
    </div>
  
  </footer>
  

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('template/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('template/js/main.js') }}"></script>
<!-- Smooth Scroll JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const links = document.querySelectorAll('a[href^="#"]');

      links.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();

          const targetId = this.getAttribute('href').substring(1);
          const targetElement = document.getElementById(targetId);

          if (targetElement) {
            targetElement.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }
        });
      });
    });

  </script>
  <script>
       document.addEventListener('DOMContentLoaded', function () {
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
});
  </script>
  <script>
    function sendMail() {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;

      // Construct the mailto link
      const mailtoLink = `mailto:example@example.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\n${message}`)}`;

      // Use window.location to trigger the mailto link
      window.location.href = mailtoLink;

      // Optionally, display a confirmation message
      document.querySelector('.sent-message').style.display = 'block';
    }
  </script>
</script>
</body>

</html>
