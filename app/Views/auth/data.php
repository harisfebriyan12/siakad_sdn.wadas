<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDN Wadas 01</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #0056b3;
            transition: top 0.3s;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand img {
            margin-right: 10px;
        }
        .navbar-title {
            display: inline-block;
        }
        .navbar-title h5 {
            margin: 0;
            font-size: 1rem;
            color: #ffffff;
        }
        .navbar-title small {
            color: #ffffffb3;
            font-size: 0.9rem;
        }
        .content {
            background-color: white;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header-image {
            width: 100%;
            height: 400px;
            background: url('https://watermark.lovepik.com/photo/20211130/large/lovepik-hengshui-first-middle-school-teaching-building-picture_501291544.jpg') no-repeat center center;
            background-size: cover;
        }
        .section-title {
            margin-bottom: 30px;
            font-size: 2em;
            text-align: center;
            font-weight: bold;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            background-color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://i0.wp.com/sdgambiranomjogja.sch.id/wp-content/uploads/2017/06/sd-negeri-gambiranom-jogja-logo.png?fit=300%2C307&ssl=1" width="50" height="50" alt="Logo" class="d-inline-block align-top"/>
                <div class="navbar-title">
                    <h5>SDN WADAS 01</h5>
                    <small>Karawang, Jawa Barat</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#total">Total</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sejarah">Sejarah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#visi">Visi & Misi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fasilitas">Fasilitas</a></li>
                      <li class="nav-item"><a class="nav-link" href="#struktur">Struktur</a></li>
                      <li class="nav-item"><a class="nav-link" href="#ekstra">Ekstrakurikuler</a></li>
                      
                    <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Sections -->
    <section id="home">
        <?= $this->include('auth/home'); ?>
    </section>
    <section id="sejarah">
        <?= $this->include('auth/sejarah'); ?>
    </section>
    <section id="visi">
        <?= $this->include('auth/visi'); ?>
    </section>
             <section id="mis">
        <?= $this->include('auth/mis'); ?>
    </section><br><br><br><br>
    <section id="fasilitas">
        <?= $this->include('auth/fasilitas'); ?>
    </section>
        </section><br><br><br>
         <section id="tootal">
        <?= $this->include('auth/tootal'); ?>
    </section><br><br><br>
         <section id="struktur">
        <?= $this->include('auth/strukturrr'); ?>
    </section><br><br>
             <section id="ekstra">
        <?= $this->include('auth/eks'); ?>
    </section><br><br>
      </section>
        <section id="pres">
        <?= $this->include('auth/prestasi'); ?>
    </section>
            <section id="lokasi">
        <?= $this->include('auth/lokasi'); ?>
    </section><br>
    <section id="login">
        <?= $this->include('auth/login'); ?>
    </section>
        <section id="guru">
        <?= $this->include('auth/hub'); ?>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let prevScrollPos = window.pageYOffset;
        const navbar = document.querySelector('.navbar');

        window.onscroll = function () {
            const currentScrollPos = window.pageYOffset;
            if (prevScrollPos > currentScrollPos) {
                navbar.style.top = "0"; // Show navbar
            } else {
                navbar.style.top = "-70px"; // Hide navbar
            }
            prevScrollPos = currentScrollPos;
        }
    </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script>
        // Tambahkan fungsi untuk menutup menu navbar ketika menu di-click pada mode mobile
       document.querySelectorAll('.nav-link').forEach(function (link) {
        link.addEventListener('click', function () {
            let navbarCollapse = document.getElementById('navbarNav');
            if (navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
            }
        });
    });
    </script>
</body>
</html>
