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

    <!-- Bar pencarian dan tombol tambah kegiatan -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form method="get" action="<?= site_url('/kegiatan/kegiatan') ?>" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari kegiatan..." value="<?= isset($search) ? $search : '' ?>" style="max-width: 300px;">
            <button class="btn btn-outline-primary btn-sm" type="submit">
                <i class="fas fa-search"></i> 
            </button>
        </form>

        <!-- Tombol Tambah Kegiatan dengan ikon -->
        <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
            <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                <i class="fas fa-plus-circle"></i> Tambah Kegiatan
            </button>
        <?php endif; ?>
    </div>

    <!-- Tabel Kegiatan -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($kegiatan as $k) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['nama_kegiatan'] ?></td>
                    <td><?= $k['deskripsi'] ?: '-' ?></td>
                    <td><?= date('d-m-Y', strtotime($k['tanggal'])) ?></td>
                    <td>
                        <?php
                            $status = $k['status'];
                            echo $status === 'Selesai' ? '<span class="badge bg-success">Selesai</span>' : 
                                 ($status === 'Terjadwal' ? '<span class="badge bg-warning">Terjadwal</span>' : 
                                 '<span class="badge bg-danger">Ditunda</span>');
                        ?>
                    </td>
                    <td>
                        <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
                            <button class="btn btn-warning btn-sm" onclick="openEditModal(<?= htmlspecialchars(json_encode($k), ENT_QUOTES, 'UTF-8') ?>)">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="<?= site_url('/kegiatan/delete/'.$k['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        <?php endif; ?>
                        <a href="<?= site_url('/kegiatan/cetak/'.$k['id']) ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-print"></i> Cetak
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Kegiatan -->
<div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="addActivityModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('/kegiatan/store') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add_nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="add_nama_kegiatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="add_deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="add_tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="add_tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="add_status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="add_status" required>
                            <option value="Terjadwal">Terjadwal</option>
                            <option value="Ditunda">Ditunda</option>
                            <option value="Selesai">Selesai</option>
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

<!-- Modal Edit Kegiatan -->
<div class="modal fade" id="editActivityModal" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="editActivityModalLabel">Edit Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editActivityForm" action="<?= site_url('/kegiatan/update') ?>" method="post">
                <input type="hidden" name="id" id="edit_activity_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="edit_nama_kegiatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="edit_deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="edit_tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="edit_status" required>
                            <option value="Terjadwal">Terjadwal</option>
                            <option value="Ditunda">Ditunda</option>
                            <option value="Selesai">Selesai</option>
                        </select>
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
function openEditModal(activity) {
    // Menggunakan template literal untuk menyertakan PHP dalam string JavaScript
    document.getElementById('editActivityForm').action = "<?= site_url('/kegiatan/update/') ?>/" + activity.id;
    document.getElementById('edit_activity_id').value = activity.id;
    document.getElementById('edit_nama_kegiatan').value = activity.nama_kegiatan;
    document.getElementById('edit_deskripsi').value = activity.deskripsi;
    document.getElementById('edit_tanggal').value = activity.tanggal;
    document.getElementById('edit_status').value = activity.status;
    new bootstrap.Modal(document.getElementById('editActivityModal')).show();
}
</script>

<?= $this->include('layout/footer'); ?>
