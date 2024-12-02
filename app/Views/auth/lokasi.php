<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi SDN Wadas 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: #0056b3;
        }
        
        .navbar-brand, .nav-link {
            color: white !important;
        }

        .map-container {
            max-width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            transition: transform 0.3s ease;
            border: 8px solid #0056b3; /* Bingkai luar */
            background-color: white;
        }

        .map-container:hover {
            transform: scale(1.05); /* Efek zoom saat hover */
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 30px;
        }

        .footer {
            background-color: #0056b3;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="section-title">
    <i class="fas fa-map-marker-alt"></i> Lokasi SD Negeri Wadas 1
</div>

        <!-- Map Container with border -->
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15850.828690222974!2d107.279076!3d-6.3276925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d832f279e81%3A0x7a63866d46fe0dc8!2sSDN%20Wadas%20I!5e0!3m2!1sid!2sid!4v1605537920456" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
