<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="content flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
            <div class="container-fluid">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                            <li>
                                <span class="dropdown-item"><?= session()->get('email'); ?></span>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img alt="User profile picture" class="rounded-circle" height="40" src="https://storage.googleapis.com/a1aa/image/BnWDrXJ44p65Cd5o5EMPbGPkqWUHqBr9FwfFSoo4H1Z0cM0JA.jpg" width="40"/>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>