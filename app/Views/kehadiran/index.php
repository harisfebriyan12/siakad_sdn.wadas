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

    <!-- Form Tambah Kehadiran -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addKehadiranModal">
            <i class="fas fa-plus-circle"></i> Tambah Kehadiran
        </button>
    </div>

    <!-- Tabel Kehadiran -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($kehadiran as $k) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['siswa_id'] ?></td>
                    <td><?= date('d-m-Y', strtotime($k['tanggal'])) ?></td>
                    <td><?= $k['status'] ?></td>
                    <td>
                        <a href="<?= site_url('/kehadiran/edit/'.$k['id']) ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= site_url('/kehadiran/delete/'.$k['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Kehadiran -->
<div class="modal fade" id="addKehadiranModal" tabindex="-1" aria-labelledby="addKehadiranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="addKehadiranModalLabel">Tambah Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('/kehadiran/store') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Nama Siswa</label>
                        <select class="form-select" name="siswa_id" id="siswa_id" required>
                            <?php foreach ($siswa as $s): ?>
                                <option value="<?= $s['id'] ?>"><?= $s['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Alfa">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('layout/footer'); ?>
