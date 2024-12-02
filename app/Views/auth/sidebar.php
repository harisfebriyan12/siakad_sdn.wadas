<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SD Negeri 1 Wadas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f3f5;
      margin: 0;
    }

    /* Navbar Styling */
    .navbar {
      background: linear-gradient(to right, #ff7e5f, #feb47b);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 1051; /* Ensuring navbar stays on top */
    }
    .navbar .nav-link {
      color: white !important;
      font-weight: bold;
    }
    .navbar-toggler {
      border-color: white;
    }

    /* Sidebar Styling */
    .sidebar {
      position: fixed;
      top: 80px; /* Positioned below the navbar */
      left: -250px;
      width: 250px;
      height: 100%;
      background: linear-gradient(to right, #ff7e5f, #feb47b);
      color: white;
      transition: left 0.3s;
      z-index: 1040; /* Sidebar beneath navbar */
    }
    .sidebar.show {
      left: 0;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 20px;
      font-size: 18px;
      font-weight: bold;
      display: block;
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    /* Content Styling */
    .content {
      margin-left: 0;
      transition: margin-left 0.3s;
      padding-top: 50px; /* Adding space to prevent overlap with navbar */
    }
    .content.shift {
      margin-left: 250px;
    }

    /* Button for toggling Sidebar */
    .toggle-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 1100;
    }

    /* Carousel Styling */
    .carousel-inner img {
      height: 500px;
      object-fit: cover;
    }

    /* Footer Styling */
    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 20px 0;
    }

    /* Section Styling with Backgrounds */
    .section {
      padding: 50px 0;
      margin-bottom: 30px;
      border-radius: 8px;
    }

    .section-sejarah {
      background: #f7f8fa;
    }

    .section-visi {
      background: #e3f2fd;
    }

    .section-fasilitas {
      background: #dcedc8;
    }

    .section-kontak {
      background: #fff3e0;
    }

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a href="#sejarah"><i class="fas fa-history"></i> Sejarah</a>
    <a href="#visi-misi"><i class="fas fa-bullseye"></i> Visi & Misi</a>
    <a href="#fasilitas"><i class="fas fa-school"></i> Fasilitas</a>
    <a href="#kontak"><i class="fas fa-envelope"></i> Kontak</a>
  </div>

  <!-- Content Area -->
  <div class="content" id="content">
    <!-- Button to Toggle Sidebar -->
    <button class="toggle-btn btn btn-light" id="toggleSidebar"><i class="fas fa-bars"></i></button>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://via.placeholder.com/800x500.png?text=Slide+1" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
          <img src="https://via.placeholder.com/800x500.png?text=Slide+2" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
          <img src="https://via.placeholder.com/800x500.png?text=Slide+3" class="d-block w-100" alt="Slide 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <!-- Sejarah Section -->
    <div class="container mt-5 section section-sejarah" id="sejarah">
      <!-- Content for Sejarah will be included here -->
      <?= $this->include('auth/sejarah'); ?><br><br>
    </div>

    <!-- Visi & Misi Section -->
    <div class="container mt-5 section section-visi" id="visi-misi">
      <!-- Content for Visi & Misi will be included here -->
      <?= $this->include('auth/visi'); ?><br><br>
    </div>

    <!-- Fasilitas Section -->
    <div class="container mt-5 section section-fasilitas" id="fasilitas">
      <!-- Content for Fasilitas will be included here -->
      <?= $this->include('auth/fasilitas'); ?><br><br>
    </div>

    <!-- Kontak Section -->
    <div class="container mt-5 section section-kontak" id="kontak">
      <!-- Content for Kontak will be included here -->
      <?= $this->include('auth/lokasi'); ?><br><br>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    AOS.init();

    // Toggle sidebar visibility
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    toggleButton.addEventListener('click', () => {
      sidebar.classList.toggle('show');
      content.classList.toggle('shift');
    });
  </script>
</body>
</html>
