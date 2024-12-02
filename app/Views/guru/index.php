<?= $this->include('auth/top-page'); ?>

<div class="container my-4">
    <h3>Kelola Guru</h3><br>

    <!-- Fitur Pencarian Guru -->
    <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="<?= site_url('/guru/cetak') ?>" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-print">Cetak Pdf</i> 
    </a>
 
    <!-- Tombol Tambah Guru hanya untuk Admin -->
        <?php if (session()->get('role') === 'admin'): ?>
            <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addGuruModal">
                <i class="fas fa-plus-circle">Tambah Guru</i>
            </button>
        <?php endif; ?>
    </div>

    <!-- Tabel Data Guru -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg" id="guruTable">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($guru as $g) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($g['nip']) ?></td>
                    <td><?= esc($g['nama_guru']) ?></td>
                    <td><?= esc($g['kontak']) ?></td>
                    <td><?= esc($g['alamat']) ?></td>
                               
                    <td>
                        <?php if (session()->get('role') === 'admin'): ?>
                            <!-- Tombol Edit Guru -->
                            <button class="btn btn-warning btn-sm" onclick="openEditModal(<?= htmlspecialchars(json_encode($g), ENT_QUOTES, 'UTF-8') ?>)">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <!-- Tombol Hapus Guru -->
                            <a href="<?= site_url('guru/delete/' . $g['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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

<!-- Modal Tambah Guru -->
<div class="modal fade" id="addGuruModal" tabindex="-1" aria-labelledby="addGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="addGuruModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('guru/store') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" id="nama_guru" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="kontak" id="kontak" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
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

<!-- Modal Edit Guru -->
<div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuruModalLabel">Edit Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editGuruForm" action="<?= site_url('guru/update') ?>" method="post">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" id="edit_nama_guru" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" name="nip" id="edit_nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="kontak" id="edit_kontak" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="edit_alamat"></textarea>
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
    // Fungsi untuk membuka modal edit dan mengisi form dengan data yang dipilih
    function openEditModal(guru) {
        document.getElementById('editGuruForm').action = "<?= site_url('guru/update') ?>/" + guru.id;
        document.getElementById('edit_id').value = guru.id;
        document.getElementById('edit_nama_guru').value = guru.nama_guru;
        document.getElementById('edit_nip').value = guru.nip;
        document.getElementById('edit_kontak').value = guru.kontak;
        document.getElementById('edit_alamat').value = guru.alamat;
        new bootstrap.Modal(document.getElementById('editGuruModal')).show();
    }
</script>

<?= $this->include('layout/footer'); ?>