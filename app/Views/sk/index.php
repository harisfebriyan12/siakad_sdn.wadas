<!DOCTYPE html>
<html>
<head>
    <title>Struktur Sekolah</title>
</head>
<body>
    <h1>Daftar Struktur Sekolah</h1>
    <a href="/struktur-sekolah/create">Tambah Data</a>
    <?php if (session()->getFlashdata('success')) : ?>
        <p><?= session()->getFlashdata('success'); ?></p>
    <?php endif; ?>
    <table border="1">
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
                        <a href="/struktur-sekolah/edit/<?= $item['id']; ?>">Edit</a>
                        <a href="/struktur-sekolah/delete/<?= $item['id']; ?>" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
