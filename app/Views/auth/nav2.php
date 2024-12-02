<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - Fakultas Keguruan & Ilmu Pendidikan</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
            margin-top: -50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Overlay efek gradient */
        .header-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* efek gelap */
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)); /* Gradient untuk menambahkan efek */
        }
        /* Teks overlay */
        .header-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            padding: 0 20px;
        }
        .dropdown-menu {
            background-color: #f8f9fa;
        }
        .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#sejarah">Sejarah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/visi-misi">visi & misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lokasi">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
