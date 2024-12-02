<?= $this->include('auth/nav'); ?><br><br>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sb-admin-2@1.0.0/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background: #ddd;
        }

        .card {
            border-radius: 1.5rem;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4e73df;
            border-radius: 50px;
            padding: 10px 30px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            transform: translateY(-3px);
        }

        .form-control-user {
            border-radius: 50px;
            height: calc(2.5rem + .75rem + 2px);
            padding: .75rem 1.25rem;
            border: 1px solid #ddd;
        }

        .text-info {
            font-weight: 600;
        }

        .card-body {
            padding: 3rem;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-black mb-4">Lupa Password</h1>
                                    </div>
                                    <?php if (session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success">
                                            <?= session()->getFlashdata('success'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form action="/auth/forgot_password" method="post" id="forgotPasswordForm" class="user">
                                        <?= csrf_field(); ?>
                                        <div class="form-group mb-3">
                                            <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Masukkan Email" required>
                                            <small id="emailError" class="text-danger"></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Kirim Link Reset Password</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <span class="text-blue">Sudah punya akun? <a href="/auth/login" class="text-info">Login</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap and SB Admin JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sb-admin-2@1.0.0/dist/js/sb-admin-2.min.js"></script>
    <script>
        // Validasi form menggunakan JavaScript
        document.getElementById('forgotPasswordForm').addEventListener('submit', function (e) {
            document.getElementById('emailError').textContent = '';
            let isValid = true;
            const email = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!email.match(emailPattern)) {
                document.getElementById('emailError').textContent = 'Masukkan email yang valid.';
                isValid = false;
            }
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>
