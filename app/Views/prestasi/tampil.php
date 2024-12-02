<?= $this->include('auth/top-page'); ?>

<div class="container my-4">
    <h3>Kelola Prestasi</h3><br>

    <!-- Fitur Pencarian dan Aksi -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= site_url('/prestasi/cetak') ?>" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-print"></i>
        </a>
        <a href="<?= site_url('/prestasi/exportToExcel') ?>" class="btn btn-outline-success btn-sm">
            <i class="fas fa-file-excel"></i>
        </a>

        <!-- Tombol Tambah Prestasi hanya untuk Admin -->
        <?php if (session()->get('role') === 'admin'): ?>
            <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addPrestasiModal">
                <i class="fas fa-plus-circle"></i>
            </button>
        <?php endif; ?>
    </div>

    <!-- Tabel Data Prestasi -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg" id="prestasiTable">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama Prestasi</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Penghargaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($prestasi as $p) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($p['nama_prestasi']) ?></td>
                    <td><?= esc($p['kategori']) ?></td>
                    <td><?= esc($p['tanggal']) ?></td>
                    <td><?= esc($p['penghargaan']) ?></td>
                    <td>
                        <?php if (session()->get('role') === 'admin'): ?>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm" onclick="openEditModal(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, 'UTF-8') ?>)">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <a href="<?= site_url('prestasi/delete/' . $p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        <?php else: ?>
                            <span class="text-muted">Hanya admin</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal Tambah Prestasi -->
<div class="modal fade" id="addPrestasiModal" tabindex="-1" aria-labelledby="addPrestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="addPrestasiModalLabel">Tambah Data Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('prestasi/store') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_prestasi" class="form-label">Nama Prestasi</label>
                        <input type="text" class="form-control" name="nama_prestasi" id="nama_prestasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="Akademik">Akademik</option>
                            <option value="Non-akademik">Non-akademik</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Seni">Seni</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="penghargaan" class="form-label">Penghargaan</label>
                        <input type="text" class="form-control" name="penghargaan" id="penghargaan" required>
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

<!-- Modal Edit Prestasi -->
<div class="modal fade" id="editPrestasiModal" tabindex="-1" aria-labelledby="editPrestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="editPrestasiModalLabel">Edit Data Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editPrestasiForm" action="<?= site_url('prestasi/update') ?>" method="post">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama_prestasi" class="form-label">Nama Prestasi</label>
                        <input type="text" class="form-control" name="nama_prestasi" id="edit_nama_prestasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_kategori" class="form-label">Kategori</label>
                        <select class="form-control" name="kategori" id="edit_kategori" required>
                            <option value="Akademik">Akademik</option>
                            <option value="Non-akademik">Non-akademik</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Seni">Seni</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="edit_tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_penghargaan" class="form-label">Penghargaan</label>
                        <input type="text" class="form-control" name="penghargaan" id="edit_penghargaan" required>
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
    function openEditModal(prestasi) {
        document.getElementById('editPrestasiForm').action = "<?= site_url('prestasi/update') ?>/" + prestasi.id;
        document.getElementById('edit_id').value = prestasi.id;
        document.getElementById('edit_nama_prestasi').value = prestasi.nama_prestasi;
        document.getElementById('edit_kategori').value = prestasi.kategori;
        document.getElementById('edit_tanggal').value = prestasi.tanggal;
        document.getElementById('edit_penghargaan').value = prestasi.penghargaan;
        new bootstrap.Modal(document.getElementById('editPrestasiModal')).show();
    }
</script>

<?= $this->include('layout/footer'); ?>
