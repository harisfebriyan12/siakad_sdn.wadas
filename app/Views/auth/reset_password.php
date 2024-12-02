<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if (session()->getFlashdata('error')) : ?>
        <p><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
    <form action="/reset-password" method="post">
        <input type="hidden" name="token" value="<?= esc($token) ?>">
        <label for="password">Password Baru:</label>
        <input type="password" name="password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
