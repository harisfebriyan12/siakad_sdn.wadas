<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .content h2 {
            color: #003366;
            font-size: 28px;
            font-weight: bold;
        }
        .contexx-line{
        width: 150px;
        height: 4px;
        background-color: #e91e63;
        margin: -30px auto 15px auto; /* Jarak untuk garis */
    }
        .content-container {
            padding: 40px 0;
        }
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            transition: transform 0.3s;
            margin: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        .section-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #3b5998;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px; /* Kurangi jarak di bawah judul */
        }
        .section-title i {
            color: #e91e63;
            margin-right: 10px;
            font-size: 2rem; /* Bigger Icon Size */
        }
        .sejarah-text {
            font-size: 1.125rem;
            color: #555;
            line-height: 1.6;
            text-align: justify; /* Rata kiri kanan untuk teks */
        }
        /* Responsive for wider layouts */
        @media (max-width: 768px) {
            .card {
                padding: 20px;
            }
            .section-title {
                font-size: 1.5rem;
            }
        }

        /* New style for making the history section wider and horizontal */
        .row.history-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .card-container {
            flex: 1;
            padding: 0 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div class="container content-container">
    <!-- Main Heading -->
    <div class="container content">
        <div class="row history-section">
        
        <!-- Sejarah Section -->
        <div class="card-container" data-aos="fade-left" data-aos-duration="1200">
            <div class="section-title">
                    <i class="fas fa-history"></i> Sejarah
                </div>
                       <div class="contexx-line"></div>
            <div class="card">
                <p class="sejarah-text">
                   SDN Wadas I adalah sekolah dasar negeri yang berada di Dusun Wadas, RT 03 RW 02, Desa/Kelurahan Wadas, Kecamatan Teluk Jambe Timur, Kabupaten Karawang, Jawa Barat. Sekolah ini memiliki NPSN 20237030 dan sampai saat ini masih beroperasi, kegiatan belajar dan mengajar dilaksanakan pada pagi hari selama 6 hari yaitu mulai dari Senin hingga Sabtu.

SDN Wadas I berdiri sejak tahun 1918 berdasarkan Surat Keputusan Nomor 1918 yang dikeluarkan pada tanggal 1 Juli 1918. Sekolah ini memiliki akreditasi A yang dibuktikan dengan Surat Keputusan Nomor 02.00/110/BAP-SM/SK/X/2015 yang dikeluarkan pada tanggal 13 Oktober 2015. 

Sebagai sekolah negeri di bawah naungan Kementerian Pendidikan dan Kebudayaan, SDN Wadas I berkomitmen untuk memberikan pendidikan berkualitas bagi anak-anak di wilayah Wadas dan sekitarnya
                </p>
            </div>
        </div>

    </div>
</div>

<!-- AOS Animation Library -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init(); // Initialize AOS animations
</script>
</body>
</html>