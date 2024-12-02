<?= $this->include('auth/top-page'); ?>
<div class="container my-4">
    <p>Kelola Jadwal</p>
    <br>

    <!-- Hanya role admin yang bisa menambah jadwal -->
    <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
        <a href="<?= site_url('/jadwal/create') ?>" class="btn btn-primary mb-3">Tambah Jadwal</a>
    <?php endif; ?>

    <!-- Tabel Jadwal -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama Mapel</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Selesai</th>
                <th>Nama</th>
                <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
                <th>Aksi</th>
            </tr>
            <?php endif; ?>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($jadwal as $item): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item['nama_mapel'] ?></td>
                    <td><?= $item['hari'] ?></td>
                    <td><?= date('H:i', strtotime($item['jam_masuk'])) ?></td>
                    <td><?= date('H:i', strtotime($item['jam_selesai'])) ?></td>
                    <td><?= $item['guru_id'] ?></td>
                    <td>
                        <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
                            <!-- Elemen untuk peran selain siswa dan guru -->
                            <a href="<?= site_url('/jadwal/edit/'.$item['id']) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengedit jadwal ini?');">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= site_url('/jadwal/delete/'.$item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layout/footer'); ?>
