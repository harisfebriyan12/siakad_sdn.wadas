<!-- forgot_password.php -->
<?= $this->include('auth/top-page'); ?>

<div class="container my-5">
    <h2>Lupa Password</h2>
    <form action="<?= site_url('/auth/forgot_password') ?>" method="post">
        <div class="form-group">
            <label for="email">Masukkan Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Link Reset</button>
    </form>
</div>

