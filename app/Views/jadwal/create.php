<?= $this->include('auth/top-page'); ?>

<h2>Tambah Prestasi</h2>

<?php if (session()->getFlashdata('error')) : ?>
    <div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin: 10px 0; border-radius: 5px;">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form action="/prestasi/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div style="margin-bottom: 15px;">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" value="<?= old('judul') ?>" style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;"><?= old('deskripsi') ?></textarea>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" style="padding: 8px;">
    </div>

    <div>
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px;">Simpan Prestasi</button>
        <a href="/prestasi/tampil" style="background-color: #f44336; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Batal</a>
    </div>
</form>
