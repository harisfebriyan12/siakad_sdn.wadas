<?= $this->include('auth/top-page'); ?>

<div class="container my-4">
    <p>Kelola Kegiatan</p>

    <!-- Bar pencarian dan tombol tambah kegiatan -->
    <div class="d-flex justify-content-between mb-3">
        <form method="get" action="<?= site_url('/kegiatan/kegiatan') ?>" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari kegiatan..." value="<?= isset($search) ? $search : '' ?>" style="max-width: 250px;">
            <button class="btn btn-primary btn-sm" type="submit">Cari</button>
        </form>

        <!-- Tombol Tambah Kegiatan untuk membuka modal -->
        <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#activityModal" onclick="openAddModal()">Tambah Kegiatan</button>
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

<!-- Modal Tambah/Edit Kegiatan -->
<div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="activityForm" action="<?= site_url('/kegiatan/store') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="activity_id">
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
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

<script>
function openAddModal() {
    document.getElementById('activityForm').action = "<?= site_url('/kegiatan/store/') ?>";
    document.getElementById('activityModalLabel').innerText = "Tambah Kegiatan";
    document.getElementById('activity_id').value = "";
    document.getElementById('nama_kegiatan').value = "";
    document.getElementById('deskripsi').value = "";
    document.getElementById('tanggal').value = "";
    document.getElementById('status').value = "Terjadwal";
}

function openEditModal(activity) {
    document.getElementById('activityForm').action = "<?= site_url('/kegiatan/update/') ?>";
    document.getElementById('activityModalLabel').innerText = "Edit Kegiatan";
    document.getElementById('activity_id').value = activity.id;
    document.getElementById('nama_kegiatan').value = activity.nama_kegiatan;
    document.getElementById('deskripsi').value = activity.deskripsi;
    document.getElementById('tanggal').value = activity.tanggal;
    document.getElementById('status').value = activity.status;
    new bootstrap.Modal(document.getElementById('activityModal')).show();
}
</script>

<?= $this->include('layout/footer'); ?>
