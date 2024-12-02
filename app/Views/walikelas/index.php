<!-- views/wali_kelas/create.php -->
<?= $this->include('layout/header'); ?>

<div class="container my-4">
    <h3>Tambah Data Wali Kelas</h3>
    <form action="<?= site_url('wali_kelas/store') ?>" method="post">
        <div class="mb-3">
            <label for="id_guru" class="form-label">Pilih Kelas</label>
            <select class="form-control" name="id_guru" id="id_guru" required>
                <?php foreach ($kelas as $k) : ?>
                    <option value="<?= esc($k['id']) ?>"><?= esc($k['nama_kelas']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_wali_kelas" class="form-label">Nama Wali Kelas</label>
            <input type="text" class="form-control" name="nama_wali_kelas" id="nama_wali_kelas" required>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" name="kontak" id="kontak" required>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<?= $this->include('layout/footer'); ?>
