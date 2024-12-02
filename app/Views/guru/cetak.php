<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Guru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px; /* Ukuran logo */
            height: auto;
        }
        .header h3 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Header dengan Logo dan Informasi SD -->
<div class="header">
        <h3> SDN 01 Wadas</h3> <!-- Gantilah dengan nama SD Anda -->
    <p>Alamat:Jl. HS.Ronggo Waluyo No.70, Telukjambe, Telukjambe Timur, Karawang, Jawa Barat 41361</p> <!-- Gantilah dengan alamat SD Anda -->
 <!-- Gantilah dengan nomor telepon SD Anda -->
</div>

<!-- Tabel Data Guru -->
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nip</th>
            <th>Nama Guru</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($guru as $g) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($g['nip']) ?></td>
                <td><?= esc($g['nama_guru']) ?></td>
               <td><?= esc($g['kontak']) ?></td>
                <td><?= esc($g['alamat']) ?></td>
                <td><?= esc($g['tanggal_dibuat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
