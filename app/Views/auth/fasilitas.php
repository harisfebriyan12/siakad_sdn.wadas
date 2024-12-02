<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0"/>
    <title>Fasilitas Sekolah - SDN Negeri Wadas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px;
        }
        .h3 {
            color: black;
        }
        .contepx-line {
            width: 200px;
            height: 4px;
            background-color: #e91e63;
            margin: 0px auto 15px auto;
        }
        .c-line {
            width: 100px;
            height: 4px;
            background-color: #e91e63;
            margin: 0px auto 15px auto;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .p-6 {
            padding: 24px;
        }
        .rounded-lg {
            border-radius: 8px;
        }
        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .text-center {
            text-align: center;
        }
        .py-10 {
            padding-top: 40px;
            padding-bottom: 40px;
            color: #e91e63;
        }
        .flex {
            display: flex;
        }
        .items-center {
            align-items: center;
        }
        .justify-center {
            justify-content: center;
        }
        .gap-4 {
            gap: 16px;
        }
        .mb-10 {
            margin-bottom: 40px;
        }
        .text-4xl {
            font-size: 2.25rem;
        }
        .i{
            color: pink;
        }
        .font-bold {
            font-weight: 700;
        }
        .text-black-700 {
            color: #1f2937;
        }
        .facility-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .facility-item {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 16px;
            width: 30%;
            text-align: center;
            padding: 24px;
        }
        .facility-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);
        }
        .facility-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .facility-item h3 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .facility-item p {
            color: #4b5563;
        }
        @media (max-width: 768px) {
            .facility-item {
                flex: 0 0 100%;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="text-center py-10">
                <div class="flex items-center justify-center gap-4 mb-10">
                    <i class="fas fa-school text-4xl text-pink-700"></i>
                    <h1 class="text-4xl font-bold text-black-700">Fasilitas Kami</h1>
                </div>
                <div class="facility-list">
                    <!-- Perpustakaan Section -->
                    <div class="facility-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRURxWjcU6x8wu6z69k6naIwLM03rr8X6zEDQ&s" alt="Perpustakaan">
                        <h3><i class="fas fa-book"></i> Perpustakaan</h3>
                        <div class="c-line"></div>
                        <p>Perpustakaan kami menyediakan berbagai koleksi buku untuk mendukung proses pembelajaran.</p>
                    </div>
                    <!-- Lapangan Section -->
                    <div class="facility-item">
                        <img src="/images/g.jpeg" alt="Lapangan">
                        <h3><i class="fas fa-basketball-ball"></i> Lapangan</h3>
                        <div class="c-line"></div>
                        <p>Dilengkapi dengan Ring Basket dan lapangan olahraga.</p>
                    </div>
                    <!-- Kantin Section -->
                    <div class="facility-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTyM74mslzF6YPuyMGAuEYaQnSqlhTF6KhmQ&s" alt="Kantin">
                        <h3><i class="fas fa-utensils"></i> Kantin</h3>
                        <div class="c-line"></div>
                        <p>Kantin menyediakan makanan sehat dan bergizi untuk mendukung kebutuhan energi siswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
