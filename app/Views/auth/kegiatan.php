<?= $this->include('auth/top-page'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Daftar Kegiatan Musollah Al-Insan</h1>
        <h4 class="mb-4 text-center">Jl. Contoh Alamat No. 123, Kota XYZ</h4>

        <!-- Tabel Kegiatan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Cetak</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($kegiatan as $k) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($k['nama_kegiatan']) ?></td>
                        <td><?= esc($k['deskripsi']) ?: '-' ?></td>
                        <td><?= esc($k['tanggal']) ?></td>
                        <td>
                            <!-- Tombol Cetak PDF untuk setiap kegiatan -->
                            <a href="<?= site_url('kegiatan/cetakPDF/' . $k['id']) ?>" class="btn btn-danger mb-3">Cetak PDF</a>
                        </td>
                        <td>
                            <?php
                                $status = $k['status'];
                                if ($status == 'Selesai') {
                                    echo '<span class="badge bg-success">Selesai</span>';
                                } elseif ($status == 'Terjadwal') {
                                    echo '<span class="badge bg-warning">Terjadwal</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Ditunda</span>';
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
