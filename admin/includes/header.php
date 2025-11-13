<?php require_once __DIR__ . "/path.php" ?>

<header>
    <nav>
        <div class="profile-admin">
            <div class="profile-avatar"><i class="fa-regular fa-user"></i></div>
            <div class="profile-info">
                <div class="profile-name">Admin Dashboard</div>
                <div class="profile-role">Administrator</div>
            </div>
        </div>
        <a href="<?php echo ADMIN_PATH; ?>logout.php" class="exit-logo">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </nav>
</header>