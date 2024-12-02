<div class="container mx-auto px-4 py-6">
    <!-- Wrapper untuk scroll horizontal -->
    <div class="flex overflow-x-auto space-x-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $db = \Config\Database::connect();
            $builder = $db->table('kegiatan');
            $builder->select('id, nama_kegiatan, deskripsi, tanggal, status');
            $builder->where('tanggal >=', date('Y-m-d', strtotime('-1 month')));
            $builder->where('status', 'Terjadwal');
            $builder->orderBy('tanggal', 'DESC');
            $query = $builder->get();
            $kegiatan = $query->getResult();

   ?> 