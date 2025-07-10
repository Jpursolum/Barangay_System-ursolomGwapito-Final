@php
    // Fetch the first site setting
    $siteSetting = \App\Models\SiteSetting::first();
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home - Barangay Centro 1</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('design/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('design/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('design/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('design/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('design/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('design/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('design/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('design/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
        @if ($siteSetting && $siteSetting->logo)
        <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Barangay Logo" style="max-height: 50px;">
      @else
        <img src="https://via.placeholder.com/50x50.png?text=Logo" alt="Barangay Logo"> <!-- Fallback logo -->
      @endif
        <h1 class="sitename">Barangay Centro 01</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Barangay Officials</a></li>
          <li><a href="#bhw">Barangay Officials</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}">
        {{ auth()->check() ? 'Dashboard' : 'Login' }}</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="order-2 col-lg-5 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Welcome To our Healthy<br>Barangay Centro01</h1>
            <p data-aos="fade-up" data-aos-delay="100">We are team of talented Brgy. Officials</p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="https://www.youtube.com/watch?v=rluEnEYfuJs" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="order-1 col-lg-5 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="design/img/capitan.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->


        <!-- About Section -->
        <section id="about" class="about section light-background">

          <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">
    
              <div class="col-xl-5 content">
                <h3>About Barangay</h3>
                <h2>BRIEF HISTORY OF BARANGAY CENTRO 1</h2>
                <p>Centro I is a flourishing community classified as an urban barangay. It is bounded on the north by Barangay Dammang, on the west by Barangay Centro 2, and on the south and east by Barangay Langagan. It is the hub of business and education. Several government and non-government institutions are established to cater to the needs of the town and other neighboring towns of Northwestern Cagayan and lower Apayao.</p>
                <p>The official founding of the town of Sanchez Mira in 1892 created the poblacion as the seat of the Municipal government. As Ilocano settlers came in, mostly from Paoay, Ilocos Norte, the population increased rapidly. The poblacion was headed by a "cabeza de barangay," which later on became "teniente del barrio." During the term of President Diosdado Macapagal, the barrios were changed to barangays, so the town proper was named Barangay Centro. Later on, as the population increased, the town proper was divided into Barangay Centro 1 and Barangay Centro 2.</p>
                <p>The Eastern portion of Dammang and Kanamukan, now Carrillo, were sitios of the Barangay until the creation of Barangay Dammang. The first head of the Barangay was Mr. Paterno Ramiro (1962-1971, deceased), succeeded by the following:
                  <ul>
                    <li>Mr. Segundo Monje (1971-1982, deceased)</li>
                    <li>Mr. Dadie Rasgo (1982-1989, deceased)</li>
                    <li>Mr. Avelino de Ocampo (1989-1994, deceased)</li>
                    <li>Mr. Remigio Cereñado (1994-1996, deceased)</li>
                    <li>Mr. Guillermo Ouano (1996-1997, succession)</li>
                    <li>Mr. Arnel C. Sacramed (1997-2007)</li>
                    <li>Mr. Jovitor S. Biado (2007-2013, deceased)</li>
                    <li>Dr. Melbina S. Mangosing (2013 to June 2022)</li>
                    <li>Mr. Aris Wendel R. Monje (July 2022 to present, succession)</li>
                  </ul>
                </p>
                <p>Today, Barangay Centro I has its own Barangay hall, which is the seat of local governance. The Regional Trial Court (RTC), the Registry of Deeds (ROD), the Social Security System (SSS), and the Municipal hall are also within Centro 1. The public market is at the eastern part of the Barangay. Several business establishments are situated along the national road. There are three banking institutions, five lending incorporations, one elementary school, three high schools, and five preschools. This is Barangay Centro 1, the premier Barangay of Sanchez Mira.</p>
              </div>
              
    
              <div class="col-xl-7">
                <div class="row gy-4 icon-boxes">
    
                  <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                      <i class="bi bi-buildings"></i>
                      <h3>Mission</h3>
                      <p>To provide quality services through a dynamic transparent and honest governance</p>
                    </div>
                  </div> <!-- End Icon Box -->
    
                   <!-- End Icon Box -->
    
                 <!-- End Icon Box -->
    
                  <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box">
                      <i class="bi bi-graph-up-arrow"></i>
                      <h3>Vision</h3>
                      <p>An economically stable center of business in Sanchez Mira with self-reliant, more responsible and empowered people protecting its natural resources and maintaining environment towards a more progressive society.</p>
                    </div>
                  </div> <!-- End Icon Box -->
                  
                  <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box">
                      <i class="bi bi-graph-up-arrow"></i>
                      <h3>OBJECTIVES:</h3>
                      <p>1. To provide health and social services</p>
                      <p>2. To improve services related to infrastructure, sanitation, beautification and solid waste management.</p>
                      <p>3. To provide livelihood opportunities</p>
                    </div>
                  </div> <!-- End Icon Box -->
                </div>
              </div>
    
            </div>
          </div>
    
        </section><!-- /About Section -->
      
        <section id="citizens-charter" class="section light-background">
          <div class="container" data-aos="fade-up">
              <div class="section-title">
                  <h2>CITIZENS CHARTER</h2>
                  <p>Pursuant to Section 6 of R.A 9485</p>
                  <h4>VISION:An economically stable center of business in Sanchez Mira with self-reliant, more responsible and empowered people protecting its natural resources and maintaining environment towards a more progressive society.</h4>
                  <h4>MISSION:To provide quality services through a dynamic transparent and honest governance</h4>
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

      <!-- Stats Section -->
<section id="stats" class="stats section dark-background">

  <img src="" alt="" data-aos="fade-in">

  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

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
<!-- /Stats Section -->

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
<section id="services" class="services section" style="background-color: #f9f9f9; padding: 50px 0; font-family: 'Arial', sans-serif;">
  <!-- Section Title -->
  <div class="container section-title" style="text-align: center; margin-bottom: 30px;">
    <h2 style="font-size: 2.5rem; font-weight: bold; color: #2c3e50;">Barangay Services</h2>
    <p style="font-size: 1.2rem; color: #7f8c8d;">Providing essential services to the community for a better and safer environment</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="accordion" id="servicesAccordion">
      <!-- Service Item 1 -->
      <div class="accordion-item" style="margin-bottom: 15px; border: 1px solid #dcdde1; border-radius: 5px;">
        <h2 class="accordion-header" id="headingOne" style="background-color: #ecf0f1;">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
            style="font-size: 1.2rem; color: #34495e; font-weight: bold; background-color: transparent; border: none; outline: none;">
            <i class="bi bi-briefcase me-2" style="color: #1abc9c;"></i> Community Clean-up
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#servicesAccordion">
          <div class="accordion-body" style="font-size: 1rem; color: #2c3e50; padding: 15px; background-color: #fff;">
            This service involves organizing regular community-wide clean-up drives to ensure the neighborhood stays clean and free from waste. Volunteers from the community actively participate in picking up trash, sorting recyclables, and maintaining public spaces like parks and streets. 
            <br><strong>Objective:</strong> Maintain a clean, sustainable, and healthy environment for residents.
            <br><strong>Barangay Tupad</strong>
          </div>
        </div>
      </div>

      <!-- Service Item 2 -->
      <div class="accordion-item" style="margin-bottom: 15px; border: 1px solid #dcdde1; border-radius: 5px;">
        <h2 class="accordion-header" id="headingTwo" style="background-color: #ecf0f1;">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
            style="font-size: 1.2rem; color: #34495e; font-weight: bold; background-color: transparent; border: none; outline: none;">
            <i class="bi bi-card-checklist me-2" style="color: #3498db;"></i> Health and Wellness Programs
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#servicesAccordion">
          <div class="accordion-body" style="font-size: 1rem; color: #2c3e50; padding: 15px; background-color: #fff;">
            These programs are focused on improving the overall health and well-being of the community. They include free medical check-ups, mental health support, vaccination drives, fitness programs, and health education to help residents lead healthier lives.
            <br><strong>Objective:</strong> Promote better health practices and increase awareness of disease prevention and well-being.
          </div>
        </div>
      </div>

      <!-- Service Item 3 -->
      <div class="accordion-item" style="margin-bottom: 15px; border: 1px solid #dcdde1; border-radius: 5px;">
        <h2 class="accordion-header" id="headingThree" style="background-color: #ecf0f1;">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
            style="font-size: 1.2rem; color: #34495e; font-weight: bold; background-color: transparent; border: none; outline: none;">
            <i class="bi bi-bar-chart me-2" style="color: #9b59b6;"></i> Security and Safety Patrols
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#servicesAccordion">
          <div class="accordion-body" style="font-size: 1rem; color: #2c3e50; padding: 15px; background-color: #fff;">
            This service ensures the safety and security of residents through regular patrols by barangay officers. It also includes surveillance programs, emergency response teams, and community watch initiatives to prevent crime and maintain peace.
            <br><strong>Objective:</strong> Provide a safe and secure environment for all community members.
          </div>
        </div>
      </div>

      <!-- Service Item 4 -->
      <div class="accordion-item" style="margin-bottom: 15px; border: 1px solid #dcdde1; border-radius: 5px;">
        <h2 class="accordion-header" id="headingFour" style="background-color: #ecf0f1;">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"
            style="font-size: 1.2rem; color: #34495e; font-weight: bold; background-color: transparent; border: none; outline: none;">
            <i class="bi bi-binoculars me-2" style="color: #e74c3c;"></i> Educational Workshops
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#servicesAccordion">
          <div class="accordion-body" style="font-size: 1rem; color: #2c3e50; padding: 15px; background-color: #fff;">
            These workshops aim to educate community members on various topics such as financial literacy, legal rights, first aid training, and emergency preparedness. The workshops are designed to empower residents with knowledge and skills for daily life and unexpected situations.
            <br><strong>Objective:</strong> Equip residents with essential skills for personal development and emergency situations.
          </div>
        </div>
      </div>

      <!-- Service Item 5 -->
      <div class="accordion-item" style="margin-bottom: 15px; border: 1px solid #dcdde1; border-radius: 5px;">
        <h2 class="accordion-header" id="headingFive" style="background-color: #ecf0f1;">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"
            style="font-size: 1.2rem; color: #34495e; font-weight: bold; background-color: transparent; border: none; outline: none;">
            <i class="bi bi-brightness-high me-2" style="color: #f1c40f;"></i> Disaster Preparedness Training
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#servicesAccordion">
          <div class="accordion-body" style="font-size: 1rem; color: #2c3e50; padding: 15px; background-color: #fff;">
            This training is aimed at educating residents on how to prepare for and respond to natural disasters such as earthquakes, floods, and fires. The program includes safety drills, first responder training, and emergency preparedness planning.
            <br><strong>Objective:</strong> Equip residents with the knowledge and skills to handle emergency situations.
          </div>
        </div>
      </div>

      <!-- Service Item 6 -->
      <div class="accordion-item" style="margin-bottom: 15px; border: 1px solid #dcdde1; border-radius: 5px;">
        <h2 class="accordion-header" id="headingSix" style="background-color: #ecf0f1;">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"
            style="font-size: 1.2rem; color: #34495e; font-weight: bold; background-color: transparent; border: none; outline: none;">
            <i class="bi bi-calendar4-week me-2" style="color: #2ecc71;"></i> Other Services
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#servicesAccordion">
          <div class="accordion-body" style="font-size: 1rem; color: #2c3e50; padding: 15px; background-color: #fff;">
            The barangay offers a variety of other services, including assistance for senior citizens, support for families in need, and outreach programs to help marginalized communities. These services aim to ensure that all residents have access to basic necessities and support systems.
            <br><strong>Objective:</strong> Provide a range of services to ensure the well-being and inclusion of all residents.
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Barangay Services Section -->

<!-- Menu Section -->
<section id="menu" class="menu section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Barangay Chairperson's Corner</h2>
    <p><span>Check Our</span> <span class="description-title">Barangay Captain</span></p>
  </div><!-- End Section Title -->

  <div class="container">

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <li class="nav-item">
        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-Release">
          <h4>Photo Release</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Speeches">
          <h4>Speeches</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-Achievements">
          <h4>Achievements</h4>
        </a>
      </li><!-- End tab nav item -->
    </ul><!-- End Navigation Tabs -->

    <!-- Tab Content -->
    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

      <!-- Photo Release Tab -->
      <div class="tab-pane fade" id="menu-Release">
        <div class="text-center tab-header">
          <h3>Photo Release</h3>
        </div>
        <div class="row gy-5">
          @foreach($PhotoRelease as $PhotoRelease)
          <div class="col-md-4">
            <div class="card">
              <a href="{{ asset('storage/' . $PhotoRelease->image) }}" class="glightbox">
                <img src="{{ asset('storage/' . $PhotoRelease->image) }}" class="card-img-top" alt="{{ $PhotoRelease->name }}">
              </a>
              <div class="card-body">
                <h5 class="card-title">{{ $PhotoRelease->name }}</h5>
                <p class="card-text">{{ $PhotoRelease->description }}</p>
              </div>
              <div class="portfolio-info">
                <a href="{{ asset('storage/' . $PhotoRelease->image) }}" title="{{ $PhotoRelease->name }}" data-gallery="portfolio-gallery-church" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- End Photo Release Tab -->

      <!-- Speeches Tab -->
      <div class="tab-pane fade" id="menu-Speeches">
        <div class="text-center tab-header">
          <h3>Speeches</h3>
        </div>
        <div class="row gy-5">
          @foreach($Speech as $Speech)
          <div class="col-md-4">
            <div class="card">
              <a href="{{ asset('storage/' . $Speech->image) }}" class="glightbox">
                <img src="{{ asset('storage/' . $Speech->image) }}" class="card-img-top" alt="{{ $Speech->name }}">
              </a>
              <div class="card-body">
                <h5 class="card-title">{{ $Speech->name }}</h5>
                <p class="card-text">{{ $Speech->description }}</p>
              </div>
              <div class="portfolio-info">
                <a href="{{ asset('storage/' . $Speech->image) }}" title="{{ $Speech->name }}" data-gallery="portfolio-gallery-church" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- End Speeches Tab -->

      <!-- Achievements Tab -->
      <div class="tab-pane fade" id="menu-Achievements">
        <div class="text-center tab-header">
          <h3>Achievements</h3>
        </div>
        <div class="row gy-5">
          @foreach($Achievement as $Achievement)
          <div class="col-md-4">
            <div class="card">
              <a href="{{ asset('storage/' . $Achievement->image) }}" class="glightbox">
                <img src="{{ asset('storage/' . $Achievement->image) }}" class="card-img-top" alt="{{ $Achievement->name }}">
              </a>
              <div class="card-body">
                <h5 class="card-title">{{ $Achievement->name }}</h5>
                <p class="card-text">{{ $Achievement->description }}</p>
              </div>
              <div class="portfolio-info">
                <a href="{{ asset('storage/' . $Achievement->image) }}" title="{{ $Achievement->name }}" data-gallery="portfolio-gallery-hospital" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- End Achievements Tab -->

    </div><!-- End Tab Content -->
  </div><!-- End Container -->
</section><!-- End Menu Section -->




      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p><span>Learn More</span> <span class="description-title">About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <img src="design/img/about.jpg" class="mb-4 img-fluid" alt="">
            <div class="book-a-table">
              <h3>Call Us</h3>
              <p>0912-3456-7890</p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p>

              <div class="mt-4 position-relative">
                <img src="design/img/about-2.jpg" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->


 

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Visit Us</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Corporis voluptates officia eiusmod</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Ullamco laboris ladore lore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Labore consequatur incidid dolore</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->



<!-- Menu Section -->
<section id="menu" class="menu section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Visitor's Lounge</h2>
    <p><span>Check Our</span> <span class="description-title">Lounge</span></p>
  </div><!-- End Section Title -->

  <div class="container">

    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <li class="nav-item">
        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-hotels">
          <h4>Hotels</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-churches">
          <h4>Churches</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-hospitals">
          <h4>Hospitals</h4>
        </a><!-- End tab nav item -->
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-parks">
          <h4>Parks</h4>
        </a><!-- End tab nav item -->
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-restaurants">
          <h4>Restaurants</h4>
        </a><!-- End tab nav item -->
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-schools">
          <h4>Schools</h4>
        </a><!-- End tab nav item -->
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-tourist-spots">
          <h4>Tourist Spots</h4>
        </a><!-- End tab nav item -->
      </li>

    </ul>

<!-- Tab Content -->
<div class="tab-content" data-aos="fade-up" data-aos-delay="200">

  <!-- Hotels Tab -->
  <div class="tab-pane fade active show" id="menu-hotels">
    <div class="text-center tab-header">
      <p>Hotels</p>
      <h3>Hotel</h3>
    </div>
    <div class="row gy-5">
      @foreach($Hotel as $Hotel)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $Hotel->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $Hotel->image) }}" class="card-img-top" alt="{{ $Hotel->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $Hotel->name }}</h5>
              <p class="card-text">{{ $Hotel->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $Hotel->image) }}" title="{{ $Hotel->name }}" data-gallery="portfolio-gallery-hotel" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Hotels Tab -->

  <!-- Churches Tab -->
  <div class="tab-pane fade" id="menu-churches">
    <div class="text-center tab-header">
      <p>Churches</p>
      <h3>Church</h3>
    </div>
    <div class="row gy-5">
      @foreach($Church as $Church)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $Church->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $Church->image) }}" class="card-img-top" alt="{{ $Church->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $Church->name }}</h5>
              <p class="card-text">{{ $Church->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $Church->image) }}" title="{{ $Church->name }}" data-gallery="portfolio-gallery-church" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Churches Tab -->

  <!-- Hospitals Tab -->
  <div class="tab-pane fade" id="menu-hospitals">
    <div class="text-center tab-header">
      <p>Hospitals</p>
      <h3>Hospitals</h3>
    </div>
    <div class="row gy-5">
      @foreach($hospitals as $hospital)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $hospital->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $hospital->image) }}" class="card-img-top" alt="{{ $hospital->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $hospital->name }}</h5>
              <p class="card-text">{{ $hospital->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $hospital->image) }}" title="{{ $hospital->name }}" data-gallery="portfolio-gallery-hospital" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Hospitals Tab -->

  <!-- Parks Tab -->
  <div class="tab-pane fade" id="menu-parks">
    <div class="text-center tab-header">
      <p>Parks</p>
      <h3>Parks</h3>
    </div>
    <div class="row gy-5">
      @foreach($parks as $park)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $park->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $park->image) }}" class="card-img-top" alt="{{ $park->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $park->name }}</h5>
              <p class="card-text">{{ $park->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $park->image) }}" title="{{ $park->name }}" data-gallery="portfolio-gallery-park" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Parks Tab -->

  <!-- Restaurants Tab -->
  <div class="tab-pane fade" id="menu-restaurants">
    <div class="text-center tab-header">
      <p>Restaurants</p>
      <h3>Restaurants</h3>
    </div>
    <div class="row gy-5">
      @foreach($restaurants as $restaurant)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $restaurant->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $restaurant->image) }}" class="card-img-top" alt="{{ $restaurant->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $restaurant->name }}</h5>
              <p class="card-text">{{ $restaurant->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $restaurant->image) }}" title="{{ $restaurant->name }}" data-gallery="portfolio-gallery-restaurant" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Restaurants Tab -->

  <!-- Schools Tab -->
  <div class="tab-pane fade" id="menu-schools">
    <div class="text-center tab-header">
      <p>Schools</p>
      <h3>Schools</h3>
    </div>
    <div class="row gy-5">
      @foreach($schools as $school)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $school->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $school->image) }}" class="card-img-top" alt="{{ $school->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $school->name }}</h5>
              <p class="card-text">{{ $school->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $school->image) }}" title="{{ $school->name }}" data-gallery="portfolio-gallery-school" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Schools Tab -->

  <!-- Tourist Spots Tab -->
  <div class="tab-pane fade" id="menu-tourist-spots">
    <div class="text-center tab-header">
      <p>Tourist Spots</p>
      <h3>Tourist Spots</h3>
    </div>
    <div class="row gy-5">
      @foreach($touristSpots as $spot)
        <div class="col-md-4">
          <div class="card">
            <a href="{{ asset('storage/' . $spot->image) }}" class="glightbox">
              <img src="{{ asset('storage/' . $spot->image) }}" class="card-img-top" alt="{{ $spot->name }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $spot->name }}</h5>
              <p class="card-text">{{ $spot->description }}</p>
            </div>
            <div class="portfolio-info">
              <a href="{{ asset('storage/' . $spot->image) }}" title="{{ $spot->name }}" data-gallery="portfolio-gallery-tourist-spot" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- End Tourist Spots Tab -->

