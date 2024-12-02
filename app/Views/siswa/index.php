<?= $this->include('auth/top-page'); ?>

<div class="container my-4">
    <!-- Display Success or Error Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Tombol Ekspor -->
    <a href="<?= site_url('/siswa/exportToExcel') ?>" class="btn btn-success mb-3">
        <i class="fas fa-file-excel"></i> Export to Excel
    </a>

    <!-- Tabel Siswa -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($siswa as $s) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $s['nama_siswa'] ?></td>
                    <td><?= $s['nis'] ?></td>
                    <td><?= $s['alamat'] ?: '-' ?></td>
                    <td><?= date('d-m-Y', strtotime($s['tanggal_lahir'])) ?></td>
                    <td><?= $s['kelas_id'] ?></td>
                    <td>
                        <?php if (session()->get('role') !== 'siswa'): ?>
                            <a href="<?= site_url('/siswa/edit/'.$s['id']) ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= site_url('/siswa/delete/'.$s['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
