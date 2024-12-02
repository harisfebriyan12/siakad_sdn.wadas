<?= $this->include('auth/top-page'); ?>

<div class="container mt-5">
    <!-- Tabel Data Pengguna -->
    <table class="table table-striped table-bordered shadow-sm rounded-lg table-responsive">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; // Inisialisasi nomor di luar foreach ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $no++; // Increment nomor ?></td>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td class="text-center">
                        <?php if ($user['role'] == 'admin'): ?>
                            <span class="badge bg-danger"><i class="fas fa-user-shield"></i> Admin</span>
                        <?php elseif ($user['role'] == 'guru'): ?>
                            <span class="badge bg-primary"><i class="fas fa-chalkboard-teacher"></i> Guru</span>
                        <?php else: // siswa ?>
                            <span class="badge bg-success"><i class="fas fa-user-graduate"></i> Siswa</span>
                        <?php endif; ?>
                    </td>

                    <?php if (session()->get('role') !== 'siswa' && session()->get('role') !== 'guru'): ?>
                        <td class="text-center">
                            <a href="/edit/<?= $user['id']; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="/delete/<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Footer Responsif -->
<footer class="text-center mt-5 p-3">
    <p>&copy; 2024 Musollah Al-Insan. All Rights Reserved.</p>
</footer>

<!-- Include Font Awesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