</div><!-- End Tab Content -->

</div><!-- End Container -->
</section><!-- End Menu Section -->


<!-- Events Section -->
<div class="container section-title" data-aos="fade-up">
  <h2>Latest events!</h2>
  <p>Check our latest<span class="description-title"> events!</span></p>
</div><!-- End Section Title -->
<section id="events" class="events section">
    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
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
                },
                "breakpoints": {
                    "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 40
                    },
                    "1200": {
                        "slidesPerView": 3,
                        "spaceBetween": 1
                    }
                }
            }
            </script>
            <div class="swiper-wrapper">
              @foreach($events->reverse() as $event)
              <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url({{ asset('storage/' . $event->image) }})">
                  <h3>{{ $event->title }}</h3>
                  <p class="description">{{ $event->description }}</p>
                  @if($event->price)
                      <div class="price align-self-start">${{ $event->price }}</div>
                  @endif
              </div><!-- End Event Item -->
          @endforeach
          
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><!-- /Events Section -->

<!-- Events Section -->
<div class="container section-title" data-aos="fade-up">
  <h2>Check our latest news!</h2>
  <p>Check our latest news<span class="description-title">news!</span></p>
</div><!-- End Section Title -->
<section id="events" class="events section">
    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
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
                },
                "breakpoints": {
                    "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 40
                    },
                    "1200": {
                        "slidesPerView": 3,
                        "spaceBetween": 1
                    }
                }
            }
            </script>
            <div class="swiper-wrapper">
              @foreach($LatestNews->reverse() as $LatestNews)
              <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url({{ asset('storage/' . $LatestNews->image) }})">
                  <h3>{{ $LatestNews->title }}</h3>
                  <p class="description">{{ $LatestNews->description }}</p>
                  @if($LatestNews->price)
                      <div class="price align-self-start">${{ $LatestNews->price }}</div>
                  @endif
              </div><!-- End Event Item -->
          @endforeach
          
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><!-- /Events Section -->


    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONIALS</h2>
        <p>What Are They <span class="description-title">Saying About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

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

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="text-center col-lg-2">
                    <img src="design/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="text-center col-lg-2">
                    <img src="design/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="text-center col-lg-2">
                    <img src="design/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="text-center col-lg-2">
                    <img src="{{ asset('design/img/testimonials/testimonials-4.jpg') }}" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

 


