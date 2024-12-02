<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SB Admin 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sb-admin-2@1.0.0/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background: #ddd; /* Gradien merah muda ke oranye */
        }
        .card {
            border-radius: 1.5rem;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            border-radius: 50px;
            padding: 12px 30px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
            transform: translateY(-3px);
        }
        .form-control-user {
            border-radius: 50px;
            height: 50px;
            padding: 12px 20px;
            border: 1px solid #ddd;
        }
        .form-control-user:focus {
            box-shadow: none;
            border-color: #4e73df;
        }
        .select-user {
            border-radius: 50px;
            height: 50px;
            padding: 12px 20px;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card-body {
            padding: 4rem;
        }
        .h4 {
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }
        .text-center {
            margin-bottom: 20px;
        }
        .login-link {
            font-size: 1rem;
            color: #4e73df;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link:hover {
            text-decoration: underline;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .alert-success {
            font-size: 1rem;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container form-container">
        <div class="card o-hidden border-0 shadow-lg my-5" style="max-width: 500px; width: 100%;">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <?php if(session()->getFlashdata('success')): ?>
                                <div class="alert alert-success text-center">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <h1 class="h4 text-black mb-4">Daftar Akun Baru</h1>
                            </div>
                            <form action="/auth/storeRegister" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <select name="role" class="form-control select-user" required>
                                        <option value="siswa">Siswa</option>
                                        <option value="guru">Guru</option>
                                        <option value="admin">Admin Utama</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="text-black">Sudah punya akun? <a href="/auth/login" class="login-link">Login</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sb-admin-2@1.0.0/dist/js/sb-admin-2.min.js"></script>
    
    <script>
        <?php if(session()->getFlashdata('success')): ?>
            setTimeout(function(){
                window.location.href = "/auth/login"; // Redirect to login page after 5 seconds
            }, 5000); // 5 seconds delay
        <?php endif; ?>
    </script>

</body>

</html>
