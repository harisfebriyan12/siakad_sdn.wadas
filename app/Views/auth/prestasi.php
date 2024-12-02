<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Prestasi Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }

        .containere {
            display: flex;
            flex-wrap: wrap; /* Mengizinkan flex-item untuk membungkus */
            gap: 30px;
            width: 100%;
            max-width: 1200px;
            padding: 30px;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
        }

        .list {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%; /* Memastikan elemen list melebar di layar kecil */
        }

        .list-item {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            padding: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .list-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .list-item-number {
            font-size: 1.6em;
            font-weight: bold;
            margin-right: 20px;
            color: #333;
        }

        .list-item-date {
            font-size: 1.1em;
            color: #777;
        }

        .list-item-description {
            font-size: 1em;
            color: #555;
            margin-left: 10px;
        }

        .trophy {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
            width: 100%; /* Memastikan elemen trofi melebar di layar kecil */
        }

        .trophy:hover {
            transform: translateY(-10px);
        }

        .trophy img {
            max-width: 85%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .trophy-description h5 {
            margin-top: 20px;
            font-size: 1.4em;
            color: #333;
            font-weight: bold;
        }

        .trophy-description p {
            font-size: 1.1em;
            color: #666;
            margin-top: 8px;
            text-align: center;
        }

        .list-item-number, .trophy-description {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Media Query untuk layar kecil */
        @media (max-width: 768px) {
            .containere {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .list, .trophy {
                width: 100%;
            }

            .list-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="containere">
        <!-- Daftar Prestasi -->
        <div class="list">
            <div class="list-item">
                <div class="list-item-number">1</div>
                <div>
                    <div class="list-item-date">November 18, 2024</div>
                    <div class="list-item-description">Event description for November 18, 2024.</div>
                </div>
            </div>
            <div class="list-item">
                <div class="list-item-number">2</div>
                <div>
                    <div class="list-item-date">November 15, 2024</div>
                    <div class="list-item-description">Event description for November 15, 2024.</div>
                </div>
            </div>
            <div class="list-item">
                <div class="list-item-number">3</div>
                <div>
                    <div class="list-item-date">September 23, 2024</div>
                    <div class="list-item-description">Event description for September 23, 2024.</div>
                </div>
            </div>
            <div class="list-item">
                <div class="list-item-number">4</div>
                <div>
                    <div class="list-item-date">September 15, 2024</div>
                    <div class="list-item-description">Event description for September 15, 2024.</div>
                </div>
            </div>
            <div class="list-item">
                <div class="list-item-number">5</div>
                <div>
                    <div class="list-item-date">August 07, 2024</div>
                    <div class="list-item-description">Event description for August 07, 2024.</div>
                </div>
            </div>
        </div>

        <!-- Piala -->
        <div class="trophy">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMthf7AWOtlWEMPl-eMYmTrRTjaBOFTuDQpqV71BEu-m6kDy-Px3YR7zIM_Aa5omPqcqM&usqp=CAU" alt="Trophy Image"/>
            <div class="trophy-description">
                <h5>Prestasi Terbaik Tahun 2024</h5>
                <p>Penghargaan ini diberikan kepada individu atau tim yang telah menunjukkan pencapaian luar biasa di bidang mereka selama tahun ini. Selamat!</p>
            </div>
        </div>
    </div>
</body>
</html>
