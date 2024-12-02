<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Data Kegiatan - SDN 01 Wadas</title>
    <style>
        /* Reset CSS dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            color: #000;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #fff;
        }

        /* Container utama */
        .container {
            max-width: 700px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
        }

        /* Kop Surat */
        .kop-surat {
            text-align: center;
            margin-bottom: 30px;
        }

        .kop-surat img {
            width: 80px;
            margin-bottom: 10px;
        }

        .kop-surat h1 {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-surat p {
            font-size: 14px;
            margin: 3px 0;
        }

        .line {
            width: 100%;
            height: 2px;
            background-color: #000;
            margin: 15px 0;
        }

        /* Isi Surat */
        .isi-surat {
            font-size: 16px;
            line-height: 1.8;
        }

        .isi-surat p {
            margin: 12px 0;
            text-indent: 40px;
        }

        /* Tabel Data Kegiatan */
        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            font-weight: bold;
            background-color: #f4f4f4;
        }

        /* Footer / Tanda Tangan */
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 16px;
        }

        .signature {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Kop Surat -->
        <div class="kop-surat">          <h1>SDN 01 Wadas</h1>
            <p>Jl. Raya Wadas No. 123, Kec. Wadas, Kab. Karawang</p>
            <p>Telp: (0267) 1234567</p>
        </div>
        <div class="line"></div>

        <!-- Isi Surat -->
        <div class="isi-surat">
            <p>Nomor: 001/Kegiatan/SDN01WADAS/2024</p>
            <p>Lampiran: 1 Lembar</p>
            <p>Perihal: Laporan Data Kegiatan</p>

            <p>Kepada Yth.</p>
            <p>Bapak/Ibu Wali Murid SDN 01 Wadas</p>
            <p>Di Tempat</p>

            <p>Dengan hormat,</p>
            <p>Bersama surat ini, kami sampaikan data kegiatan terbaru yang akan dilaksanakan di SDN 01 Wadas sebagai berikut:</p>

            <!-- Tabel Data Kegiatan -->
            <div class="table-container">
                <table>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td><?= $kegiatan['nama_kegiatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td><?= $kegiatan['deskripsi'] ?: 'Tidak ada informasi' ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Kegiatan</th>
                        <td><?= $kegiatan['tanggal'] ?: 'Tidak ada informasi' ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $kegiatan['status'] ?: 'Tidak ada informasi' ?></td>
                    </tr>
                </table>
            </div>

            <p>Demikian surat ini kami buat sebagai informasi kepada Bapak/Ibu. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
        </div>

        <!-- Footer / Tanda Tangan -->
        <div class="footer">
            <p>Karawang, <?= date('d F Y') ?></p>
            <p>Hormat kami,</p>
            <div class="signature">
                <p>Ust. Ahmad Zaki, Lc.</p>
                <p>Kepala Sekolah SDN 01 Wadas</p>
            </div>
        </div>
    </div>
</body>
</html>