<!-- Features Section -->
<section id="features" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="highlight">Announcement</h2>
    <p>
      <span>Our</span> 
      <span class="description-title">BARANGAY Announcement!</span>
    </p>
  </div><!-- End Section Title -->

  <div class="container">
      @foreach($announcements as $index => $announcement)
          <div class="row gy-4 align-items-center features-item">
              
              <!-- Content Area -->
              <div class="{{ $index % 2 == 0 ? 'order-2' : 'order-1' }} col-lg-5 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}" data-aos="fade-up" data-aos-delay="200">
                  <h3 class="announcement-title">{{ $announcement->name }}</h3>
                  <p class="announcement-description">{{ $announcement->description }}</p>
                  <a href="#" class="btn btn-get-started">Read More</a>
              </div>

              <!-- Image Area -->
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



<section id="portfolio" class="portfolio section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>SK EVENTS AND PROGRAMS</h2>
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
<!-- i FRAME-->


<!-- Barangay Officials Section -->
<section id="chefs" class="chefs section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>OFFICIALS</h2>
      <p><span>Our</span> <span class="description-title">BARANGAY OFFICIALS<br></span></p>
  </div><!-- End Section Title -->

  <div class="container">
      <div class="row gy-4">
          @foreach($barangayOfficials as $official)
              <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                  <div class="team-member">
                      <!-- Official's Image -->
                      <div class="member-img">
                          <img src="{{ asset('storage/' . $official->image) }}" class="img-fluid" alt="{{ $official->name }}">
                          <div class="social">
                              <!-- Social Links -->
                              
                              <div class="img-fluid" alt="">
                              @if($official->facebook) <a href="{{ $official->facebook }}"><i class="fab fa-facebook"></i></a> @endif
                              @if($official->twitter) <a href="{{ $official->twitter }}"><i class="fab fa-twitter"></i></a> @endif
                              @if($official->instagram) <a href="{{ $official->instagram }}"><i class="fab fa-instagram"></i></a> @endif
                              @if($official->linkedin) <a href="{{ $official->linkedin }}"><i class="fab fa-linkedin"></i></a> @endif
                            </div>
                          </div>
                      </div>
                      <!-- Official's Info -->
                      <div class="member-info">
                          <h4>{{ $official->name }}</h4>
                          <span>{{ $official->designation }}</span>
                          <p>{{ $official->description }}</p>
                      </div>
                  </div>
              </div><!-- End Team Member -->
          @endforeach
      </div>
  </div>

