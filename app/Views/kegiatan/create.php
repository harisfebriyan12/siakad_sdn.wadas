<?= $this->include('auth/top-page'); ?>

<div class="container my-4">
    <h4 class="mb-4">Tambah Kegiatan</h4>
    <form action="<?= site_url('/kegiatan/store') ?>" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control form-control-sm" id="nama_kegiatan" name="nama_kegiatan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control form-control-sm" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select form-select-sm" id="status" name="status" required>
                <option value="Terjadwal">Terjadwal</option>
                <option value="Selesai">Selesai</option>
                <option value="Ditunda">Ditunda</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    </form>
</div>
