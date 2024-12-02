<?= $this->include('layoutt/index'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

   </head>
<style>
    /* General styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* Container styling */
.container {
    max-width: 900px;
    margin: 30px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Heading styling */
h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Table styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
}

.table thead {
    background-color: #343a40;
    color: #ffffff;
}

.table th,
.table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.table tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #e9ecef;
}

/* Button styling */
.btn {
    display: inline-block;
    padding: 6px 12px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    text-align: center;
    color: #ffffff;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.btn-info {
    background-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-sm {
    font-size: 12px;
    padding: 5px 10px;
}

/* Icon styling */
.fas {
    margin-right: 5px;
}
</style>
<body>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $m): ?>
                    <tr>
                        <td><?= esc($m['id_mhs']); ?></td>
                        <td><?= esc($m['nim']); ?></td>
                        <td><?= esc($m['nama']); ?></td>
                        <td><?= esc($m['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan'); ?></td>
                        <td><?= esc($m['email']); ?></td>
                        <td>
                            <!-- Menggunakan base_url -->
                            <a href="<?= base_url('mahasiswa/detail/' . $m['id_mhs']); ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
