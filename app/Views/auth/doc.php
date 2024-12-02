<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Daftar Kegiatan</h1>
    <div class="row">
                <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= base_url('uploads/' . $item['gambar']) ?>" class="card-img-top" alt="<?= $item['nama'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['nama'] ?></h5>
                        <p class="card-text"><?= $item['deskripsi'] ?></p>
                        <p class="card-text"><small class="text-muted"><?= $item['tanggal'] ?></small></p>
                    </div>
                </div>
                </div>
    </div>
</div>
</body>
</html>