</section><!-- /Barangay Officials Section -->


<!-- BHW Officials Section -->
<section id="bhw" class="chefs section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>OFFICIALS</h2>
      <p><span>OUR</span> <span class="description-title">BARANGAY HEALTH WORKER<br></span></p>
  </div><!-- End Section Title -->

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

</section><!-- /BHW Officials Section -->


    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
        <p><span>Send me your concert</span> <span class="description-title">Stay With Us<br></span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 reservation-img" style="background-image: url({{ asset('design/img/reservation.jpg') }});"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
                </div>
              </div>

              <div class="mt-3 form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
              </div>

              <div class="mt-3 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your email request was sent. We will call back or send an Email to confirm your concern. Thank you!</div>
                <button type="submit">Send a Message</button>
              </div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>

    </section><!-- /Book A Table Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
        </div><!-- End Section Title -->
    
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "centeredSlides": true,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 0
                            },
                            "768": {
                                "slidesPerView": 3,
                                "spaceBetween": 20
                            },
                            "1200": {
                                "slidesPerView": 5,
                                "spaceBetween": 20
                            }
                        }
                    }
                </script>
                <div class="swiper-wrapper align-items-center">
                  @foreach($brgyFestival as $index => $brgyFestival)
                  <div class="row gy-4 align-items-center features-item">
                      <!-- Alternate the layout for each announcement -->
                      <div class="{{ $index % 2 == 0 ? 'order-2' : 'order-1' }} col-lg-5 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}" data-aos="fade-up" data-aos-delay="200">
                          <h3>{{ $brgyFestival->title }}</h3>
                          <p>{{ $brgyFestival->description }}</p>
        
                      </div>
        
                      <div class="{{ $index % 2 == 0 ? 'order-1' : '  order-2' }} col-lg-7 {{ $index % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }} d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
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
                <div class="swiper-pagination"></div>
            </div>
        </div>
    
    </section><!-- /Gallery Section -->


     <!-- About Section -->
