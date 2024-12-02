<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Guru</title>
    <style>
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .container1 {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card1 {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card1:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card1 img {
            width: 100%;
            height: 150px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            object-fit: cover;
        }

        .card1 h5 {
            margin: 10px 0 5px;
            font-size: 1rem;
            color: #333;
        }

        .card1 p {
            margin: 0 0 10px;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
 <div class="container">
    <div class="section-title">
        <i class="fas fa-user"></i> Guru Kami
    </div>
</div>
    <div class="container1" id="guruContainer"></div>


    <script>
        // Data guru
        const guruData = [
            { nama: "Ahmad s.pd", jabatan: "Guru Matematika", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKsoW0dLB4aS3OI1TxOvyvkP48UFXQJgRaTF0VJn4UBBvx6XRhBKvgCv6VIsdLAar67aU&usqp=CAU" },
            { nama: "Siti S.pd", jabatan: "Guru Bahasa Indonesia", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOlPMYa4rNlLrEgE9PZD5wFN4Ds5JyJQu_LQ&s" },
            { nama: "Budi S.pd", jabatan: "Guru Pendidikan Agama dan Budi Pekerti", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSCcitEm0tntjfoxwl6wBDv14kHHEVQrhPjEXKcfARRBOa-JAxadLbx8r1zv1kbYJgDKc&usqp=CAU" },
            { nama: "Agus S.pd", jabatan: "Guru Bahasa Sunda", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8K7Zz-5yFGWlDBAN1MXkg8WYl-U-gc1yxnaQOA9kRw7-uqMYT_WsMtegxvs-i5v_LMNM&usqp=CAU" },
            { nama: "Ani S.pd", jabatan: "Guru IPA", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBX--X7LipU_HW3ZgVOhlT4qCdMSv9_ClvpQ&" },
            { nama: "Vivi S.pd", jabatan: "Guru Ips", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx019BSFKL04ej0MN1zkfUTBgUihwQt8rGyw&s" },
            { nama: "Piah S,pd", jabatan: "Guru Bahasa Ingris", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTss1Fkkuu4HRYaPdWrX3zVQYQYh415euQlMQ&s" },
            { nama: "Tina S.pd", jabatan: "Guru Olahraga", gambar: "data:image/jpeg;base64,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" },
            { nama: "Alex S.pd", jabatan: "Guru  Ppkn", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSS-J1B3zF05tF-pS5ALenn4HXq74cj-_kI5GmvmBQERi7uN7QRKOKhT7uzVHiws86UHTk&usqp=CAU" },
            { nama: "Maya S.pd", jabatan: "Guru SeniBudaya", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSG7AlxEbwR2eEP-7-f5BmzPre00p8HtfcZfg&s" }
        ];
        // Container untuk menampilkan card guru
        const guruContainer = document.getElementById("guruContainer");

        // Render card guru
        guruData.forEach(guru => {
            const card1 = document.createElement("div");
            card1.classList.add("card1");
            card1.innerHTML = `
                <img src="${guru.gambar}" alt="${guru.nama}">
                <h5>${guru.nama}</h5>
                <p>${guru.jabatan}</p>
            `;
            guruContainer.appendChild(card1);
        });
    </script>
</body>
</html>
