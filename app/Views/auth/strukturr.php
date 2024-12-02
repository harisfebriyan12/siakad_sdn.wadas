<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .org-chart {
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .org-chart .level {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            position: relative;
        }

        .org-chart .box {
            background: #ffffff;
            border: 2px solid #007BFF;
            padding: 15px;
            text-align: center;
            width: 200px;
            margin: 0 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .org-chart .box .name {
            font-weight: bold;
            font-size: 1.2em;
            color: #007BFF;
        }

        .org-chart .box .title {
            font-size: 0.9em;
            color: #666;
        }

        .org-chart .box img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .org-chart .line {
            position: relative;
        }

        .org-chart .line::before,
        .org-chart .line::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 20px;
            background-color: #007BFF;
        }

        .org-chart .line::before {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .org-chart .line::after {
            top: 20px;
            width: 100%;
            height: 2px;
            left: 0;
        }

        .org-chart .line-short::after {
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Struktur Organisasi Sekolah</h2>
        <div class="org-chart">
            <!-- Kepala Sekolah -->
            <div class="level">
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Kepala Sekolah">
                    <div class="name">Drs. Hadi Sutrisno</div>
                    <div class="title">Kepala Sekolah</div>
                </div>
            </div>

            <!-- Wakil Kepala Sekolah -->
            <div class="level">
                <div class="line"></div>
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Wakil Kepala Kurikulum">
                    <div class="name">M. Setiawan, S.Pd</div>
                    <div class="title">Wakil Kepala Kurikulum</div>
                </div>
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Wakil Kepala Kesiswaan">
                    <div class="name">Siti Maesaroh, M.Pd</div>
                    <div class="title">Wakil Kepala Kesiswaan</div>
                </div>
            </div>

            <!-- Kepala Departemen -->
            <div class="level">
                <div class="line"></div>
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Kepala Dep. Matematika">
                    <div class="name">Irwan Pratama, S.Pd</div>
                    <div class="title">Kepala Dep. Matematika</div>
                </div>
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Kepala Dep. IPA">
                    <div class="name">Rina Kartika, M.Pd</div>
                    <div class="title">Kepala Dep. IPA</div>
                </div>
            </div>

            <!-- Guru -->
            <div class="level">
                <div class="line"></div>
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Guru Bahasa Indonesia">
                    <div class="name">Guru 1</div>
                    <div class="title">Guru Bahasa Indonesia</div>
                </div>
                <div class="box">
                    <img src="https://via.placeholder.com/180" alt="Guru Bahasa Inggris">
                    <div class="name">Guru 2</div>
                    <div class="title">Guru Bahasa Inggris</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
