<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website SDN Negeri Wadas</title>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      transition: background-color 0.3s ease, color 0.3s ease;
      padding-top: 70px;
    }

    body.dark-mode {
      background-color: #121212;
      color: white;
    }

    /* Navbar styling */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
      transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    /* Mode terang (Light Mode) */
    body:not(.dark-mode) .navbar {
      background: linear-gradient(to right, #FF7E5F, #FEB47B); /* Gradient orange to yellow */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Mode gelap (Dark Mode) */
    body.dark-mode .navbar {
      background: linear-gradient(to right, #1F3C72, #2C5364); /* Gradient blue to black */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    /* Logo dan Teks Sekolah */
    .school-info {
      display: flex;
      align-items: center;
    }

    .school-info img {
      height: 50px;
      margin-right: 15px;
    }

    .school-info h1 {
      font-size: 1.2rem;
      color: white;
      margin: 0;
    }

    .school-info p {
      font-size: 0.9rem;
      color: white;
      margin: 0;
    }

    .theme-toggle {
      border: none;
      background-color: #3097af;
      color: white;
      font-size: 18px;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    body.dark-mode .theme-toggle {
      background-color: #555;
    }

    .toggle-sidebar {
      border: none;
      background-color: #3097af;
      color: white;
      font-size: 24px;
      font-weight: bold;
      padding: 10px;
      cursor: pointer;
      margin-left: 10px;
      border-radius: 5px;
    }

    body.dark-mode .toggle-sidebar {
      background-color: #555;
    }

    .sidebar {
      height: 100vh;
      width: 0;
      list-style: none;
      position: fixed;
      top: 0;
      left: 0;
      overflow-x: hidden;
      transition: width 0.5s, background 0.3s ease;
      padding-top: 70px;
      background: linear-gradient(to right, #FF7E5F, #FEB47B); /* Default gradient */
    }

    body.dark-mode .sidebar {
      background: linear-gradient(to right, #1F3C72, #2C5364);
    }

    .sidebar-open {
      width: 250px;
    }

    .sidebar li a {
      display: block;
      padding: 25px;
      text-decoration: none;
      color: white;
      font-weight: bold;
      text-transform: capitalize;
      border-bottom: 1px solid silver;
      transition: background-color 0.5s, padding-left 0.3s;
    }

    body.dark-mode .sidebar li a {
      color: #ddd;
    }

    .sidebar li a:hover {
      background-color: rgba(255, 255, 255, 0.3);
      padding-left: 30px;
    }

    .main-content {
      margin-left: 0;
      padding: 20px;
      transition: margin-left 0.5s ease;
    }

    /* Footer styling */
    .footer {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      background-color: #3097af;
      color: white;
      padding: 20px;
      margin-top: 50px;
    }

    body.dark-mode .footer {
      background-color: #1a1a1a;
    }

    .footer div {
      width: 45%;
    }

    .footer h3 {
      margin-bottom: 10px;
      font-size: 1.2rem;
    }

    .footer p, .footer a {
      color: white;
      text-decoration: none;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }

      .sidebar {
        width: 0;
        position: fixed;
        top: 0;
        left: 0;
        transition: width 0.5s ease-in-out;
      }

      .sidebar-open {
        width: 80%;
      }

      .footer {
        flex-direction: column;
        text-align: center;
      }

      .footer div {
        width: 100%;
        margin-bottom: 15px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="school-info">
      <img src=""> <!-- Tambahkan logo sekolah di sini -->
      <div>
        <h1>SDN NEGERI WADAS</h1>
        <p>KARAWANG, JAWA BARAT</p>
      </div>
    </div>
    <button class="theme-toggle" id="theme-toggle">🌙</button>
    <button class="toggle-sidebar" id="toggle-sidebar">☰</button>
  </nav>

  <div class="sidebar" id="sidebar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Sejarah</a></li>
      <li><a href="#">Visi, Misi dan Tujuan</a></li>
      <li><a href="#">Struktur Organisasi</a></li>
      <li><a href="#">Fasilitas</a></li>
      <li><a href="#">Ekstrakurikuler</a></li>
      <li><a href="#">Daya Tampung</a></li>
      <li><a href="#">Lokasi</a></li>
      <li><a href="#">Berita</a></li>
    </ul>
  </div>

  <div class="content">
  <h2>Berita terbaru</h2>
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://storage.googleapis.com/a1aa/image/JSuSkzVbj7KaHdQVO5rDD5ffgV0ontstBy2GQWu9EqcOEjuTA.jpg" class="d-block w-100" alt="Event 1">
        <div class="carousel-caption d-none d-md-block">
          <h5>Event 1: 13-15 Oktober 2023</h5>
          <p>Kegiatan yang melibatkan seluruh elemen fakultas dalam acara tahunan.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://cdn.prod.website-files.com/6376d3c5ef4d1e4a31b6c90e/6532ec0e6331ddb7c9b0812a_sc_blog_60_c-event-stats_1a.jpg" class="d-block w-100" alt="Event 2">
        <div class="carousel-caption d-none d-md-block">
          <h5>Event 2: Seminar Nasional</h5>
          <p>Seminar dengan tema inovasi pendidikan yang dihadiri para pakar.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://storage.googleapis.com/a1aa/image/JSuSkzVbj7KaHdQVO5rDD5ffgV0ontstBy2GQWu9EqcOEjuTA.jpg" class="d-block w-100" alt="Event 3">
        <div class="carousel-caption d-none d-md-block">
          <h5>Event 3: Workshop Digital</h5>
          <p>Workshop tentang pemanfaatan teknologi dalam pembelajaran.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  
  <script>
    const themeToggleButton = document.getElementById("theme-toggle");
    const sidebarToggleButton = document.getElementById("toggle-sidebar");
    const body = document.body;
    const sidebar = document.getElementById("sidebar");

    themeToggleButton.addEventListener("click", () => {
      body.classList.toggle("dark-mode");
    });

    sidebarToggleButton.addEventListener("click", () => {
      sidebar.classList.toggle("sidebar-open");
    });
  </script>
</body>
</html>