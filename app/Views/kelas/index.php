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

    <!-- Tabel Kelas -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Tingkat</th>
                <th>Tahun Ajaran</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($kelas as $k): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['nama_kelas'] ?></td>
                    <td><?= $k['tingkat'] ?></td>
                    <td><?= $k['tahun_ajaran'] ?></td>
                    <td><?= $k['id_wali_kelas'] ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="openEditModal(<?= htmlspecialchars(json_encode($k), ENT_QUOTES, 'UTF-8') ?>)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <a href="<?= site_url('/kelas/delete/'.$k['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tombol Tambah Kelas -->
    <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addClassModal">
        <i class="fas fa-plus-circle"></i> Tambah Kelas
    </button>
</div>

<!-- Modal Tambah Kelas -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('kelas/store') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add_nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="add_nama_kelas" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_tingkat" class="form-label">Tingkat</label>
                        <input type="text" class="form-control" name="tingkat" id="add_tingkat" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="add_tahun_ajaran" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_wali_kelas" class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" name="id_wali_kelas" id="add_wali_kelas" required>
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

<!-- Modal Edit Kelas -->
<div class="modal fade" id="editClassModal" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="editClassModalLabel">Edit Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editClassForm" action="<?= site_url('/kelas/update') ?>" method="post">
                <input type="hidden" name="id" id="edit_class_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="edit_nama_kelas" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tingkat" class="form-label">Tingkat</label>
                        <input type="text" class="form-control" name="tingkat" id="edit_tingkat" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="edit_tahun_ajaran" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_wali_kelas" class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" name="id_wali_kelas" id="edit_wali_kelas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEditModal(kelas) {
    document.getElementById('editClassForm').action = "<?= site_url('/kelas/update/') ?>" + "/" + kelas.id;
    document.getElementById('edit_class_id').value = kelas.id;
    document.getElementById('edit_nama_kelas').value = kelas.nama_kelas;
    document.getElementById('edit_tingkat').value = kelas.tingkat;
    document.getElementById('edit_tahun_ajaran').value = kelas.tahun_ajaran;
    document.getElementById('edit_wali_kelas').value = kelas.id_wali_kelas;
    new bootstrap.Modal(document.getElementById('editClassModal')).show();
}
</script>

<?= $this->include('layout/footer'); ?>
