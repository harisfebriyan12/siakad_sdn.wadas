<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <h1><?= $title; ?></h1>
    <a href="/struktur-sekolah/create" class="btn btn-primary mb-3">Tambah Data</a>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($struktur as $item) : ?>
            <tr>
                <td><?= $item['nama']; ?></td>
                <td><?= $item['jabatan']; ?></td>
                <td><img src="/uploads/foto/<?= $item['foto']; ?>" alt="Foto" width="50"></td>
                <td>
                    <a href="/struktur-sekolah/edit/<?= $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(<?= $item['id']; ?>)">Hapus</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function deleteData(id) {
        Swal.fire({
            title: 'Yakin hapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `/struktur-sekolah/delete/${id}`;
            }
        });
    }
</script>
</body>
</html>