<section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Frequently Asked Questions</h2>
    <p><span>Explore</span> <span class="description-title">Our Programs, Services, and Community Initiatives</span></p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <!-- Right Column: FAQ Section -->
      <div class="col-lg-12" data-aos="fade-up" data-aos-delay="250">
        <div class="accordion" id="faqAccordion">

          <!-- FAQ Item 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                <span class="num">1.</span> What is the vision of Barangay Centro1?
              </button>
            </h2>
            <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                The vision of Barangay Centro1 is to create a unified, disciplined, and God-loving community working together towards progress and prosperity.
              </div>
            </div>
          </div>

          <!-- FAQ Item 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                <span class="num">2.</span> What services does Barangay Centro1 offer?
              </button>
            </h2>
            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Barangay Centro1 offers various services, including health programs, educational support, livelihood initiatives, and infrastructure development to enhance community well-being.
              </div>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                <span class="num">3.</span> How can I get involved in Barangay Centro1's programs?
              </button>
            </h2>
            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Residents can participate by visiting the Barangay office, signing up during local events, or staying updated through official announcements and social media pages.
              </div>
            </div>
          </div>

          <!-- FAQ Item 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                <span class="num">4.</span> How does the Barangay Centro1 website help residents?
              </button>
            </h2>
            <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                The Barangay Centro1 website serves as an information hub where residents can access updates about programs, services, and events. It also offers online forms for requests and registration, making it easier to connect with Barangay officials.
              </div>
            </div>
          </div>

          <!-- FAQ Item 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading5">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                <span class="num">5.</span> Can residents request services online?
              </button>
            </h2>
            <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes! The Barangay Centro1 website allows residents to submit requests for services such as Barangay clearance, permits, and more through a user-friendly online platform.
              </div>
            </div>
          </div>

          <!-- FAQ Item 6 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading6">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                <span class="num">6.</span> How can I stay updated on Barangay activities?
              </button>
            </h2>
            <div id="faqCollapse6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Residents can stay informed by regularly visiting the Barangay Centro1 website, subscribing to email updates, or following the Barangay's official social media accounts.
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Right Column -->

    </div>
  </div>
</section><!-- End About Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
          <iframe style="width: 100%; height: 400px;"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.1613053753626!2d121.22107192293363!3d18.566765122607467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3388c1fcba51eeff%3A0xd1e329108ffbc16!2sCentro%201%20sanchez%20mira!5e0!3m2!1sen!2sph!4v1733021845836!5m2!1sen!2sph" frameborder="0" allowfullscreen=""></iframe>
          
       
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="flex-shrink-0 icon bi bi-geo-alt"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="flex-shrink-0 icon bi bi-telephone"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="flex-shrink-0 icon bi bi-envelope"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="flex-shrink-0 icon bi bi-clock"></i>
              <div>
                <h3>Opening Hours<br></h3>
                <p><strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="text-center col-md-12">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form><!-- End Contact Form -->

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container mt-4 text-center copyright">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('design/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('design/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('design/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('design/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('design/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('design/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('design/js/main.js') }}"></script>

</body>

</html>
