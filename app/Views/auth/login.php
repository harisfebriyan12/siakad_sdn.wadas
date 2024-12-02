
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sb-admin-2@1.0.0/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 1.5rem;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            border-radius: 50px;
            padding: 10px 30px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
            transform: translateY(-3px);
        }
        .form-control-user {
            border-radius: 50px;
            height: calc(2.5rem + .75rem + 2px);
            padding: .75rem 1.25rem;
            border: 1px solid #ddd;
        }
        .form-control-user:focus {
            box-shadow: none;
            border-color: #4e73df;
        }
        .text-info {
            font-weight: 600;
        }
        .small {
            font-size: 0.9rem;
        }
        .card-body {
            padding: 3rem;
        }
        .h4 {
            font-weight: bold;
            letter-spacing: 2px;
        }
        /* Shadow hover for card */
        .card:hover {
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.1);
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
                                        <h1 class="h4 text-black mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="/auth/validateLogin" method="post" id="loginForm" class="user">
                                        <?= csrf_field(); ?>
                                        <div class="form-group mb-3">
                                            <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Masukkan Email" required>
                                            <small id="emailError" class="text-danger"></small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Masukkan Password" required>
                                            <small id="passwordError" class="text-danger"></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <div class="text-center">
                          </div>
                                    </form>
                                    <hr>
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
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            // Reset error messages
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            let isValid = true;

            // Validasi email
            const email = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!email.match(emailPattern)) {
                document.getElementById('emailError').textContent = 'Masukkan email yang valid.';
                isValid = false;
            }

            // Validasi password
            const password = document.getElementById('password').value;
            if (password.length < 6) {
                document.getElementById('passwordError').textContent = 'Password harus memiliki setidaknya 6 karakter.';
                isValid = false;
            }

            // Jika ada kesalahan validasi, jangan submit form
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>
